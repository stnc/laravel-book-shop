<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashBoardController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {


        $this->request = $request;


    }

    public function __invoke($single_page = 'home')
    {
        switch ($single_page) {
            case 'multi-pdf-create':
                return $this->multiPdfCreate();
                break;
            case 'post-multi-pdf-create':
                return $this->multiPdfCreate();
                break;
            default:
                return $this->home();
        }

    }

    private function home()
    {
      /*
        $orders = Order::whereIn('status', ['success', 'shipping', 'received', 'preparing'])->with(['products', 'detail'])->get();

        $orders->each(function ($order) {
            $order->total_amount = array_sum($order->products->pluck('price')->all()) - $order->detail->discount_price + $order->detail->shipment_price;
        });

        return view('Admin.dashboard.index', [
            'total_amount' => array_sum($orders->pluck('total_amount')->all()),
            'new_orders_count' => $orders->where('status', 'success')->count(),
        ]);*/
    }

    /*
     * PDF Oluşturur
     * */
    private function multiPdfCreate()
    {
        $request = $this->request;
        if ($request->method() == 'POST') {
            $validator = Validator::make($request->all(), [
                'products' => 'required',
                'excel' => 'required',
                'sender_fullname' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $excel_file = ltrim($request->input('excel'), '/');


            if (!file_exists($excel_file))
                return redirect()->back()->withErrors('hata', 'böyle bir excel bulunmamaktadır');

            $products = Product::find($request->input('products'));

            $excel_rows = \myHelper::ExcelReader($excel_file);

            foreach ($excel_rows as $index => $excel_row) {

                if($index==1)
                    continue;

                $excel_row['C']=trim($excel_row['C']);



                $object = new \stdClass();
                $object->receiver_name = $excel_row['A'];
                $object->receiver_surname = $excel_row['B'];
                $object->sender_fullname = $request->input('sender_fullname');
                $object->image = $request->input('image');
                $object->message = $request->input('message','');


                $view = view('Site.email.multi_pdf', ['products' => $products, 'object' => $object])->render();


                $pdf = new \mikehaertl\wkhtmlto\Pdf(array(
                    'binary' => '/usr/local/bin/wkhtmltopdf',
                    'commandOptions' => array(
                        'enableXvfb' => true,
                        'xvfbRunBinary' => '/usr/bin/xvfb-run',
                        'xvfbRunOptions' => '',
                    ),
                ));


                $pdf->addPage($view);

                $path = 'kcfinder/upload/files/' . time() . '.pdf';
                if (!$pdf->saveAs($path)) {
                    dd($pdf->getError());
                }else
                {

                    \myHelper::SendTransactionEmailWithMadmimi([
                        'promotion_name'=>'hayat_ver_hed',
                        'subject'=>'Teşekkürler',
                        'from'=>'Hayat Veren Hediyeler <noreply@hayatverenhediyeler.com>',
                        'recipients'=>$excel_row['C'],
                        //gönderilen mail aynı zamanda sertifika olacağı için iptal edili
                        ////'body'=>view('Site.email.multi_pdf_success',['object' => $object,'pdf'=>url($path)])->render(),
                        'body'=>$view,
                    ]);

                }


            }


            return redirect()->to('/admin/dashboard/multi-pdf-create')->with('success', 'Email gönderimi başarılı ');

        }


        return view('Admin.dashboard.multi_pdf_create', [
            'files'=>(new \App\Http\Controllers\Site\PaymentController($request))->cartFiles(),
        ]);
    }


}

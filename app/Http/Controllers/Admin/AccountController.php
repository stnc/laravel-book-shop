<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Notifications\CommentForVisitor;
use App\Visitor;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $visitors = Visitor::orderBy('id', 'desc')->paginate(15);



        return view('Admin.account.index', [
            'visitors' => User::where('type','member')->orderBy('updated_at','desc')->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMessage(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('comment_status', 'Mesaj başarıyla silindi.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function mailSend(User  $user, Request $request)
    {

        $array = [
            'subject' => "Siparişler",
            'recipients' => $user->email,
            'body' => $request->input('message',''),
            'promotion_name' => 'admin_send_panel',
        ];

        \myHelper::SendTransactionEmailWithMadmimi($array);


        return redirect()->back()->with('visitor_status', $user->email . ' adresine email gönderildi.');
    }

    public function usercreate(Request $request)
    {

        $url='createuser?id=23101993&email='. $request->input('email').'&password='.$request->input('password')."&pass=3233";

        return redirect()->to($url);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);
        $request->request->set('password', bcrypt($request->input('password')));
        auth()->guard('admin')->user()->update($request->all());

        return redirect()->back()->with('profile_status', ' profil bilgileri başarıyla güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

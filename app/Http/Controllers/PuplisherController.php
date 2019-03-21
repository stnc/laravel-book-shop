<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Puplisher;
class PuplisherController extends Controller
{

    public function show($id, Request $request)
    {

        //   DB::enableQueryLog();
        $puplisher = Puplisher::find($id);
        //$Books =collect($Puplisher->books)->implode('name', ',');
        $books = $puplisher->books;
      //  dd($books);
        //$query = DB::getQueryLog();
        // print_r($query);
        return view('ebook.puplisher.show', compact('books', 'puplisher'));


    }


}

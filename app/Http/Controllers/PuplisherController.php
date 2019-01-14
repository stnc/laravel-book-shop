<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PuplisherController extends Controller
{

    public function show($id, Request $request)
    {

        //   DB::enableQueryLog();
        $Puplisher = \App\Puplisher::find($id);
        //$Books =collect($Puplisher->books)->implode('name', ',');
        $Books = $Puplisher->books;
        //$query = DB::getQueryLog();
        // print_r($query);
        return view('puplisher.show', compact('Books', 'Puplisher'));


    }


}

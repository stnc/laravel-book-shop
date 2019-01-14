<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{

    public function show($id, Request $request)
    {


        //https://startbootstrap.com/template-categories/ecommerce/
//https://www.kitapyurdu.com/yazar/stefan-zweig/3602.html
        //   DB::enableQueryLog();
        $Authors = \App\A_authors::find($id);

        $Comments = $Authors->comments->where('approved', 1);

        $ToplamBegenilme = $Authors->likes->count();

        $tags = collect($Authors->tags)->implode('name', ',');

        $mycat = collect($Authors->tags)->implode('name', ',');

        //$query = DB::getQueryLog();
        // print_r($query);
        return view('authors.show', compact('Authors', 'Comments', "ToplamBegenilme", "tags"));




    }





    public function add()
    {
        $authors = \App\A_authors::create(['name' => 'Free smoke']);
        $books = \App\A_books::create(['name' => 'Selman tunç', 'author_id' => $authors->id]);
        $upvote1 = new \App\A_book_author_like;
        $upvote2 = new \App\A_book_author_like;

        $books->likes()->save($upvote1);
        $authors->likes()->save($upvote2);

    }

}

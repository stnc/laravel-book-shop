<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ABooksController extends Controller
{

    public function show($id,Request $request)

    {


        $book = \App\A_books::find($id);
        dd($book);
         $upvotes = $book->likes;
        echo  $upvotescount = $book->likes->count();



    }


    public function add()
    {
        $authors = \App\A_authors::create(['name' => 'Free smoke']);
        $books = \App\A_books::create(['name' => 'Selman tunç','author_id' => $authors->id]);
        $upvote1 = new \App\A_book_author_like;
        $upvote2 = new \App\A_book_author_like;
        // $upvote3 = new \App\A_book_author_like;
        $books->likes()->save($upvote1);
        $authors->likes()->save($upvote2);
        //   $books->likes()->save($upvote3);
    }
}

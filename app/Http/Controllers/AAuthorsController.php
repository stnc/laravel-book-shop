<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AAuthorsController extends Controller
{

    public function show($id, Request $request)

    {


        $Authors = \App\A_authors::find($id);

        // $upvotes = $Authors->likes;
        //  $upvotescount = $Authors->likes->count();

        return view('authors.show', compact('Authors'));
        //  return view('authors.show')->with('Authors', $Authors);
    }


    public function add()
    {
        echo 'page added';
        $authors = \App\A_authors::create(['name' => 'Free smoke43']);
        $books = \App\A_books::create(['name' => 'Selman tunç34', 'author_id' => $authors->id]);
        $upvote1 = new \App\A_book_author_like;
        $upvote2 = new \App\A_book_author_like;

        $books->likes()->save($upvote1);
        $authors->likes()->save($upvote2);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\A_authors;
class AuthorsController extends Controller
{

    public function show($id, Request $request)
    {

        //   DB::enableQueryLog();
        $authors = A_authors::find($id);

       $comments = $authors->comments->where('approved', 1);

       $tags = collect($authors->tags)->implode('name', ',');

       $toplamBegenilme = $authors->likes->count();


        //$query = DB::getQueryLog();
        // print_r($query);
        return view('authors.show', compact('authors', 'comments', "toplamBegenilme","tags"));




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

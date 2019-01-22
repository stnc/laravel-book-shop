<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\A_books;
use App\Models\User;
use App\Models\Comments;

class BooksController extends Controller
{
    public function show($id, Request $request)
    {
        //https://startbootstrap.com/template-categories/ecommerce/
//https://www.kitapyurdu.com/yazar/stefan-zweig/3602.html
      //  DB::enableQueryLog();
        $books = A_books::find($id);

        $toplamBegenilme = $books->likes->count();

   //   dd( $books->Puplisher[0]->name);
        $tags = collect($books->tags)->implode('name', ',');
        $userDetails = User::find(1);

        $userDetail = $userDetails->usersDetail;
        $comments = $books->comments;

        $authorsID = $books->authors->pluck('id');
        $commentsAuthor = Comments::whereIn("commentable_id", $authorsID)->where('commentable_type', 'authors')->get();
//        dd($CommentsAuthor);
//        $query = DB::getQueryLog();
      ////   print_r($query);
        return view('books.show', compact('books', 'comments', "commentsAuthor", "toplamBegenilme", "tags", 'categories', "userDetail"));
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

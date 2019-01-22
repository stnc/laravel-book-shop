<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\A_books;
use App\Models\User;
use App\Models\Comments;
use App\Models\Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $books = A_books::all();
        $categories = Categories::orderBy('name', 'desc')->get();

       // $toplamBegenilme = $books->likes->count();

      //  $tags = collect($books->tags)->implode('name', ',');

      //  $authorsID = $books->authors->pluck('id');


      return view('home.show', compact('books', "tags", 'categories'));

    }
}

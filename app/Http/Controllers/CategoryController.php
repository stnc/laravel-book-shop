<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoryController extends Controller
{
    public function show($id, Request $request)
    {
        $catInfo = Categories::find($id);
        $books = $catInfo->books;
        return view('ebook.cat.show', compact('books',"catInfo"));
    }
}

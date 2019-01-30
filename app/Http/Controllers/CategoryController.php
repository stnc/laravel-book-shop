<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesBook;
class CategoryController extends Controller
{
    public function show($id, Request $request)
    {
        $catInfo = CategoriesBook::find($id);
        $books = $catInfo->books;
        return view('cat.show', compact('books',"catInfo"));
    }
}

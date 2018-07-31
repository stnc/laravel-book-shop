<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Books extends Controller
{
    public function comments(){
        return $this->morphMany('App\BooksVideoComment','commentable');
    }
}

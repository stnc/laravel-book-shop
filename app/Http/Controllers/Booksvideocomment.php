<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Booksvideocomment extends Controller
{
    public function commentable(){
        return $this->morphTo();
    }
}

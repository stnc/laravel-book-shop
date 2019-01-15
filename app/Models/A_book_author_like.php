<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class A_book_author_like extends Model
{
    public function liketable()
    {
        return $this->morphTo();
    }
}

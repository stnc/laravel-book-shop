<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A_authors extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsTo(A_books::class);
    }

    public function likes()
    {
        return $this->morphMany(A_book_author_like::class, 'liketable');
    }
}

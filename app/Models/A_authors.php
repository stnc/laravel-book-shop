<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class A_authors extends Model
{
//    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(A_books::class, 'authors_id');
    }


    public function comments()
    {
        return $this->morphMany(Comments::class, 'commentable');
    }


    public function likes()
    {
        return $this->morphMany(A_book_author_like::class, 'liketable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

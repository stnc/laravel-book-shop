<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A_books extends Model
{
  protected $fillable = ['name','author_id'];

    public function authors()
    {
        return $this->hasMany(A_authors::class);
    }

    public function likes()
    {
        return $this->morphMany(A_book_author_like::class, 'liketable');
    }
}

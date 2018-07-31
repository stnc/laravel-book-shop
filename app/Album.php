<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function upvotes()
    {
        return $this->morphMany(Upvote::class, 'upvoteable');
    }
}

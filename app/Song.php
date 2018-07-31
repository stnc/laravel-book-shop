<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function upvotes()
    {
        return $this->morphMany(Upvote::class, 'upvoteable');
    }
}

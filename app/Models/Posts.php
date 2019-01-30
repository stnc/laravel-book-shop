<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $guarded = array();
    protected $table = "posts";

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function authors()
    {
        return $this->morphedByMany(A_authors::class, 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */
    public function books()
    {
        return $this->morphedByMany(A_books::class, 'taggable');
    }
}

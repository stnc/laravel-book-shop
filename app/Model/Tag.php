<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

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

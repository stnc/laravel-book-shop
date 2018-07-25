<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    protected $guarded = array();
    protected $table="post_tags";

    public function posts()
    {
        return $this->belongsToMany('App\Posts')
            ->withTimestamps();
    }
}

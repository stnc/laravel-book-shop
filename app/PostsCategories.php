<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsCategories extends Model
{
    protected $guarded = array();

    public function posts()
    {
        return $this->belongsToMany('App\Posts')
            ->withTimestamps();
    }
}

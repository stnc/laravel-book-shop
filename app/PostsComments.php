<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsComments extends Model
{
    protected $guarded = array();
    protected $table="posts_comments";
    protected $primaryKey='CommentId';

    public function posts()
    {
        return $this->belongsTo('App\Posts')->withTimestamps();
    }
}

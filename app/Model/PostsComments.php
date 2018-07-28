<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostsComments extends Model
{
    protected $guarded = array();
    protected $table="posts_comments";
    protected $primaryKey='CommentId';
    protected $fillable=['comment_content','comment_author_email'];
    public function posts()
    {
        return $this->belongsTo('App\Model\Posts')->withTimestamps();
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array();
    //  protected $fillable=['name','description'];
    public function categories()
    {
        return $this->belongsToMany('App\Model\Categories', 'posts_categories_relations',  'post_id','category_id')
            ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Model\PostTags','posts_tags_relations', 'post_id','tag_id' )
            ->withTimestamps();
    }

    public function comments()
    {
       /// return $this->hasOne('App\Model\PostsComments','posts_id','id');
        return $this->hasMany('App\Model\PostsComments','posts_id','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','post_author');
    }

    public function userDetail()
    {
        return $this->hasOne('App\UserDetail','id','post_author');
    }
}

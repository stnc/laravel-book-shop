<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array();
    //  protected $fillable=['name','description'];
    public function categories()
    {
        return $this->belongsToMany('App\PostsCategories', 'posts_categories_relations',  'post_id','category_id')
            ->withTimestamps();
    }

    public function tags()
    {

        return $this->belongsToMany('App\PostTags','posts_tags_relations', 'post_id','tag_id' )
            ->withTimestamps();
    }

    public function Comments()
    {

        return $this->hasOne('App\PostsComments','post_id');
    }
}

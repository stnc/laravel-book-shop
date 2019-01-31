<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

//  protected $fillable = ['name','authors_id'];

    public function likes()
    {
        return $this->morphMany(A_book_author_like::class, 'liketable');
    }

    public function tags()
    {
        //https://itsolutionstuff.com/post/laravel-many-to-many-polymorphic-relationship-tutorialexample.html
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function comments()
    {
//        return $this->hasMany(AuthorsComments::class, 'book_id');
        return $this->morphMany(Comments::class, 'commentable');
    }



    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'posts_categories_relations',  'post_id','category_id')
            ->withTimestamps();
    }

}

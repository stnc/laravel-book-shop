<?php

namespace App\Models;


use App\Models\Tag ;
use Illuminate\Database\Eloquent\Model;

class A_books extends Model
{
  protected $fillable = ['name','authors_id'];

    public function authors()
    {
        return $this->belongsToMany(A_authors::class, 'book_author_relations',  'book_id','author_id')
            ->withTimestamps();
    }

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


    public function puplisher()
    {
       // return $this->belongsTo(Puplisher::class, 'puplishing_house_id','id');
       // return $this->hasOne(BookPuplisherRelation::class, 'book_id','id');
      return $this->belongsToMany(Puplisher::class, 'books_puplisher_relations',  'book_id','puplisher_id')
       ->withTimestamps();
    }


    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_book_relations',  'book_id','category_id')
            ->withTimestamps();
    }

}

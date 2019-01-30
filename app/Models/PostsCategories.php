<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsCategories extends Model
{
    protected $guarded = array();
    //protected $table = "categories_book";

    public function posts()
    {
        return $this->belongsToMany(A_books::class, 'posts_categories_relations',  'category_id','post_id' )
        ->withTimestamps();
    }
}

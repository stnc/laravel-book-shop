<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = array();
    protected $table = "categories_book";

    public function books()
    {
        return $this->belongsToMany(A_books::class, 'categories_book_relations',  'category_id','book_id' )
        ->withTimestamps();
    }
}
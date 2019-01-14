<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPuplisherRelation extends Model
{
    protected $guarded = array();
    protected $table = "books_puplisher_relations";

    public function book()
    {
        return $this->belongsTo(Puplisher::class,'id');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDetail extends Authenticatable
{
    use Notifiable;

    protected $table='user_detail';




    public function user()
    {
        return $this->belongsTo('App\User')->withTimestamps();
    }


}

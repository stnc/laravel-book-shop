<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

/*
    public function posts()
    {
        return $this->belongsToMany('App\Model\Posts')
            ->withTimestamps();
    }

*/
    public function usersDetail()
    {
        return $this->hasOne('App\UserDetail','id','user_id');
    }


/*


    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }
*/
}

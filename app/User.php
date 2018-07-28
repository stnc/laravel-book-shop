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
        'name', 'surname', 'phone', 'birth_date', 'email', 'password', 'type', 'cookie','ip',
    ];



    public function sendedComments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function sendedCommentsCount()
    {
        return $this->hasMany('App\Comment')
            ->selectRaw('user_id, count(*) as count')
            ->groupBy('user_id');
    }



    /**
     * KUllanıcının  profiline bakanlar
     */
    public function displaying()
    {
        return $this->morphMany('App\Display', 'displayable');
    }


    /**
     * KUllanıcının  baktığı sayfalar
     */
    public function displays()
    {
        return $this->hasMany('App\Display', 'user_id');
    }



    public function ordersCount()
    {
        return $this->hasMany('App\Order')
            ->selectRaw('user_id, count(*) as count')
            ->groupBy('user_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }

    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

}

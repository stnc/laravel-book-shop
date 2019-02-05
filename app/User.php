<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];


    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = \Hash::make($value);
    }



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

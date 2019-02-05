<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $fillable = [
        'title',
        'roles',
    ];

    protected $casts = [
        'roles' => 'array',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('\App\User', 'group_id');
    }
}

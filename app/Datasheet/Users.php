<?php

namespace App\Datasheet;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'user_id', 'user_email', 'user_pass', 'user_name', 'user_role', 'user_service', 'user_title', 'user_valid',
        'recent_visit_ip','updated_at','created_at'
    ];

    protected $primaryKey = 'user_id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

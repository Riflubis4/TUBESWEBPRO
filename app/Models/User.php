<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $table = 'users';


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id',
        'phone',
        'soft_skills',
        'hard_skills',
    ];
}

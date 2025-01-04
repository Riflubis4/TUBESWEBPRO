<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserSignup extends Authenticatable
{
    use Notifiable;

    // Tentukan nama tabel yang digunakan
    protected $table = 'users';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id',
    ];

    // Kolom yang tidak perlu disertakan dalam array (seperti password dan token)
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Jika Anda ingin menggunakan date mutators untuk created_at dan updated_at, pastikan menambahkannya
    protected $dates = ['created_at', 'updated_at'];
}

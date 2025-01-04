<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserLogin extends Authenticatable
{
    use Notifiable;

    // Tentukan tabel yang digunakan (tabel 'users')
    protected $table = 'users'; // Menunjuk ke tabel 'users' di database

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role_id',
    ];

    // Sembunyikan kolom password dan token untuk keamanan
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Tentukan casting tipe data untuk atribut tertentu
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Workshop extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model
    protected $table = 'workshops';

    // Menentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'name', 'type', 'date', 'price', 'capacity', 'status'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
   
    protected $fillable = [
        'user', 'event_type', 'event_name', 'amount', 'status', 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
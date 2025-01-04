<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Competition extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'entry_fee', 'status'
    ];

    // Accessor untuk start_date
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('d M Y');
    }

    // Accessor untuk end_date
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('d M Y');
    }

    // Accessor untuk entry_fee
    public function getFormattedEntryFeeAttribute()
    {
        return 'Rp ' . number_format($this->entry_fee, 0, ',', '.');
    }
}

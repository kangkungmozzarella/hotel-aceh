<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelCriteriaValue extends Model
{
    protected $fillable = [
        'hotel_id',
        'criteria_id',
        'value',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
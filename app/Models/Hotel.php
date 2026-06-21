<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'price_per_night',
        'star',
        'rating',
        'facilities',
        'address',
        'latitude',
        'longitude',
        'image',
    ];

    public function criteriaValues()
    {
        return $this->hasMany(HotelCriteriaValue::class);
    }
}
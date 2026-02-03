<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id'];

    // Destination belongs to a country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Destination has many tours
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    // Destination has many hotels
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    // Destination has many attractions
    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }
}

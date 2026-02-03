<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination_id',
        'category',
        'price',
        'amenities'
    ];

    protected $casts = [
        'amenities' => 'array'
    ];

    // Hotel belongs to a destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}

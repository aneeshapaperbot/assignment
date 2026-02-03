<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination_id',
        'price',
        'duration',
        'rating'
    ];

    // Tour belongs to a destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}

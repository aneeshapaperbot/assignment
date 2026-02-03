<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'destination_id'
    ];

    // Attraction belongs to a destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}

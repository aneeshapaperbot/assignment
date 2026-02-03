<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enquiries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'destination',
        'travel_date',
        'number_of_travelers',
        'budget',
        'special_requests',
        'terms_agreed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'travel_date' => 'date',
        'terms_agreed' => 'boolean',
        'number_of_travelers' => 'integer',
        'budget' => 'float',
    ];
}

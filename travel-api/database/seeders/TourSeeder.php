<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\Destination;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = Destination::all();

        foreach ($destinations as $destination) {
            Tour::create([
                'name' => $destination->name . ' City Tour',
                'destination_id' => $destination->id,
                'price' => 120.00,
                'duration' => '1 Day',
                'rating' => 4.5
            ]);

            Tour::create([
                'name' => $destination->name . ' Adventure Tour',
                'destination_id' => $destination->id,
                'price' => 220.00,
                'duration' => '2 Days',
                'rating' => 4.7
            ]);
        }
    }
}

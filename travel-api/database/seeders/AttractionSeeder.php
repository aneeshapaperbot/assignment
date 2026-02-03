<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attraction;
use App\Models\Destination;

class AttractionSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = Destination::all();

        foreach ($destinations as $destination) {
            Attraction::create([
                'name' => $destination->name . ' Central Park',
                'destination_id' => $destination->id
            ]);

            Attraction::create([
                'name' => $destination->name . ' Museum',
                'destination_id' => $destination->id
            ]);
        }
    }
}

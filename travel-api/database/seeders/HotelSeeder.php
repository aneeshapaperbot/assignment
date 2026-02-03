<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Destination;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = Destination::all();

        foreach ($destinations as $destination) {
            Hotel::create([
                'name' => $destination->name . ' Grand Hotel',
                'destination_id' => $destination->id,
                'category' => '5 Star',
                'price' => 180.00,
                'amenities' => json_encode(['WiFi', 'Pool', 'Spa'])
            ]);

            Hotel::create([
                'name' => $destination->name . ' Budget Stay',
                'destination_id' => $destination->id,
                'category' => '3 Star',
                'price' => 90.00,
                'amenities' => json_encode(['WiFi', 'Breakfast'])
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Country;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            'Thailand' => ['Bangkok', 'Phuket', 'Chiang Mai'],
            'Malaysia' => ['Kuala Lumpur', 'Langkawi', 'Penang'],
            'Singapore' => ['Marina Bay', 'Sentosa', 'Orchard Road'],
            'Vietnam' => ['Hanoi', 'Ho Chi Minh City', 'Da Nang'],
            'Indonesia' => ['Bali', 'Jakarta', 'Yogyakarta'],
        ];

        foreach ($destinations as $countryName => $cities) {
            $country = Country::where('name', $countryName)->first();

            foreach ($cities as $city) {
                Destination::create([
                    'name' => $city,
                    'country_id' => $country->id
                ]);
            }
        }
    }
}

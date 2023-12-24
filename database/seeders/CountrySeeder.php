<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Country;

class CountrySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Colombia', 'code' => 'CO'],
            ['name' => 'República Dominicana', 'code' => 'DO'],

        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}

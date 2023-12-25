<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citiesJson = file_get_contents(base_path('database/seeders/cities.json'));
        $cities = json_decode($citiesJson);

        foreach ($cities as $key => $city) {
            DB::insert('INSERT INTO `cities` (`id`, `name`, `state_id`) 
                            VALUES (?, ?, ?)',
                            [$city->id, $city->name, $city->state_id]);
        }
    }
}

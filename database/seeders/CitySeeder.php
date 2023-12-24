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
        $cities = [
            ['name' => 'Medellín', 'state_id' => State::inRandomOrder()->first()->id],
            ['name' => 'Vasconia', 'state_id' => State::inRandomOrder()->first()->id],
            ['name' => 'Boyacá', 'state_id' => State::inRandomOrder()->first()->id],
            ['name' => 'San Pedro de Macorís', 'state_id' => State::inRandomOrder()->first()->id],
            ['name' => 'San Isidrio', 'state_id' => State::inRandomOrder()->first()->id],
            ['name' => 'Santo Domingo', 'state_id' => State::inRandomOrder()->first()->id],

        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}

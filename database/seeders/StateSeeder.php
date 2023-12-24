<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Medellín', 'country_code' => 'CO'],
            ['name' => 'Vasconia', 'country_code' => 'CO'],
            ['name' => 'Boyacá', 'country_code' => 'CO'],
            ['name' => 'San Pedro de Macorís', 'country_code' => 'dO'],
            ['name' => 'San Isidrio', 'country_code' => 'do'],
            ['name' => 'Santo Domingo', 'country_code' => 'do'],

        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}

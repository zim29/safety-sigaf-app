<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statesJson = file_get_contents(base_path('database/seeders/states.json'));
        $states = json_decode($statesJson);

        foreach ($states as $state) {
            DB::insert('INSERT INTO `states` (`id`, `name`, `country_code`) 
                            VALUES (?, ?, ?)',
                            [$state->id, $state->name, $state->country_code]);
        }
    }
}

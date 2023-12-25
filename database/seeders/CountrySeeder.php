<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countriesJson = file_get_contents(base_path('database/seeders/countries.json'));
        $countries = json_decode($countriesJson);

        foreach ($countries as $country) {
            DB::insert('INSERT INTO `countries` (`id`, `name`, `code`) 
                            VALUES (?, ?, ?)',
                            [$country->id, $country->name, $country->iso2]);
        }
    }
}

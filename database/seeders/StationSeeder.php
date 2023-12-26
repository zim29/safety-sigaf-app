<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Station;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = [
                ['name' => 'Vasconia', 
                'long' => '-11.23123213213',
                'lat' => '4.23432432433',
                'add_line_1' => 'C/EJemplo No.4',
                'add_line_2' => '',
                'city_id' => '4',
                ],
                ['name' => 'Caucasia', 
                'long' => '-11.23123213213',
                'lat' => '4.23432432433',
                'add_line_1' => 'C/EJemplo No.2',
                'add_line_2' => 'Ejemplo 2',
                'city_id' => '5',
                ],
            ];

        foreach ($stations as $key => $station) {
            Station::create($station);
        }
    }
}

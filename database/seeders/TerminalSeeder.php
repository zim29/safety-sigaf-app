<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Terminal;
use App\Models\Station;
use App\Models\System;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stations = Station::all();
        $systems = System::all();

        foreach ($stations as $key => $station) {
            foreach ($systems as $key => $system) {
                $terminal = ['name' => $station->name . ' ' . $system->name,
                            'station_id' => $station->id,
                            'system_id' => $system->id,
                            'long' => '-42.22234324234',
                            'lat' => '-42.22234324234',
                            'add_line_1' => 'C/EJemplo No.4',
                            'add_line_2' => '',
                            'city_id' => 4,
                            ];

                Terminal::create($terminal);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\System;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systems = [
                ['name' => 'ODC',],
                ['name' => 'OCSENSA', ],
            ];

        foreach ($systems as $key => $system) {
            System::create($system);
        }
    }
}

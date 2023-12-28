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
                ['name' => 'ODC', 'company_id' => \App\Models\Company::inRandomOrder()->first()->id, ],
                ['name' => 'OCSENSA',  'company_id' => \App\Models\Company::inRandomOrder()->first()->id, ],
            ];

        foreach ($systems as $key => $system) {
            System::create($system);
        }
    }
}

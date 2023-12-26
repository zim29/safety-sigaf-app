<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Profession;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
                ['name' => 'Programador'],
                ['name' => 'Médico'],
                ['name' => 'Ingeniero'],
            ];

        foreach ($professions as $key => $profession) {
            Profession::create($profession);
        }
    }
}

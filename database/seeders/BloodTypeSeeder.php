<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BloodType;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bloodTypes = Array(
            'AB+', 
            'AB-', 
            'A+', 
            'A-', 
            'B+', 
            'B-',
            'O+',
            'O-',
        );

        foreach ($bloodTypes as $bloodType) {
            BloodType::create(['name' => $bloodType]);
        }
    }
}

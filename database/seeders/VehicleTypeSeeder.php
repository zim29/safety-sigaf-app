<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\VehicleType;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Carro',
            'Motocicleta',
            'Montacarga',
            'Tractor',
        ];

        foreach ($types as $key => $type) {
            VehicleType::create(['name' => $type]);
        }
    }
}

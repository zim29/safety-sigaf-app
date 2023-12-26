<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use App\Models\Brigade;

class BrigadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brigades = Array(
            'No Brigadista', 
            'Brigadista Contra Incendios', 
            'Brigadista De Control De Derrames', 
            'Brigadista De Evacuación', 
            'Lider De Control De Derrames', 
            'Lider De Evacición', 
            'Lider De Primeros Auxilios', 
            'Lider Suplente De Evacuación', 
            'Seguridad Física', 
        );

        foreach ($brigades as $brigade) {
            Brigade::create(['name' => $brigade]);
        }
    }
}

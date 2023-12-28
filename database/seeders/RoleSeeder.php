<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Coordinator'],
            ['name' => 'Administrative'],
            ['name' => 'Head of area'],
            ['name' => 'Security supervisor'],
            ['name' => 'Guardian'],
            ['name' => 'Manager'],
            ['name' => 'Risk Professional'],
            ['name' => 'Carnetization'],
            ['name' => 'Employee'],
            ['name' => 'Visitor'],
        ]
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Plant manager'],
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
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }
    }
}

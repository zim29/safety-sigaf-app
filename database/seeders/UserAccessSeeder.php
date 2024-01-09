<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserAccess;
use App\Models\User;
use App\Models\ContractInformation;

class UserAccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAccess::create(['user_id' => 1, 'role_id' => 7, 'company_id' => 1, 'from' => '2023-01-01', 'until' => '2024-12-01']);

        $users = ContractInformation::all();

        foreach ($users as $key => $user) {
            UserAccess::create(['user_id' => $user->user_id, 'role_id' => rand(1,11), 'company_id' => $user->company_id, 'from' => '2023-01-01', 'until' => '2024-12-01']);
        }
    }
}

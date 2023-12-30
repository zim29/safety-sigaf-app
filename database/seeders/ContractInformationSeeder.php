<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Position;
use App\Models\User;
use App\Models\ContractInformation;

class ContractInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $key => $user) {
            ContractInformation::create(['user_id' => $user->id, 
                                            'position_id' => Position::inRandomOrder()->first()->id,
                                            'company_id' => Company::inRandomOrder()->first()->id,
                                        ]);
        }
    }
}

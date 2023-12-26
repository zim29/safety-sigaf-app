<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = [
            'name' => "Jose Alberto",
            'surname' => "Rosa Mañan",
            'email' => "jrosamanan@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
            'document_type_id' => \App\Models\DocumentType::inRandomOrder()->first()->id,
            'document_number' => "40226555429",
            'phone_number' => "8094202055",
            'dob' => "1997-04-29",
            'profession_id' => \App\Models\Profession::inRandomOrder()->first()->id,
            'brigade_id' => \App\Models\Brigade::inRandomOrder()->first()->id,
            'gender_id' => \App\Models\Gender::inRandomOrder()->first()->id,
            'em_co_name' => "Natalia Manan",
            'em_co_phone' => "8094347228",
            'blood_type_id' => \App\Models\BloodType::inRandomOrder()->first()->id,
            'city_id' => \App\Models\City::inRandomOrder()->first()->id,
        ];
        User::create($adminUser);
        User::factory(300)->create();
    }
}

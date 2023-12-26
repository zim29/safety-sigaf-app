<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(BrigadeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(TerminalSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

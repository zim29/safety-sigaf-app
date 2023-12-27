<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'placard' => fake()->unique()->numerify('######'),
            't_placard' => fake()->unique()->numerify('######'),
            'color_id' => Color::inRandomOrder()->first()->id,
            'vehicle_brand_id' => VehicleBrand::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'model' => Str::random(4),
        ];
    }
}

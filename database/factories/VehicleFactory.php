<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Color;
use App\Models\Company;


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
            'vehicle_type_id' => VehicleType::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'model' => Str::random(4),
        ];
    }
}

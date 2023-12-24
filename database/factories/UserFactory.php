<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\DocumentType;
use App\Models\Profession;
use App\Models\Brigade;
use App\Models\Gender;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Terminal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $allergies = ["Polen",
                        "Ácaros del polvo",
                        "Moho",
                        "Caspa de animales",
                        "Leche",
                        "Huevo",
                        "Maní",
                        "Nueces",
                        "Trigo",
                        "Soja",
                        "Pescado",
                        "Mariscos",
                        "Picaduras de insectos (abejas, avispas, mosquitos)",
                        "Medicamentos (penicilina, aspirina, ibuprofeno)",
                        "Látex",
                        "Níquel",
                        "Cobalto",
                        "Cromo",
                        "Veneno de insectos",
                        "Proteínas de la leche de vaca",
                        "Gluten"
                    ];

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123456'),
            'remember_token' => Str::random(10),
            'document_type_id' => DocumentType::inRandomOrder()->first()->id,
            'document_number' => fake()->unique()->numerify('###########'),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'dob' => fake()->dateTimeBetween('-60 years', '-20 years'),
            'profession_id' => Profession::inRandomOrder()->first()->id,
            'brigade_id' => Brigade::inRandomOrder()->first()->id,
            'gender_id' => Gender::inRandomOrder()->first()->id,
            'em_co_name' => fake()->name(),
            'em_co_phone' => fake()->unique()->e164PhoneNumber(),
            'allergies' => fake()->randomElement($allergies),
            'blood_type_id' => BloodType::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first->id,
            'terminal_id' => Terminal::inRandomOrder()->first->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalData>
 */
class PersonalDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birthplace' => fake()->city(),
            'address' => fake()->address(),
            'birthdate' => fake()->date(),
            'gender' => fake()->randomElement(['L', 'P']),
            'religion' => fake()->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghuchu']),
            'phone' => fake()->phoneNumber(),
            'photo_filepath' => fake()->imageUrl(),
        ];
    }
}

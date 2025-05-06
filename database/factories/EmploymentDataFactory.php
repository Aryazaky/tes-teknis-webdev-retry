<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentData>
 */
class EmploymentDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rank' => fake()->randomElement(['A', 'B', 'C', 'D']),
            'echelon' => fake()->randomElement(['I', 'II', 'III', 'IV']),
            'position' => fake()->jobTitle(),
            'assignment_location' => fake()->city(),
            'department' => fake()->randomElement(['HR', 'Finance', 'IT', 'Marketing']),
            'taxpayer_id' => fake()->unique()->randomNumber(8, true),
        ];
    }
}

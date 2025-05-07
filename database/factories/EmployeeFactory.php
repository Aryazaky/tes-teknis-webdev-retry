<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PersonalData;
use App\Models\EmploymentData;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_number' => fake()->unique()->randomNumber(8, true),
            'name' => fake()->name(),
            'photo_filepath' => fake()->imageUrl(),
        ];
    }

    public function hasPersonalData(): static
    {
        return $this->has(PersonalData::factory());
    }

    public function hasEmploymentData(): static
    {
        return $this->has(EmploymentData::factory());
    }
}

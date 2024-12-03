<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Job_Title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),
            'Job_Salary' => fake()->numberBetween(20000, 100000)
        ];
    }
}

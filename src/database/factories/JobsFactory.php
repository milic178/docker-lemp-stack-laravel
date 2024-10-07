<?php

namespace Database\Factories;

use App\Models\Employers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employers::factory(),
            'salary' => fake()->biasedNumberBetween(10000, 130000, function ($x) {
                // Multiply by 10,000 and round to the nearest multiple of 10,000
                return round($x * 100) * 100; // This ensures the bias towards multiples of 10,000
            })
            //
        ];
    }
}

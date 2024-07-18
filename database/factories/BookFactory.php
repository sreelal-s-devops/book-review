<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence($nbWords = 6, $variableNbWords = true),
            'author'=>fake()->name(),
            'created_at' => fake()->dateTimeBetween('-3 years','-1 years'),
            'updated_at' => fake()->dateTimeBetween('-2 year', '-1 years'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' =>null,
            'rating' => fake()->numberBetween(1, 5),
            'review' =>fake()->sentence(),
            'user_id'=> User::inRandomOrder()->first()->id,
            'created_at' => fake()->dateTimeBetween('-3 years','-1 years'),
            'updated_at' => fake()->dateTimeBetween('-2 year', '-1 years'),
        ];
    }
    public function good()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(4,5)
            ];
        });
    }
    public function average()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(3,4)
            ];
        });
    }
    public function poor()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(1,2)
            ];
        });
    }
}

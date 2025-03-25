<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R']),
            'language' => $this->faker->languageCode(),
            'poster_url' => $this->faker->imageUrl(),
        ];
    }
}

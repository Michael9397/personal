<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wine>
 */
class WineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'color' => fake()->randomElement(['red', 'white']),
            'type' => fake()->randomElement(['Chadonnay', 'Merlot', 'Cabernet', 'Pinot Noir', 'Sauvignon Blanc', 'Riesling', 'Syrah', 'Zinfandel', 'Malbec', 'Pinot Grigio', 'Champagne', 'Prosecco', 'Cava', 'Brut', 'Extra Dry', 'Demi-Sec', 'Sec', 'Doux']),
            'from' => fake()->city,
            'liked_it' => fake()->boolean,
            'notes' => fake()->sentence(rand(5, 30)),
            'time_tried' => fake()->date,
        ];

    }
}

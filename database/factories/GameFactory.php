<?php

namespace Database\Factories;

use App\Models\Kind;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_game' => fake()->name(),
            'description_game' => fake()->text(),
            'image_game' => fake()->imageUrl(),
        ];
    }
}

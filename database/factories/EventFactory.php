<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Game;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nb_players' => fake()->numberBetween(0, 1000),
            'place' => fake()->numberBetween(0, 1000),
            'date_event' => fake()->date(),
            'hour_event' => fake()->time(),
            'description_event' => fake()->text(),
            'address_id' => rand(1, Address::count()),
            'game_id' => rand(1, Game::count()),
            'user_id' => rand(1, User::count()),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content_comment' => fake()->text(),
            'note_event' => fake()->numberBetween(0, 5),
            'event_id' => rand(1, Event::count()),
            'user_id' => rand(1, User::count()),
        ];
    }
}

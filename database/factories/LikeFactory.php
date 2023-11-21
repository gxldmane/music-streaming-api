<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->value('id');
        return [
            'user_id' => $userId,
            'likable_type' => $this->faker->randomElement(['track', 'album', 'playlist', 'artist']),
            'likable_id' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::inRandomOrder()->value('id');
        $trackId = Track::inRandomOrder()->value('id');
        return [
            'user_id' => $userId,
            'track_id' => $trackId,
            'rating' => random_int(1, 10),
        ];
    }
}

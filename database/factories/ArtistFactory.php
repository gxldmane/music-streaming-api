<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genreId = Genre::inRandomOrder()->value('id');

        return [
            'name' => $this->faker->name,
            'genre_id' => $genreId,
            'bio' => $this->faker->sentence(10),
        ];
    }
}

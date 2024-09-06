<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artistId = Artist::inRandomOrder()->value('id');
        $genreId = Genre::inRandomOrder()->value('id');

        return [
            'title' => $this->faker->word,
            'artist_id' => $artistId,
            'genre_id' => $genreId,
            'release_date' => $this->faker->date,
            'cover_image' => $this->faker->imageUrl,
        ];
    }
}

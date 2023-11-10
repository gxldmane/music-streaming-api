<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
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
        $albumId = Album::inRandomOrder()->value('id');


        return [
            'title' => $this->faker->word,
            'artist_id' => $artistId,
            'album_id' => $albumId,
            'genre_id' => $genreId,
            'file_path' => $this->faker->word,
            'duration' => random_int(50, 200),
            'uploaded_by' => 1
        ];
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        UserSeeder::class,
        GenreSeeder::class,
        ArtistSeeder::class,
        AlbumSeeder::class,
        TrackSeeder::class,
        PlaylistSeeder::class,
        RatingSeeder::class,
        ReviewSeeder::class,
    ];

    public function run(): void
    {
        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        };
    }
}

<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Playlist::factory()
            ->count(30)
            ->create();

        Playlist::all()->each(function ($playlist) {
            $tracks = Track::inRandomOrder()->take(rand(5,15))->pluck('id');
            $playlist->tracks()->attach($tracks);
        });
    }
}

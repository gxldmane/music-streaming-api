<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Track;
use App\Policies\AlbumPolicy;
use App\Policies\ArtistPolicy;
use App\Policies\GenrePolicy;
use App\Policies\PlaylistPolicy;
use App\Policies\RatingPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\TrackPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Album::class => AlbumPolicy::class,
        Artist::class => ArtistPolicy::class,
        Genre::class => GenrePolicy::class,
        Playlist::class => PlaylistPolicy::class,
        Rating::class => RatingPolicy::class,
        Review::class => ReviewPolicy::class,
        Track::class => TrackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Resources\v1\Like\LikeCollection;
use App\Http\Resources\v1\Track\TrackCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getTrackLikes() {
        $user = Auth::user();

        return new LikeCollection($user->trackLikes);
    }

    public function getAlbumLikes() {
        $user = Auth::user();

        return new LikeCollection($user->albumLikes);
    }

    public function getPlaylistLikes() {
        $user = Auth::user();

        return new LikeCollection($user->playlistLikes);
    }

    public function getArtistLikes() {
        $user = Auth::user();

        return new LikeCollection($user->artistLikes);
    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Resources\v1\Track\TrackCollection;
use App\Models\Album;
use App\Models\Like;
use App\Models\Playlist;
use App\Models\Track;
use App\Services\LikeService;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function likeTrack($trackId)
    {
        return $this->likeService->toggleLike(Track::class, $trackId);
    }

    public function likeAlbum($albumId)
    {
        return $this->likeService->toggleLike(Album::class, $albumId);
    }

    public function likePlaylist($playlistId)
    {
        return $this->likeService->toggleLike(Playlist::class, $playlistId);
    }

    public function userLikedTracks() {
        $userId = 1;

        $likedTracks = $this->likeService->getLikedTracks($userId);


        return $likedTracks;
    }


}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Resources\v1\Like\LikeCollection;
use App\Http\Resources\v1\Track\TrackCollection;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Like;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\User;
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
        $userId = Auth::user()->id;
        return $this->likeService->toggleLike(Track::class, $trackId, $userId);
    }

    public function likeAlbum($albumId)
    {
        $userId = Auth::user()->id;
        return $this->likeService->toggleLike(Album::class, $albumId, $userId);
    }

    public function likePlaylist($playlistId)
    {
        $userId = Auth::user()->id;
        return $this->likeService->toggleLike(Playlist::class, $playlistId, $userId);
    }

    public function likeArtist($artistId)
    {
        $userId = Auth::user()->id;
        return $this->likeService->toggleLike(Artist::class, $artistId, $userId);
    }


}

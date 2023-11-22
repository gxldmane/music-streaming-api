<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Like;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    public function toggleLike($modelClass, $modelId)
    {
        $userId = 1;

        $classMapping = [
            Track::class => 'track',
            Playlist::class => 'playlist',
            Album::class => 'album',
        ];

        $like = Like::updateOrCreate(
            [
                'likable_id' => $modelId,
                'user_id' => $userId,
                'likable_type' => $classMapping[$modelClass],
            ],
        );

        if ($like->wasRecentlyCreated) {
            $message = 'Liked successfully';
        } else {
            $like->delete();
            $message = 'Unliked successfully';
        }

        return response()->json(['message' => $message]);
    }

    public function getLikedTracks($userId) {
        return Like::where('user_id', $userId)
            ->where('likable_type', 'App\Models\Track')
            ->with('likable')
            ->get();
    }

    public function getLikedAlbums($userId) {
        return Like::where('user_id', $userId)
            ->where('likable_type', 'album')
            ->with('likable')
            ->paginate();
    }

    public function getLikedPlaylists($userId) {
        return Like::where('user_id', $userId)
            ->where('likable_type', 'playlist')
            ->with('likable')
            ->paginate();
    }
}

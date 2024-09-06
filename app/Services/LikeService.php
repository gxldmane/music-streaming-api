<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Like;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    public function toggleLike($modelClass, $modelId, $userId)
    {

        $classMapping = [
            Track::class => 'track',
            Playlist::class => 'playlist',
            Album::class => 'album',
            Artist::class => 'artist',
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

}

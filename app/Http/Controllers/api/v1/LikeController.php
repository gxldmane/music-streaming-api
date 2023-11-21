<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Album;
use App\Models\Like;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeTrack($trackId)
    {
        return $this->toggleLike(Track::class, $trackId);
    }

    public function likeAlbum($albumId)
    {
        return $this->toggleLike(Album::class, $albumId);
    }

    public function likePlaylist($playlistId)
    {
        return $this->toggleLike(Playlist::class, $playlistId);
    }

    private function toggleLike($modelClass, $modelId)
    {
        $userId = 1;

        $model = $modelClass::findOrFail($modelId);


        $like = Like::where('likable_id', $modelId)
            ->where('user_id', $userId)
            ->where('likable_type', $modelClass)
            ->first();


        if ($like) {
            // Удаляем лайк, если уже поставлен

            $like->delete();
            $message = 'Unliked successfully';
        } else {
            // Создаем лайк, если еще не поставлен
            $model->likes()->create([
                'user_id' => $userId,
            ]);

            $message = 'Liked successfully';
        }

        return response()->json(['message' => $message]);
    }
}

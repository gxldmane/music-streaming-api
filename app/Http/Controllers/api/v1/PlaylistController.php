<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Playlist\StorePlaylistRequest;
use App\Http\Requests\v1\Playlist\UpdatePlaylistRequest;
use App\Http\Resources\v1\Playlist\PlaylistCollection;
use App\Http\Resources\v1\Playlist\PlaylistResource;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class PlaylistController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Playlist::class, 'playlist');
    }


    public function index()
    {
        $playlists = QueryBuilder::for(Playlist::class)
            ->allowedIncludes('tracks')
            ->paginate();

        return new PlaylistCollection($playlists);
    }

    public function store(StorePlaylistRequest $request)
    {
        $data = $request->validated();

        $playlist = Playlist::create($data);

        $playlist->tracks()->attach($data['track_ids']);

        return new PlaylistResource($playlist);
    }

    public function show(Playlist $playlist)
    {
        return new PlaylistResource(($playlist)->load('tracks'));
    }

    public function update(UpdatePlaylistRequest $request, Playlist $playlist)
    {
        $userId = Auth::user()->id;
        if ($playlist->created_by == $userId) {
            $data = $request->validated();

            $playlist->update($data);

            if ($data['track_ids']) {
                $playlist->tracks()->sync($data['track_ids']);
            }

            return new PlaylistResource($playlist);
        }

        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);


    }

    public function destroy(Playlist $playlist)
    {
        $userId = Auth::user()->id;
        if ($playlist->created_by == $userId) {
            $playlist->delete();
            return response()->noContent();
        }

        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);


    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Album\StoreAlbumRequest;
use App\Http\Requests\v1\Album\UpdateAlbumRequest;
use App\Http\Resources\v1\Album\AlbumCollection;
use App\Http\Resources\v1\Album\AlbumResource;
use App\Models\Album;
use Spatie\QueryBuilder\QueryBuilder;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Album::class, 'album');
    }


    public function index()
    {
        $albums = QueryBuilder::for(Album::class)
            ->allowedIncludes('tracks')
            ->allowedFilters('artist_id', 'genre_id', 'title')
            ->paginate();

        return new AlbumCollection($albums);
    }

    public function store(StoreAlbumRequest $request)
    {
        $data = $request->validated();

        $album = Album::create($data);

        return new AlbumResource($album);
    }

    public function show(Album $album)
    {
        return new AlbumResource(($album)->load('tracks'));
    }

    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $data = $request->validated();

        $album->update($data);

        return new AlbumResource($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Artist\StoreArtistRequest;
use App\Http\Requests\v1\Artist\UpdateArtistRequest;
use App\Http\Resources\v1\Artist\ArtistCollection;
use App\Http\Resources\v1\Artist\ArtistResource;
use App\Models\Artist;
use Spatie\QueryBuilder\QueryBuilder;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = QueryBuilder::for(Artist::class)
            ->allowedIncludes('tracks')
            ->paginate();

        return new ArtistCollection($artists);
    }

    public function store(StoreArtistRequest $request)
    {
        $data = $request->validated();

        $artist = Artist::create($data);

        return new ArtistResource($artist);
    }

    public function show(Artist $artist)
    {
        return new ArtistResource(($artist)->load('tracks'));
    }

    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $data = $request->validated();
        $artist->update($data);

        return new ArtistResource($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return response()->noContent();
    }
}

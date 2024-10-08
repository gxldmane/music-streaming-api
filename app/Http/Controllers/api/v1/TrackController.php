<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Track\StoreTrackRequest;
use App\Http\Requests\v1\Track\UpdateTrackRequest;
use App\Http\Resources\v1\Track\TrackCollection;
use App\Http\Resources\v1\Track\TrackResource;
use App\Models\Track;
use Spatie\QueryBuilder\QueryBuilder;

class TrackController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Track::class, 'track');
    }
    public function index()
    {
        $tracks = QueryBuilder::for(Track::class)
            ->allowedFilters([
                'artist_id',
                'album_id',
                'genre_id',
            ])
            ->paginate();

        return new TrackCollection($tracks);
    }


    public function store(StoreTrackRequest $request)
    {
        $data = $request->validated();

        $track = Track::create($data);

        $albumId = $track['album_id'];

        $track->album()->associate($albumId);
        $track->save();

        return new TrackResource($track);
    }

    public function show(Track $track)
    {
        return new TrackResource($track);
    }

    public function update(UpdateTrackRequest $request, Track $track)
    {
        $data = $request->validated();

        $track->update($data);

        return new TrackResource($track);
    }

    public function destroy(Track $track)
    {
        $track->delete();

        return response()->noContent();
    }
}

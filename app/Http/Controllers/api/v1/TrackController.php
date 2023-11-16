<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Models\Track;

class TrackController extends Controller
{
    public function index()
    {
        return Track::all();
    }


    public function store(StoreTrackRequest $request)
    {
        //
    }

    public function show(Track $track)
    {
        //
    }

    public function update(UpdateTrackRequest $request, Track $track)
    {
        //
    }

    public function destroy(Track $track)
    {
        //
    }
}

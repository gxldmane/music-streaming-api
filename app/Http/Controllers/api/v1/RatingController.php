<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Rating\StoreRatingRequest;
use App\Http\Requests\v1\Rating\UpdateRatingRequest;
use App\Http\Resources\v1\Rating\RatingCollection;
use App\Http\Resources\v1\Rating\RatingResource;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class RatingController extends Controller
{

    public function index()
    {
        $ratings = QueryBuilder::for(Rating::class)
            ->allowedSorts('rating', 'created_at', 'updated_at')
            ->paginate();

        return new RatingCollection($ratings);
    }

    public function store(StoreRatingRequest $request)
    {
        $data = $request->validated();

        $rating = Rating::create($data);

        return new RatingResource($rating);
    }

    public function show(Rating $rating)
    {
        return new RatingResource($rating);
    }

    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $userId = Auth::user()->id;
        if ($rating->user_id == $userId) {
            $data = $request->validated();
            $rating->update($data);
            return new RatingResource($rating);
        }

        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);


    }

    public function destroy(Rating $rating)
    {
        $userId = Auth::user()->id;
        if ($rating->user_id == $userId) {
            $rating->delete();

            return response()->noContent();
        }

        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);
    }
}

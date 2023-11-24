<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Review\StoreReviewRequest;
use App\Http\Requests\v1\Review\UpdateReviewRequest;
use App\Http\Resources\v1\Review\ReviewCollection;
use App\Http\Resources\v1\Review\ReviewResource;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = QueryBuilder::for(Review::class)
            ->allowedSorts('created_at', 'updated_at')
            ->paginate();

        return new ReviewCollection($reviews);

    }


    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        $review = Review::create($data);

        return new ReviewResource($review);
    }


    public function show(Review $review)
    {
        return new ReviewResource($review);
    }


    public function update(UpdateReviewRequest $request, Review $review)
    {
        $userId = Auth::user()->id;

        if ($review->user_id == $userId) {
            $data = $request->validated();
            $review->update($data);

            return new ReviewResource($review);
        }

        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);

    }

    public function destroy(Review $review)
    {
        $userId = Auth::user()->id;

        if ($review->user_id == $userId) {
            $review->delete();

            return response()->noContent();
        }
        return response()->json([
            'message' => "Доступ запрещен"
        ], 403);

    }
}

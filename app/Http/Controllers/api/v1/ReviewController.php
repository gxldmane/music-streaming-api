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
    public function __construct()
    {
        $this->authorizeResource(Review::class, 'review');
    }

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

        $review = Auth::user()->reviews()->create($data);

        return new ReviewResource($review);
    }


    public function show(Review $review)
    {
        return new ReviewResource($review);
    }


    public function update(UpdateReviewRequest $request, Review $review)
    {

        $data = $request->validated();
        $review->update($data);

        return new ReviewResource($review);
    }

    public function destroy(Review $review)
    {

        $review->delete();

        return response()->noContent();

    }
}

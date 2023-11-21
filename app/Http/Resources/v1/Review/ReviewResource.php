<?php

namespace App\Http\Resources\v1\Review;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'track_id' => $this->track_id,
            'review_text' => $this->review_text,
            'published' => $this->created_at,
            'updated' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources\v1\Album;

use App\Http\Resources\v1\Track\TrackResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
            'title' => $this->title,
            'artist_id' => $this->artist_id,
            'genre_id' => $this->genre_id,
            'release_date' => $this->release_date,
            'cover_image' => $this->cover_image,
            'tracks' => TrackResource::collection($this->whenLoaded('tracks')),
        ];
    }
}

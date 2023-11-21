<?php

namespace App\Http\Resources\v1\Artist;

use App\Http\Resources\v1\Track\TrackResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            'name' => $this->name,
            'genre_id' => $this->genre_id,
            'bio' => $this->bio,
            'tracks' => TrackResource::collection($this->whenLoaded('tracks')),
        ];
    }
}

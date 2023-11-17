<?php

namespace App\Http\Resources\v1\Playlist;

use App\Http\Resources\v1\Track\TrackResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
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
            'description' => $this->description,
            'created_by' => $this->created_by,
            'tracks' => TrackResource::collection($this->whenLoaded('tracks')),
        ];
    }
}

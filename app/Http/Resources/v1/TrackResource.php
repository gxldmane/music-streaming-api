<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TrackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'artist_id' => $this->artist_id,
            'album_id' => $this->album_id,
            'genre_id' => $this->genre_id,
            'file_path' => $this->file_path, // в будущем только для админа, простому пользователю незачем
            'duration' => $this->duration,
            'uploaded_by' => $this->uploaded_by, // тоже только для админа в будущем
        ];
    }
}

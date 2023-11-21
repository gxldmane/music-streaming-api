<?php

namespace App\Http\Requests\v1\Album;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255', 'required'],
            'artist_id' => ['sometimes','integer', 'required'],
            'genre_id' => ['sometimes','integer', 'required', 'exists:genres,id'],
            'released_date' => ['sometimes','date_format:Y-m-d', 'max:255', 'required'],
            'cover_image' => ['sometimes','file', 'max:255', 'required'],
        ];
    }
}

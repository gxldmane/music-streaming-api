<?php

namespace App\Http\Requests\v1\Track;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrackRequest extends FormRequest
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
            'title' => ['sometimes', 'string', 'max:100', 'required'],
            'artist_id' => ['sometimes','integer', 'exists:artists,id'],
            'album_id' => ['sometimes', 'nullable', 'integer', 'exists:albums,id'],
            'genre_id' => ['sometimes','integer', 'exists:genres,id'],
            'file_path' => ['sometimes','string', 'required', 'max:255'],
            'duration' => ['sometimes','integer', 'required']
        ];
    }
}

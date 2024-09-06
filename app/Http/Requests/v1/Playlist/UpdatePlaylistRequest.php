<?php

namespace App\Http\Requests\v1\Playlist;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaylistRequest extends FormRequest
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
            'title' => ['string', 'required', 'max:30'],
            'description' => ['string', 'required', 'max:255'],
            'track_ids' => ['required', 'array'],
            'track_ids.*' => ['exists:tracks,id'],
        ];
    }
}

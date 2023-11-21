<?php

namespace App\Http\Requests\v1\Track;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTrackRequest extends FormRequest
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
            'title' => ['string', 'max:100', 'required'],
            'artist_id' => ['integer', 'exists:artists,id'],
            'album_id' => ['integer', 'nullable', 'exists:albums,id'],
            'genre_id' => [
                'integer',
                'exists:genres,id',
                Rule::exists('albums', 'genre_id')->where(function ($query){
                    $query->where('id', $this->input('album_id'));
                })
            ],
            'file_path' => ['string', 'required', 'max:255'],
            'duration' => ['integer', 'required']
        ];
    }
}

<?php

namespace App\Http\Requests\v1\Artist;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
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
            'name' => ['string', 'max:40', 'required'],
            'genre_id' => ['exists:genres,id', 'integer'],
            'bio' => ['string', 'max:255', 'required']
        ];
    }
}

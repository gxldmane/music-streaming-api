<?php

namespace App\Http\Requests\v1\Artist;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'max:40', 'required'],
            'genre_id' => ['sometimes','exists:genres,id', 'integer'],
            'bio' => ['sometimes','string', 'max:255', 'required']
        ];
    }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\v1\Genre\StoreGenreRequest;
use App\Http\Requests\v1\Genre\UpdateGenreRequest;
use App\Http\Resources\v1\Genre\GenreCollection;
use App\Http\Resources\v1\Genre\GenreResource;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Genre::class, 'genre');
    }

    public function index()
    {
        return new GenreCollection(Genre::paginate());
    }

    public function store(StoreGenreRequest $request)
    {
        $data = $request->validated();

        $genre = Genre::create($data);

        return new GenreResource($genre);
    }

    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }


    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $data = $request->validated();

        $genre->update($data);

        return new GenreResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->noContent();
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers\api\v1', 'prefix' => 'v1'], function () {
        Route::apiResource('tracks', 'TrackController');
        Route::apiResource('albums', 'AlbumController');
        Route::apiResource('genres', 'GenreController');
        Route::apiResource('playlists', 'PlaylistController');
        Route::apiResource('artists', 'ArtistController');
        Route::apiResource('reviews', 'ReviewController');
        Route::apiResource('ratings', 'RatingController');

        Route::post('/tracks/{trackId}/like', 'LikeController@likeTrack');
        Route::post('/albums/{albumId}/like', 'LikeController@likeAlbum');
        Route::post('/playlists/{playlistId}/like', 'LikeController@likePlaylist');

        Route::get('/user/liked-tracks', 'LikeController@userLikedTracks');
});

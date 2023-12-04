<?php

use App\Http\Controllers\api\v1\AuthController;
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
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);


        Route::group(['middleware' => 'auth:sanctum'],function () {
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
            Route::post('/artists/{artistId}/like', 'LikeController@likeArtist');

            Route::get('/users/tracks', 'UserController@getTrackLikes');
            Route::get('/users/albums', 'UserController@getAlbumLikes');
            Route::get('/users/playlists', 'UserController@getPlaylistLikes');
            Route::get('/users/artists', 'UserController@getArtistLikes');
        });





});

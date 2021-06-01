<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'planets'   => 'API\PlanetController',
    'starships' => 'API\StarshipController',
    'films'     => 'API\FilmController',
]);

Route::get('people/{id}/movies', 'API\PeopleController@movies');

Route::get('people/{character_id}/films', function ($character_id) {
    return response(\App\Film::ofCharacter($character_id)->get());
});

Route::get('films/{film_id}/starships', function ($film_id) {
    return response(\App\Starship::ofFilm($film_id)->get());
});

Route::get('films/{film_id}/characters', function ($film_id) {
    return response(\App\People::ofFilm($film_id)->get());
});

Route::get('films/{film_id}/planets', function ($film_id) {
    return response(\App\Planet::ofFilm($film_id)->get());
});

Route::get('films/{film_id}/vehicles', function ($film_id) {
    return response(\App\Vehicle::ofFilm($film_id)->get());
});

Route::get('films/{film_id}/species', function ($film_id) {
    return response(\App\Species::ofFilm($film_id)->get());
});

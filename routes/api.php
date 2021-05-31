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
Route::get('films/{film_id}/{collection}', 'API\FilmController@relation');

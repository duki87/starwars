<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/planets', 'API\PlanetController@index');
Route::get('/people/{id}/movies', 'API\PeopleController@movies');

Route::get('/films', function () {
    return view('film.index');
})->name('films.index');

Route::get('/starships', function () {
    return view('starship.index');
})->name('starship.index');

Route::get('/films/{film_id}/{collection}', function ($film_id, $collection) {
    return view('film.relation')
        ->with('film_id', $film_id)
        ->with('collection', $collection);
})->name('films.relation');


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
Auth::routes();

Route::middleware('auth:admin')->get('/starships', function () {
    dd(auth()->user());
    return view('starship.index');
})->name('starship.index');

Route::any('{any}', function () {
    return view('index');
})->where('any', '.*');

Route::get('/planets', 'API\PlanetController@index');
Route::get('/people/{id}/movies', 'API\PeopleController@movies');

// Route::get('/films', function () {
//     return view('film.index');
// })->name('films.index');

// Route::get('/films/{film}', function (\App\Film $film) {
//     return view('film.show')->with('film', $film);
// })->name('film.show');

Route::get('/graphql-instructions', function () {
    return view('graphql.instructions');
})->name('graphql.instructions');

Route::get('/home', 'HomeController@index')->name('home');

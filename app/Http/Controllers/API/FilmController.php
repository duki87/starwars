<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Film;
use App\Starship;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        $key = 'episode_id';
        $rule = 'asc';
        if(isset($request['sort']) && !is_null($request['sort'])) {
            list($key, $rule) = explode('|', request('sort'));
        }
        $films = Film::sortData($key, $rule)->paginateData(5)->getData();
        return response($films, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $film = Film::findById($id);
        return response($film, 200);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function starships($film_id)
    {
        $starships = Starship::filterData($film_id, 'films')->getData();
        return response($starships, 200);
    }
}

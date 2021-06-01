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
        $films = Film::withCount('starships')->withCount('planets')->withCount('characters')->withCount('vehicles')->withCount('species')->orderBy($key, $rule)->paginate(5);
        return response($films, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $film = Film::find($id);
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
}

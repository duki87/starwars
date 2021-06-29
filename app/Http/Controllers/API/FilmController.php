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
        $request->validate([
            'title' => 'required',
            'release_date' => 'required',
            'opening_crawl' => 'required',
            'episode_id' => 'required',
            'director' => 'required',
            'producer' => 'required',
        ]);

        try {
            $film = new Film;
            $film->title = $request->title;
            $film->release_date = $request->release_date;
            $film->opening_crawl = $request->opening_crawl;
            $film->episode_id = $request->episode_id;
            $film->director = $request->director;
            $film->producer = $request->producer;
            $film->save();
            $film->characters()->attach($request->characters);
            $film->planets()->attach($request->planets);
            $film->starships()->attach($request->starships);
            $film->vehicles()->attach($request->vehicles);
            $film->species()->attach($request->species);
            return response('SUCCESS', 201);
        } catch(\Exception $e) {
            return response('ERROR: '.$e->getMessage(), 500);
        }
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

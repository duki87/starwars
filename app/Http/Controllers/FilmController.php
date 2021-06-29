<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
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
        if($request->ajax()) {
            return response('SUCCESS', 201);
        }
        return redirect('/films');
    }
}

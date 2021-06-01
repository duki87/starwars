<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\FilmResource;
use App\Helpers\CollectionHelper;
use App\Starship;

class StarshipController extends Controller
{

    public function index()
    {
        $key = 'id';
        $rule = 'asc';
        if(isset($request['sort']) && !is_null($request['sort'])) {
            list($key, $rule) = explode('|', request('sort'));
        }
        $starships = Starship::whereNotIn('passengers', ["n/a", "unknown"])->whereRaw('CAST(passengers AS integer) > 84000')->paginate(5);
        //dd(Starship::pluck('passengers'));
        return response($starships, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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

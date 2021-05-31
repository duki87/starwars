<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Planet;

class PlanetController extends Controller
{
    public function index()
    {
        $key = 'episode_id';
        $rule = 'asc';
        if(isset($request['sort']) && !is_null($request['sort'])) {
            list($key, $rule) = explode('|', request('sort'));
        }
        $planets = Planet::sortData($key, $rule)->paginateData(5)->getData();
        $planets = $planets->filter(function ($planet) {
            return Carbon::parse($planet->created)->gt(Carbon::parse('2014-04-12'));
        });
        return response($planets, 200);
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

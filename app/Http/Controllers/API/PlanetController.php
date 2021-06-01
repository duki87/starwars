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
        $key = 'id';
        $rule = 'asc';
        if(isset($request['sort']) && !is_null($request['sort'])) {
            list($key, $rule) = explode('|', request('sort'));
        }
        $planets = Planet::where('created_at', '>', Carbon::parse('2014-04-12'))->paginate(5);
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

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
        $starships = Starship::getData();
        $starships = $starships->filter(function($ship) {
            return $ship->passengers > 84000;
        });
        $pagination = CollectionHelper::pagination($starships, 5);
        return response($pagination, 200);
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

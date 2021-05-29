<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\FilmResource;
use App\Helpers\CollectionHelper;
use App\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::getFromApi();
        // $films = FilmResource::collection(Film::getFromApi());
        $pagination = CollectionHelper::pagination($films, 5);
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

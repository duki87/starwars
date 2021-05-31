<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Repositories\HttpRequestsInterface;
use App\Helpers\CollectionHelper;

class PeopleController extends Controller
{
    protected $httpRequests;

    public function __construct(HttpRequestsInterface $httpRequests)
    {
        $this->httpRequests = $httpRequests;
    }

    public function index()
    {
        
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

    public function movies($id)
    {
        $films = \App\Film::filterData($id, 'people')->getData();
        return response($films, 200);
        // $character = Http::get("https://swapi.dev/api/people/$id/");
        // if($character->getStatusCode() === 404) {
        //     return response("Character not found.", 500);
        // }
        // if($character) {
        //     if(count($character['films']) > 0) {
        //         $response = $this->httpRequests->pool($character['films']);
        //         return response($response, 200);
        //     }
        // }
        // return response("This character has no films.", 500);
    }
}

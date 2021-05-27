<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Repositories\HttpRequestsInterface;
use Illuminate\Http\Request;

class StarshipController extends Controller
{
    protected $httpRequests;

    public function __construct(HttpRequestsInterface $httpRequests)
    {
        $this->httpRequests = $httpRequests;
    }

    public function index()
    {
        $api = Http::get("https://swapi.dev/api/starships/");
        if($api->getStatusCode() === 404) {
            return response("Starships not found.", 500);
        }
        $pages = ceil($api['count']/count($api['results']));
        $urls = array();
        for($i=1;$i<=$pages;$i++) {
            $urls[] = "https://swapi.dev/api/starships/?page=$i";
        }
        $response = call_user_func_array('array_merge', array_column($this->httpRequests->pool($urls), 'results'));
        $collection = collect($response);

        $starships = $collection->filter(function ($ship, $key) {
            return $ship['passengers'] > 84000;
        });
        $starships->all();
        return response($starships->values(), 200);
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

    private function filterStarships($data)
    {
        $results = array();
        for($i=0;$i<count($data);$i++) {
            if($data[$i]['cargo_capacity'] > 84000) {
                $results[] = $data[$i];
            }
        }
        return $results;
    }
}

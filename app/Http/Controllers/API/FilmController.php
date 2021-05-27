<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Repositories\HttpRequestsInterface;

class FilmController extends Controller
{
    protected $httpRequests;

    public function __construct(HttpRequestsInterface $httpRequests)
    {
        $this->httpRequests = $httpRequests;
    }

    public function index()
    {
        $api = Http::get("https://swapi.dev/api/films/");
        if($api->getStatusCode() === 404) {
            return response("Films not found.", 500);
        }
        $pages = ceil($api['count']/count($api['results']));
        $urls = array();
        for($i=1;$i<=$pages;$i++) {
            $urls[] = "https://swapi.dev/api/films/?page=$i";
        }
        $response = call_user_func_array('array_merge', array_column($this->httpRequests->pool($urls), 'results'));
        $collection = collect($response);

        // $planets = $collection->filter(function ($planet, $key) {
        //     return Carbon::parse($planet['created'])->gt(Carbon::parse('2014-04-12'));
        // });
        // $planets->all();

        return response($collection->values(), 200);
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

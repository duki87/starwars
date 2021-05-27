<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Repositories\HttpRequestsInterface;

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
        $character = Http::get("https://swapi.dev/api/people/$id/");
        if($character->getStatusCode() === 404) {
            return response("Character not found.", 500);
        }
        if($character) {
            if(count($character['films']) > 0) {
                $response = $this->httpRequests->pool($character['films']);
                return response($response, 200);
            }
        }
        return response("This character has no films.", 500);
    }
    /*
    public function movies($id)
    {
        $character = Http::get("https://swapi.dev/api/people/$id/");
        /*
        $client = new GuzzleClient();
        $requests = [];

        foreach ($character['films'] as $f) {
            $requests[] = new GuzzleRequest('GET', $f);
        }

        $responses = [];

        $pool = \GuzzleHttp\Pool::batch($client, $requests, array(
            'concurrency' => 15,
            'fulfilled' => function (\GuzzleHttp\Psr7\Response $response, $index) use (&$responses) {
                if ($response->getStatusCode() == 200) {
                    $responses[] = json_decode($response->getBody(), true);
                }
                //print_r($responses); // this will have all the responses 
            },
            'rejected' => function (RequestException $reason, $index) {
                // dd($reason); //you can store it in laravel logs
            },
        ));
        */
        /*
        $movies = array();
        foreach($character['films'] as $film) {
            $movies[] = Http::get($film)->json();
        }
        return response($movies, 200);
    }
    */
}

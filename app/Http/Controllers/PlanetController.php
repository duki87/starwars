<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanetController extends Controller
{
    public function index()
    {
        $cURLConnection = curl_init();
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            'header' => 'User-Agent: StevesCleverAddressScript 3.7.6\r\n'
        ));
        curl_setopt($cURLConnection, CURLOPT_URL, "https://swapi.dev/api/planets/");
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonArrayResponse = json_decode($response, TRUE);
        //$collection = \App\Planet::hydrate($jsonArrayResponse['results']);
        //$collection = collect($jsonArrayResponse);
        // $date = Carbon::parse('2014-04-12');
        // $collection = $collection->filter(function($planet) use($date) {
        //     return Carbon::parse($planet['created'])->gt($date);
        // });
        //dd($jsonArrayResponse);
        return response($jsonArrayResponse, 200);
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

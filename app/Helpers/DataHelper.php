<?php


namespace App\Helpers;

use \GuzzleHttp\Client as GuzzleClient;
use \GuzzleHttp\Psr7\Request as GuzzleRequest;
use \GuzzleHttp\Psr7\Response as GuzzleResponse;
use \GuzzleHttp\Pool;
use \GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class DataHelper
{
    public static function getFromApi($collection, $model)
    {
        $api = Http::get("https://swapi.dev/api/$collection/");
        $pages = ceil($api['count']/count($api['results']));
        $urls = array();
        for($i=1;$i<=$pages;$i++) {
            $urls[] = "https://swapi.dev/api/$collection/?page=$i";
        }
        $data = self::get($urls);
        return self::toCollection($model, $data);
    }

    private static function get($urls)
    {
        $client = new GuzzleClient();
        $requests = [];
        $responses = [];

        $requests = function ($total) use($urls, $client) {
            for ($i = 0; $i < $total; $i++) {
                $url = $urls[$i];
                yield new GuzzleRequest('GET', $url);
            }
        };

        $pool = new Pool($client, $requests(count($urls)), [
            'concurrency' => 5,
            'fulfilled' => function (GuzzleResponse $response, $index) use(&$responses) {
                if ($response->getStatusCode() == 200) {
                    $responses = array_merge(json_decode($response->getBody(), true)['results'], $responses);
                }
            },
            'rejected' => function (RequestException $reason, $index) {

            },
        ]);

        $promise = $pool->promise()->wait();
        return $responses;
    }

    private static function toCollection($model, $data)
    {   
        return $model::hydrate($data);
    }
}
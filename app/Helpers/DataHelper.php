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
    public static function getFromApi($collection, $model, $urls = [])
    {
        $merge = false;
        if(empty($urls)) {
            $api = Http::get("https://swapi.dev/api/$collection/");
            $pages = ceil($api['count']/count($api['results']));
            $urls = array();
            for($i=1;$i<=$pages;$i++) {
                $urls[] = "https://swapi.dev/api/$collection/?page=$i";
            }
            $merge = true;
        }
        $data = self::get($urls, $merge);
        return self::toCollection($model, $data);
    }

    private static function get($urls, $merge = false)
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
            'fulfilled' => function (GuzzleResponse $response, $index) use(&$responses, $merge) {
                if ($response->getStatusCode() == 200) {
                    if($merge) {
                        $responses = array_merge(json_decode($response->getBody(), true)['results'], $responses);
                    } else {
                        $responses[] = json_decode($response->getBody(), true);
                    }
                    
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
        $collection = $model::hydrate($data);
        $collection->each(function($item) {
            $item->id = self::getId($item->url);
        });
        return $collection;
    }

    private static function getId($url)
    {
        $explode = explode('/', rtrim($url, '/'));
        return end($explode);
    }
}
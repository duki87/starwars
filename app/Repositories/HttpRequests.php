<?php

namespace App\Repositories;

use \GuzzleHttp\Client as GuzzleClient;
use \GuzzleHttp\Psr7\Request as GuzzleRequest;
use \GuzzleHttp\Psr7\Response as GuzzleResponse;
use \GuzzleHttp\Pool;
use \GuzzleHttp\Exception\RequestException;

class HttpRequests implements HttpRequestsInterface
{
    public function pool($urls)
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
                    $responses[] = json_decode($response->getBody(), true);
                }
            },
            'rejected' => function (RequestException $reason, $index) {

            },
        ]);

        $promise = $pool->promise()->wait();
        return $responses;
    }
}
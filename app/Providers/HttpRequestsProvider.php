<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\HttpRequestsInterface;
use App\Repositories\HttpRequests;

class HttpRequestsProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(HttpRequestsInterface::class, HttpRequests::class);
    }

    public function boot()
    {
        //
    }
}

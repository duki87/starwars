<?php

namespace App\Repositories;

interface HttpRequestsInterface
{
    public function pool($urls);
}
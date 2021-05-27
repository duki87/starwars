<?php

namespace App\Service;

interface HttpRequestsServiceInterface
{
    public function pool($urls);
}
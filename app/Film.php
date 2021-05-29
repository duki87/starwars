<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\DataHelper;
// use App\Repositories\HttpRequestsInterface;

class Film extends Model
{
    protected $fillable = [
        "title",
        "episode_id",
        "opening_crawl",
        "director",
        "producer",
        "release_date",
        "characters",
        "planets",
        "starships",
        "vehicles",
        "species",
        "created",
        "edited",
        "url"
    ];

    public static function getFromApi()
    {
        $data = DataHelper::getFromApi('films', \App\Film::class);
        return $data;
    }

    public static function characters()
    {
        $data = DataHelper::getFromApi('people', \App\People::class);
        return $data;
    }
}

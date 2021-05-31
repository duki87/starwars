<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;

class Film extends Model
{
    use APIModelTrait;

    protected $fillable = [
        "id",
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

    private static $apiCollection = 'films', $apiClass = \App\Film::class;

    public function characters()
    {
        return ['people', \App\People::class];
    }
}

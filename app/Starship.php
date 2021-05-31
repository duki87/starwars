<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;

class Starship extends Model
{
    use APIModelTrait;

    protected $fillable = [
        "id",
        "name",
        "model",
        "manufacturer",
        "cost_in_credits",
        "length",
        "max_atmosphering_speed",
        "crew",
        "passengers",
        "cargo_capacity",
        "consumables",
        "hyperdrive_rating",
        "MGLT",
        "starship_class",
        "pilots",
        "films",
        "created",
        "edited",
        "url"
    ];

    private static $apiCollection = 'starships', $apiClass = \App\Starship::class;

    public function films()
    {
        return ['films', \App\Film::class];
    }

}

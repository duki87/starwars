<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;

class People extends Model
{
    use APIModelTrait;

    private static $apiCollection = 'people', $apiClass = \App\People::class;

    protected $fillable = [
        "birth_year", "eye_color", "gender", "hair_color", "height", "homeworld", "mass", "name", "skin_color", "created", "edited", "url"
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        "birth_year", "eye_color", "gender", "hair_color", "height", "homeworld", "mass", "name", "skin_color", "created", "edited", "url"
    ];
}

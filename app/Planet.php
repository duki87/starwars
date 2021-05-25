<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $fillable = [
        "name", "rotation_period", "orbital_period", "diameter", "climate", "gravity", "terrain", "surface_water", "population", "created", "edited", "url"
    ];

    public function residents()
    {
        return $this->hasMany(People::class);
    }
}

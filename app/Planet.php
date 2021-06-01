<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;

class Planet extends Model
{
    use APIModelTrait;

    private static $apiCollection = 'planets', $apiClass = \App\Planet::class;

    protected $fillable = [
        "id", "name", "rotation_period", "orbital_period", "diameter", "climate", "gravity", "terrain", "surface_water", "population", "created", "edited", "url"
    ];

    public function residents()
    {
        return $this->hasMany(People::class, 'people_planets');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'films_planets');
    }

    public function scopeOfFilm($query, $film_id) 
    {
        return $query->whereHas('films', function($q) use($film_id) {
            $q->where('film_id', $film_id);
        });
    }
}

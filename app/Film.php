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
        return $this->belongsToMany(People::class, 'people_films');
    }

    public function planets()
    {
        return $this->belongsToMany(Planet::class, 'films_planets');
    }

    public function starships()
    {
        return $this->belongsToMany(Starship::class, 'films_starships');
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'films_vehicles');
    }

    public function species()
    {
        return $this->belongsToMany(Species::class, 'films_species');
    }

    public function scopeOfCharacter($query, $character_id) 
    {
        return $query->whereHas('characters', function($q) use($character_id) {
            $q->where('people_id', $character_id);
        });
    }
}

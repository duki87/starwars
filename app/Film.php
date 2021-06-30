<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(People::class, 'people_films');
    }

    public function planets(): BelongsToMany
    {
        return $this->belongsToMany(Planet::class, 'films_planets');
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, 'films_starships');
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'films_vehicles');
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Species::class, 'films_species');
    }

    public function scopeOfCharacter($query, $character_id) 
    {
        return $query->whereHas('characters', function($q) use($character_id) {
            $q->where('people_id', $character_id);
        });
    }

    public function cover(): MorphOne
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class People extends Model
{
    use APIModelTrait;

    private static $apiCollection = 'people', $apiClass = \App\People::class;

    protected $fillable = [
        "birth_year", "eye_color", "gender", "hair_color", "height", "homeworld", "mass", "name", "skin_color", "films", "created", "edited", "url"
    ];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'people_films');
    }

    public function species(): BelongsToMany
    {
        return $this->belongsToMany(Species::class, 'people_species');
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'people_vehicles');
    }

    public function starships(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, 'people_starships');
    }

    public function homeworld(): BelongsTo
    {
        return $this->belongsTo(Planet::class, 'planet_id');
    }

    public function scopeOfFilm($query, $film_id) 
    {
        return $query->whereHas('films', function($q) use($film_id) {
            $q->where('film_id', $film_id);
        });
    }
}

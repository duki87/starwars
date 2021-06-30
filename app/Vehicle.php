<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
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
        "vehicle_class",
        "created",
        "edited",
        "url"
    ];

    private static $apiCollection = 'vehicles', $apiClass = \App\Vehicle::class;

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(People::class, 'people_vehicles');
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'films_vehicles');
    }

    public function scopeOfFilm($query, $film_id) 
    {
        return $query->whereHas('films', function($q) use($film_id) {
            $q->where('film_id', $film_id);
        });
    }
}

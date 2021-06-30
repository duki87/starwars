<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // protected $casts = [
    //     'passengers' => 'integer',
    // ];

    private static $apiCollection = 'starships', $apiClass = \App\Starship::class;

    public function pilots(): BelongsToMany
    {
        return $this->belongsToMany(Starship::class, 'people_starships');
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'films_starships');
    }

    public function scopeOfFilm($query, $film_id) 
    {
        return $query->whereHas('films', function($q) use($film_id) {
            $q->where('film_id', $film_id);
        });
    }
}

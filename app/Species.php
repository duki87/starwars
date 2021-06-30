<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\APIModelTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Species extends Model
{
    use APIModelTrait;

    protected $fillable = [
        "id",
        "name",
        "classification",
        "designation",
        "average_height",
        "skin_colors",
        "hair_colors",
        "eye_colors",
        "average_lifespan",
        "homeworld",
        "language",
        "created",
        "edited",
        "url"
    ];

    private static $apiCollection = 'species', $apiClass = \App\Species::class;

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(People::class, 'people_species');
    }

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class, 'films_species');
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

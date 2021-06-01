<?php

use Illuminate\Database\Seeder;

class FilmRelationsSeeder extends Seeder
{
    public function run()
    {
        $films = \App\Film::getData();

        $films->each(function($f) {
            $planets = $this->getIds($f->planets);
            foreach($planets as $p) {
                DB::table('films_planets')->insert([
                    'film_id' => $f->id,
                    'planet_id' => $p
                ]);
            }
        });

        $films->each(function($f) {
            $species = $this->getIds($f->species);
            foreach($species as $s) {
                DB::table('films_species')->insert([
                    'film_id' => $f->id,
                    'species_id' => $s
                ]);
            }
        });

        $films->each(function($f) {
            $vehicles = $this->getIds($f->vehicles);
            foreach($vehicles as $v) {
                DB::table('films_vehicles')->insert([
                    'film_id' => $f->id,
                    'vehicle_id' => $v
                ]);
            }
        });

        $films->each(function($f) {
            $starships = $this->getIds($f->starships);
            foreach($starships as $s) {
                DB::table('films_starships')->insert([
                    'film_id' => $f->id,
                    'starship_id' => $s
                ]);
            }
        });
    }

    private static function getIds($arr)
    {
        $ids = [];
        foreach($arr as $url) {
            $explode = explode('/', rtrim($url, '/'));
            $ids[] = end($explode);
        }
        return $ids;
    }

    private static function getId($url)
    {
        $explode = explode('/', rtrim($url, '/'));
        return end($explode);
    }
}

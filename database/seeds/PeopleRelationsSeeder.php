<?php

use Illuminate\Database\Seeder;

class PeopleRelationsSeeder extends Seeder
{
    public function run()
    {
        $people = \App\People::getData();

        $people->each(function($p) {
            $films = $this->getIds($p->films);
            foreach($films as $f) {
                DB::table('people_films')->insert([
                    'people_id' => $p->id,
                    'film_id' => $f
                ]);
            }
        });

        $people->each(function($p) {
            $species = $this->getIds($p->species);
            foreach($species as $s) {
                DB::table('people_species')->insert([
                    'people_id' => $p->id,
                    'species_id' => $s
                ]);
            }
        });

        $people->each(function($p) {
            $vehicles = $this->getIds($p->vehicles);
            foreach($vehicles as $v) {
                DB::table('people_vehicles')->insert([
                    'people_id' => $p->id,
                    'vehicle_id' => $v
                ]);
            }
        });

        $people->each(function($p) {
            $starships = $this->getIds($p->starships);
            foreach($starships as $s) {
                DB::table('people_starships')->insert([
                    'people_id' => $p->id,
                    'starship_id' => $s
                ]);
            }
        });

        $people->each(function($p) {
            DB::table('people')->where('id', $p->id)->update([
                'planet_id' => $this->getId($p->homeworld)
            ]);
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

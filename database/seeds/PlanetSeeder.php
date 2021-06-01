<?php

use Illuminate\Database\Seeder;

class PlanetSeeder extends Seeder
{
    public function run()
    {
        $planets = \App\Planet::getData();
        $planets->each(function($p) {
            DB::table('planets')->insert([
                'id' => $p->id,
                'name' => $p->name,
                'rotation_period' => $p->rotation_period,
                'orbital_period' => $p->orbital_period,
                'diameter' => $p->diameter,
                'climate' => $p->climate,
                'gravity' => $p->gravity,
                'terrain' => $p->terrain,
                'surface_water' => $p->surface_water,
                'population' => $p->population,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

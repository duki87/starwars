<?php

use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    public function run()
    {
        $species = \App\Species::getData();
        $species->each(function($p) {
            DB::table('species')->insert([
                'id' => $p->id,
                'name' => $p->name,
                'classification' => $p->classification,
                'designation' => $p->designation,
                'average_height' => $p->average_height,
                'skin_colors' => $p->skin_colors,
                'hair_colors' => $p->hair_colors,
                'eye_colors' => $p->eye_colors,
                'average_lifespan' => $p->average_lifespan,
                'homeworld' => $p->homeworld == null ? "n/a" : $p->homeworld,
                'language' => $p->language,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

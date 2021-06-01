<?php

use Illuminate\Database\Seeder;

class StarshipSeeder extends Seeder
{
    public function run()
    {
        $starships = \App\Starship::getData();
        $starships->each(function($p) {
            DB::table('starships')->insert([
                'id' => $p->id,
                'name' => $p->name,
                'model' => $p->model,
                'manufacturer' => $p->manufacturer,
                'cost_in_credits' => $p->cost_in_credits,
                'length' => $p->length,
                'max_atmosphering_speed' => $p->max_atmosphering_speed,
                'crew' => $p->crew,
                'passengers' => $p->passengers,
                'cargo_capacity' => $p->cargo_capacity,
                'consumables' => $p->consumables,
                'hyperdrive_rating' => $p->hyperdrive_rating,
                'MGLT' => $p->MGLT,
                'starship_class' => $p->starship_class,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

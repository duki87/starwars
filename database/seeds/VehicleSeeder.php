<?php

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $vehicles = \App\Vehicle::getData();
        $vehicles->each(function($p) {
            DB::table('vehicles')->insert([
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
                'vehicle_class' => $p->vehicle_class,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

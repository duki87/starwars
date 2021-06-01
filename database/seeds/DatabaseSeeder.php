<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $people = \App\People::getData();
        $people->each(function($p) {
            DB::table('people')->insert([
                'id' => $p->id,
                'name' => $p->name,
                'height' => $p->height,
                'mass' => $p->mass,
                'hair_color' => $p->hair_color,
                'skin_color' => $p->skin_color,
                'birth_year' => $p->birth_year,
                'gender' => $p->gender,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

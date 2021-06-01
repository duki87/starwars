<?php

use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $people = \App\People::getData();
        $films = $this->getIds($people->films);
        dd($films);
        // $people->each(function($p) {
        //     DB::table('people')->insert([
        //         'id' => $p->id,
        //         'name' => $p->name,
        //         'height' => $p->height,
        //         'mass' => $p->mass,
        //         'hair_color' => $p->hair_color,
        //         'skin_color' => $p->skin_color,
        //         'birth_year' => $p->birth_year,
        //         'gender' => $p->gender,
        //         'created_at' => $p->created,
        //         'updated_at' => $p->edited,
        //     ]);
        // });
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
}

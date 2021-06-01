<?php

use Illuminate\Database\Seeder;

class SpeciesRelationsSeeder extends Seeder
{
    public function run()
    {
        $species = \App\Species::getData();

        $species->each(function($s) {
            $id = $this->getId($s->homeworld);
            DB::table('species')->where('id', $s->id)->update([
                'planet_id' => $id == '' ? NULL : $id
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

<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $films = \App\Film::getData();
        $films->each(function($p) {
            DB::table('films')->insert([
                'id' => $p->id,
                'title' => $p->title,
                'episode_id' => $p->episode_id,
                'opening_crawl' => $p->opening_crawl,
                'director' => $p->director,
                'producer' => $p->producer,
                'release_date' => $p->release_date,
                'created_at' => $p->created,
                'updated_at' => $p->edited,
            ]);
        });
    }
}

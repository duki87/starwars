<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Film;

class FilmTest extends TestCase
{
    public function testFilmRoot()
    {
        $response = $this->get('/films');
        $response->assertStatus(200);
    }

    public function testFilmApiRoot()
    {
        $response = $this->get('/api/films');
        $response->assertStatus(200);
    }

    public function testFilmCollection()
    {
        $films = Film::get();
        $this->assertCount(6, $films);
    }
}

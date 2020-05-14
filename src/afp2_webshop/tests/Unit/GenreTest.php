<?php

namespace Tests\Unit;

use App\Genre;
use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class GenreTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfGenreStatusIsOkay()
    {
        $response = $this->get('/genre');
        $response->assertStatus(200);
    }

    public function testMultipleGenreShow(){
        factory(Genre::class, 2)->create();
        $response = $this->get('/genre');
        $response->assertStatus(200);

        $content = $this->get('/genre')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testSingleGenreShow(){
        factory(Genre::class, 6)->create();
        $response = $this->get('/genre/5');
        $response->assertStatus(200);

        $content = $this->get('/genre/5')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testGenreAdd(){
        $table_count = Genre::all()->count();
        factory(Genre::class)->create();

        $this->assertEquals($table_count + 1, Genre::all()->count());
    }
}

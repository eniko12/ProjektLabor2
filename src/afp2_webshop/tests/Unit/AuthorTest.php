<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfAuthorStatusIsOkay()
    {
        $response = $this->get('/author');
        $response->assertStatus(200);
    }

    public function testMultipleAuthorShow(){
        factory(Author::class, 2)->create();
        $response = $this->get('/author');
        $response->assertStatus(200);

        $content = $this->get('/author')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testSingleAuthorShow(){
        factory(Author::class, 6)->create(); //6db kell legalább, hogy legyen 5-ös ID
        $response = $this->get('/author/5');
        $response->assertStatus(200);

        $content = $this->get('/author/5')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testAuthorAdd(){
        $table_count = Author::all()->count();
        factory(Author::class)->create();

        $this->assertEquals($table_count + 1, Author::all()->count());
    }
}

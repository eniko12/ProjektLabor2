<?php

namespace Tests\Unit;

use App\Publisher;
use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class PublisherTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfPublisherStatusIsOkay()
    {
        $response = $this->get('/publisher');
        $response->assertStatus(200);
    }

    public function testMultiplePublisherShow(){
        factory(Publisher::class, 2)->create();
        $response = $this->get('/publisher');
        $response->assertStatus(200);

        $content = $this->get('/publisher')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testSinglePublisherShow(){
        factory(Publisher::class, 6)->create();
        $response = $this->get('/publisher/5');
        $response->assertStatus(200);

        $content = $this->get('/publisher/5')->content();
        $this->assertNotEmpty(json_decode(str_replace("&quot;", "\"", $content)));
    }

    public function testPublisherAdd(){
        $table_count = Publisher::all()->count();
        factory(Publisher::class)->create();

        $this->assertEquals($table_count + 1, Publisher::all()->count());
    }
}

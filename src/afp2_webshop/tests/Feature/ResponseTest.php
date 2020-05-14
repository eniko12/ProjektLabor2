<?php


namespace Tests\Feature;


use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testResponseTime()
    {
        $started = microtime(true);
        $response = DB::table("users")->get();
        $queryTime = number_format(microtime(true) - $started, 10);
        self::assertNotNull($response);
        self::assertNotEquals(0, $response);
        self::assertLessThan(1500, $response->count());
        fwrite(STDERR, print_r("Query executed in ".($queryTime*1000)." ms", TRUE));
    }

    public function testUserTableStructure(){
        self::assertNotEquals(0, DB::table('users')->count('id'));
        self::assertNotEquals(0, DB::table('users')->count('name'));
        self::assertNotEquals(0, DB::table('users')->count('email'));
        self::assertNotEquals(0, DB::table('users')->count('password'));
    }

    public function testBookTableStructure(){
        self::assertNotEquals(0, DB::table('books')->count('id'));
        self::assertNotEquals(0, DB::table('books')->count('ISBN'));
        self::assertNotEquals(0, DB::table('books')->count('title'));
        self::assertNotEquals(0, DB::table('books')->count('thumbnail'));
        self::assertNotEquals(0, DB::table('books')->count('publish_year'));
        self::assertNotEquals(0, DB::table('books')->count('publisher_id'));
        self::assertNotEquals(0, DB::table('books')->count('language'));
        self::assertNotEquals(0, DB::table('books')->count('page_count'));
        self::assertNotEquals(0, DB::table('books')->count('description'));
        self::assertNotEquals(0, DB::table('books')->count('can_order'));
        self::assertNotEquals(0, DB::table('books')->count('can_preorder'));
        self::assertNotEquals(0, DB::table('books')->count('in_stock'));
        self::assertNotEquals(0, DB::table('books')->count('price'));
    }

    public function testAuthorTableStructure(){
        self::assertNotEquals(0, DB::table('authors')->count('id'));
        self::assertNotEquals(0, DB::table('authors')->count('name'));
    }

    public function testGenreTableStructure(){
        self::assertNotEquals(0, DB::table('genres')->count('id'));
        self::assertNotEquals(0, DB::table('genres')->count('name_en'));
    }

    public function testPublisherTableStructure(){
        self::assertNotEquals(0, DB::table('publishers')->count('id'));
        self::assertNotEquals(0, DB::table('publishers')->count('name'));
    }

    public function testOrderTableStructure(){
        self::assertNotEquals(0, DB::table('orders')->count('id'));
        self::assertNotEquals(0, DB::table('orders')->count('user_id'));
        self::assertNotEquals(0, DB::table('orders')->count('billing'));
        self::assertNotEquals(0, DB::table('orders')->count('shipping'));
        self::assertNotEquals(0, DB::table('orders')->count('status'));
    }
}

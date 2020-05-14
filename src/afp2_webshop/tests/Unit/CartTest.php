<?php

namespace Tests\Unit;

use App\Http\Controllers;
//use PHPUnit\Framework\TestCase;
use App\Order;
use App\Package;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function GuzzleHttp\Psr7\str;

//use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCartStatus(){
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }

    public function testCartIndexAsGuest(){
        $response = $this->call('GET', '/cart', [], ['guest_id' => '0']);
        $response->assertStatus(200);

        self::assertTrue( strpos($response->content(), "empty") !== -1);
    }

    public function testCartIndexAsUser(){
        Order::emptyForTest();
        $response = $this->actingAs(User::testUser())->get('/cart');
        $response->assertStatus(200);

        self::assertTrue( strpos($response->content(), "empty") !== -1);
    }

    public function testCartShow(){
        $user_id = 0;
        $book_id = 1;
        Order::CreateCart($user_id);
        $response = $this->get("/cart/$user_id");
        $response->assertStatus(200);

        self::assertTrue( strpos($response->content(), "empty") !== -1);
    }

    public function testCartAddAsGuest(){
        Order::emptyForTest();
        $book = '5';
        $cookies = ['guest_id' => encrypt('0', true)];
        $response = $this->call('GET', "cart/add/$book", [], $cookies);
        $response->assertStatus(200);

        self::assertTrue( strpos($response->content(), "empty") !== -1);
    }

    public function testCartAddAsUser(){
        Order::emptyForTest();
        $book = '5';
        $user = User::testUser();
        $response = $this->actingAs($user)->get("cart/add/$book");
        self::assertTrue( strpos($response->content(), "empty") !== -1);
    }
}

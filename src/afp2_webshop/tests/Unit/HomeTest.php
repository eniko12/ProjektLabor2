<?php

namespace Tests\Unit;

use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfHomeStatusIsOkay()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }






}

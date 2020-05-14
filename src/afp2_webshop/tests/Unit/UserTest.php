<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
//use PHPUnit\Framework\TestCase;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfProfileStatusIsOkay()
    {
        $response = $this->get('/profile');
        $response->assertStatus(403);
    }
}

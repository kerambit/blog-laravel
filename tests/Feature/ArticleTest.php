<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test pagination.
     *
     * @return void
     */
    public function testPagination()
    {
        $response = $this->get('/?page=2');

        $response->assertStatus(200);
    }
}

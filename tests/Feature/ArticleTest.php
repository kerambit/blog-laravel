<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    /**
     * A basic feature test index method.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('article.index'));

        $response->assertViewIs('article.index');

        $response->assertViewHas('articles');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test show method.
     *
     * @return void
     */
    public function testShow()
    {
        $key = \App\Article::inRandomOrder()->first();

        $response = $this->get(route('article.show', $key->id));

        $response->assertViewIs('article.show');

        $response->assertViewHas('article');

        $response->assertStatus(200);
    }
}

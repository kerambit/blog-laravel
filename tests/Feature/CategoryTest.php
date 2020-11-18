<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test index method.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('categories.index'));

        $response->assertViewIs('categories.index');

        $response->assertViewHas('categories');

        $response->assertStatus(200);
    }

    /**
     * A basic feature test show method.
     *
     * @return void
     */
    public function testShow()
    {
        factory(Category::class, 10)->create();

        $category = Category::inRandomOrder()->first();

        $response = $this->get(route('categories.show', $category));

        $response->assertViewIs('categories.show');

        $response->assertViewHasAll(['articles', 'category']);

        $response->assertStatus(200);
    }
}

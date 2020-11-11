<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Category;

class AdminCategoryTest extends TestCase
{
    /**
     * A basic feature test to make sure that we can't use admin controller without auth.
     *
     * @return void
     */
    public function testLoginForm()
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertRedirect(route('login'));

        $response->assertStatus(302);
    }

    /**
     * A feature test for auth to use admin controller.
     *
     * @return void
     */
    public function testEnterLoginForm()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('login'));

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');
    }

    /**
     * A feature test index method.
     *
     * @return void
     */
    public function testCategoryIndex()
    {
        $this->testEnterLoginForm();

        $response = $this->get(route('admin.category.index'));

        $response->assertViewIs('articles.category.index');

        $response->assertViewHas('categories');

        $response->assertStatus(200);
    }

    /**
     * A feature test show method.
     *
     * @return void
     */
    public function testCategoryShow()
    {
        $this->testCategoryIndex();

        $category = Category::inRandomOrder()->first();

        $response = $this->get(route('admin.category.show', $category->id));

        $response->assertViewIs('articles.category.show');

        $response->assertViewHasAll(['category', 'articles']);

        $response->assertStatus(200);
    }

    /**
     * A feature test for auth to use admin controller.
     *
     * @return void
     */
    public function testCategoryCreate()
    {
        $user = factory(User::class)->make();

        $category = factory(Category::class)->make();
        $category = $category->toArray();

        $response = $this->actingAs($user)
            ->withoutMiddleware()
            ->post(route('admin.category.store'), $category);

        $response->assertRedirect(route('admin.category.index'));
    }

    /**
     * A feature test for update method of categories.
     *
     * @return void
     */
    public function testCategoryUpdate()
    {
        $category = Category::inRandomOrder()->first();

        $data = factory(Category::class)->make();
        $data = $category->toArray();

        $update = $category->update($data);

        $this->assertTrue($update);
    }

    /**
     * A feature test for delete method of categories.
     *
     * @return void
     */
    public function testCategoryDelete()
    {
        $category = factory(Category::class)->create();

        $delete = $category->delete();

        $this->assertTrue($delete);
    }
}

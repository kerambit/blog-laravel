<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Category;

class AdminCategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A feature test index method.
     *
     * @return void
     */
    public function testCategoryIndex()
    {
        $response = $this->get(route('admin.category.index'));

        $response->assertRedirect(route('login'));

        $response->assertStatus(302);

        $user = factory(User::class)->make();

        unset($response);

        $response = $this->actingAs($user)->get(route('login'));

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');

        unset($response);

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
        $response = $this->get(route('admin.category.index'));

        $response->assertRedirect(route('login'));

        $response->assertStatus(302);

        $user = factory(User::class)->make();

        unset($response);

        $response = $this->actingAs($user)->get(route('login'));

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');

        unset($response);

        factory(Category::class, 10)->create();

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
        $response = $this->get(route('admin.category.index'));

        $response->assertRedirect(route('login'));

        $response->assertStatus(302);

        $user = factory(User::class)->make();

        unset($response);

        $response = $this->actingAs($user)->get(route('login'));

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');

        unset($response);

        $category = [
          'name' => $this->faker->word,
          'slug' => substr($this->faker->slug, 0, 40)
        ];

        $response = $this->actingAs($user)
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
        $response = $this->get(route('admin.category.index'));

        $response->assertRedirect(route('login'));

        $response->assertStatus(302);

        $user = factory(User::class)->make();

        unset($response);

        $response = $this->actingAs($user)->get(route('login'));

        $this->assertAuthenticatedAs($user);

        $response->assertRedirect('/');

        unset($response);

        factory(Category::class, 10)->create();

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

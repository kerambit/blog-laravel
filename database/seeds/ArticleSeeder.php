<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Article::class, 80)->make(['category_id' => null])
            ->each(function ($article) {
                $category = \App\Category::inRandomOrder()->first();
                $article->category_id = $category->id;
                $article->save();
            });
    }
}

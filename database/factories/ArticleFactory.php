<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph,
        'slug'  => $faker->slug,
        'category_id' => function () {
            return factory(Category::Class)->create()->id;
        },
    ];
});

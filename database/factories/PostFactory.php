<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\CategoryPost;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title_and_slug = $faker->sentence;
    return [
        'title' => $title_and_slug,
        'slug' => str_slug($title_and_slug),
        'body' => $faker->text(5000),
        'user_id' => 1,
        'category_post_id' => CategoryPost::all()->random()->id
    ];
});

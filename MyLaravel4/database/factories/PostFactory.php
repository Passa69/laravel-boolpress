<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker -> unique() -> words(1, true),
        'author' => $faker -> unique() -> name(),
        'subtitle' => $faker -> unique() -> words(2, true),
        'description' => $faker -> optional() -> text(100),
        'date' => $faker -> date(),
        'rating' => $faker -> numberBetween(0, 5)
    ];
});

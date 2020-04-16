<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(40, 50)),
        'content' => $faker->realText(rand(200, 800)),
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});

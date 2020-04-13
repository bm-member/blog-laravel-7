<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'content' => $faker->text(200),
        // 'user_id' => factory(User::class)->create()->id
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'user_id' => rand(1,2),
        'title' => $faker->sentence,
        'image' => $faker->imageUrl(1280,720),
        'body' => $faker->text(800),
    ];
    
});

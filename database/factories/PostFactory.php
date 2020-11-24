<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Post::class, function (Faker $faker) {
	$title = $faker->sentence;
    $slug = Str::slug($title);
    return [
        'user_id' => '1',
        // 'title' => $faker->realText(rand(40, 80)),
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->realText(rand(100, 500)),
        // 'user_id' => function() {
        //     return \App\User::inRandomOrder()->first()->id;
        // }
    ];
});

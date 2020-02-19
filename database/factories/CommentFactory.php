<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(92),
        'text' => $faker->realText(800),
        'rating' => mt_rand(1,5),
        'course_id' => \App\Course::all()->random()->id
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment_name' => $faker->name,
        'comment_email' => $faker->safeEmail,
        'comment_content' => $faker->paragraph(5),
        'comment_date' => $faker->dateTimeBetween('2025-01-01', '2025-04-30'),

    ];
});

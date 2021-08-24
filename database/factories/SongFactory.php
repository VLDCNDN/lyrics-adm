<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3,true),
        'artist' => $faker->name,
        'lyrics' => $faker->paragraph(5, true),
        'added_by_id' => $faker->randomDigit
    ];
});

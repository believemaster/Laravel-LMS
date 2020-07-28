<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Series;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Series::class, function (Faker $faker) {

    $title = $faker->sentence(5);

    return [
        'title' => $faker->sentence(5),
        'slug' => Str::slug($title),
        'image_url' => $faker->imageUrl(),
        'description' => $faker->paragraph()
    ];
});

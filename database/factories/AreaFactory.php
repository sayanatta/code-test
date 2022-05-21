<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    return [
        'governorate_id' => $faker->randomDigit(),
        'title' => $faker->title,
        'status' => 1
    ];
});

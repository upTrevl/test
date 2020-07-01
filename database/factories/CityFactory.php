<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;
use App\Model;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'region' => rand(1, 200)
    ];
});

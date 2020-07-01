<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Model;

$factory->define(\App\Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'date_start' => $faker->dateTimeThisYear("-30 days"),
        'city_id' => \App\City::all()->random()->id
    ];
});

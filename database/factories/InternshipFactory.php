<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

$factory->define(\App\Internship::class, function (Faker $faker) {
    return [
        'internship_function' => $faker->jobTitle,
        'internship_discription' => $faker->realText(200),
        'available_spots' => $faker->randomDigit,
    ];
});

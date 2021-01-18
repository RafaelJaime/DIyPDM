<?php

use Faker\Generator as Faker;

$factory->define(App\offer::class, function (Faker $faker) {
    return [
        'headline' => $faker->sentence,
        'description' => $faker->sentence,
        'cicle_id'=> \App\cicle::all()->random()->id,
        'date_max' => $faker->date($format = 'Y-m-d'),
        'num_candidates' => $faker->randomDigit,
    ];
});

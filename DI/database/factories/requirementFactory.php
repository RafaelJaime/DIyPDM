<?php

use Faker\Generator as Faker;

$factory->define(App\requirement::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'offer_id' => \App\offer::all()->random()->id
    ];
});

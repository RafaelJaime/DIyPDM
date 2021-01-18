<?php

use Faker\Generator as Faker;

$factory->define(App\requirement::class, function (Faker $faker) {
    return [
        'id' => \App\requirement::all()->random()->id,
        'description' => $faker->paragraph,
        'offer_id' => \App\offer::all()->random()->id
    ];
});

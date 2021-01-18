<?php

use Faker\Generator as Faker;

$factory->define(App\applied::class, function (Faker $faker) {
    return [
        'id' => \App\applied::all()->random()->id,
        'user_id' => \App\user::all()->random()->id,
        'offer_id' => \App\offer::all()->random()->id
    ];
});

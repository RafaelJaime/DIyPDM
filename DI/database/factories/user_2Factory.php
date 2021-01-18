<?php

use Faker\Generator as Faker;

$factory->define(App\user_2::class, function (Faker $faker) {
    return [
        'id' => \App\user_2::all()->random()->id,
        'name' => $faker->firstname,
        'surname' => $faker->lastName,
        'cicle_id' => \App\cicle::all()->random()->id,
        'active' => $faker->boolean,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->safeEmail,
        'password' => $faker->password,
        'type' => $faker->sentence,
        'num_offer_applied' => $faker->randomDigit,
        'remember_token' => str_random(10)
    ];
});

<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'id' => \App\user_2::all()->random()->id,
        'name' => $faker->firstname,
        'surname' => $faker->lastName,
        'cicle_id' => \App\cicle::all()->random()->id,
        'active' => $faker->boolean,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => $faker->safeEmail,
        // 'password' => $faker->password,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'type' => $faker->sentence,
        'num_offer_applied' => $faker->randomDigit,
        'remember_token' => str_random(10)
    ];
});

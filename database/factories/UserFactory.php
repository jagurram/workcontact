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
        'prenom' => $faker->name,
        'nom' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'photo' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/';



        'password' => bcrypt('blabla'), // secret
        'remember_token' => str_random(10),
    ];
});

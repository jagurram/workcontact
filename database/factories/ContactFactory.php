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

$factory->define(App\Contact::class, function (Faker $faker) {

    

    return [
        'prenom' => $faker->name,
        'nom' => $faker->lastName,
        'photo' => $faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/';
        'origine' => $faker->word,
        'fonction' => $faker->jobTitle,
        'adresse' => $faker->streetAddress,
        'code_postal' => $faker->postcode,
        'ville' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'telephone_fixe' => $faker->phoneNumber,
        'telephone_mobile' => $faker->phoneNumber,
    ];
});

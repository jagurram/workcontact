<?php

use Faker\Generator as Faker;

$factory->define(App\Entreprise::class, function (Faker $faker) {
    return [
        'raison_social' => $faker->company,
        'adresse1' => $faker->address,
        'code_postal' => $faker->postcode,
        'ville' => $faker->city,
        'pays' => $faker->country,
        'telephone_fixe' => '0130303030',
        'email' => $faker->companyEmail,
        'website' => $faker->domainName
    ];
});

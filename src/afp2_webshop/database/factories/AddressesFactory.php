<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Addresses;
use Faker\Generator as Faker;

$factory->define(Addresses::class, function (Faker $faker) {
    $tin = rand(0,5) == 0 ? null : $faker->numerify('##########');
    return [
        'country' => $faker->numberBetween(0,100),
        'tin' => $tin,
        'postal_code' => $faker->lexify('0000'),
        'city' => $faker->city,
        'street' => $faker->address,
        'house' => $faker->numberBetween(0,100),
        'note' => $faker->sentence(),
    ];
});

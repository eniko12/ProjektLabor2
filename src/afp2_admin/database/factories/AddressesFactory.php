<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Addresses::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'tin' => $faker->boolean ? $faker->numerify('??????????????') : null,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'street' => $faker->streetName,
        'house' => $faker->numberBetween(0, 2000),
        'note' => $faker->boolean ? $faker->sentences(3, true) : null
    ];
});

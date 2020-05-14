<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'id' => $faker->lexify("????????????????"),
        'user_id' => 'asda', //TODO
        'billing' => $faker->numberBetween(0,100),
        'shipping' => $faker->numberBetween(0,100),
        'status' => $faker->numberBetween(0,7)
    ];
});

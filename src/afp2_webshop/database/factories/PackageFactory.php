<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    return [
        'order_id' => factory(\App\Order::class)->create(),
        'book_id' => $faker->numberBetween(0,100),
        'quantity' => $faker->numberBetween(1,4)
    ];
});

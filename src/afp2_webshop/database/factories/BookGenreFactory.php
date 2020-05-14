<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book_genre;
use Faker\Generator as Faker;

$factory->define(Book_genre::class, function (Faker $faker) {
    return [
        'genre_id' => factory(App\Genre::class)->create(),
        'book_id' => $faker->numberBetween(0,100)
    ];
});

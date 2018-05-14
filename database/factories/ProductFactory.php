<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => $faker->unique()->swiftBicNumber,
        'details' => $faker->sentence( 8, true),
        'price' => $faker->numberBetween(100,10000),
        'description' => $faker->text(250)
    ];
});

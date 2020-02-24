<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2),
        'slug' => $faker->sentence($nbWords = 1),
        'description' => $faker->paragraph($nbSentences = 10),
        'price' => $faker->randomNumber(2),
        'is_cart' => false,
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->sentence(10),
        'price' => $faker->randomFloat(2, 5, 150),
        'stock' => $faker->numberBetween(10, 500),
        'category_id' => $faker->numberBetween(1, 5)
    ];
});

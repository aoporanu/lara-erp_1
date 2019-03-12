<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => rand(100000, 200000)
    ];
});

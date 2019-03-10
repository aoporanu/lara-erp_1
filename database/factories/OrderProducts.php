<?php

use App\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween(100000, 200000),
        'product_id' => $faker->numberBetween(100000, 200000),
        'qty' => $faker->numberBetween(1, 300),
        'price' => $faker->numberBetween(1.0, 100.9)
    ];
});

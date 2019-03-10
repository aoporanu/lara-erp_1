<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'client_id' => $faker->numberBetween(1, 200),
        'public_id' => $faker->numberBetween(100000, 200000),
        'user_id' => $faker->numberBetween(10000, 19999),
        'name' => $faker->name
    ];
});

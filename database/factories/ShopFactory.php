<?php

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'public_id' => $faker->numberBetween(100000, 200000),
        'name' => $faker->username,
        'agent_id' => $faker->numberBetween(100000, 200000)
    ];
});

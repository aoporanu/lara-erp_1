<?php

use App\Distributor;
use Faker\Generator as Faker;

$factory->define(Distributor::class, function (Faker $faker) {
    return [
        'public_id' => rand(100000, 200000),
        'name' => $faker->name,
    ];
});

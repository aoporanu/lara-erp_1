<?php

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'distributor_id' => rand(100000, 200000)
    ];
});

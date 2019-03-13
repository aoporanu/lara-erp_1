<?php

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'value' => rand(0, 1)
    ];
});

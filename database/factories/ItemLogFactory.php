<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ItemLog;
use Faker\Generator as Faker;

$factory->define(ItemLog::class, function (Faker $faker) {
    return [
        'value' => $faker->text(100),
    ];
});

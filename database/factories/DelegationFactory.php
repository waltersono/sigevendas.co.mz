<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Delegation;
use Faker\Generator as Faker;

$factory->define(Delegation::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->word)
    ];
});

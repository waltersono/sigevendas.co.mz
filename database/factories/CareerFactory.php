<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Career;
use Faker\Generator as Faker;

$factory->define(Career::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->word)
    ];
});

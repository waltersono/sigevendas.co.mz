<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->words(3, true)),
        'store_id' =>  $faker->randomElement(App\Models\Store::all()),
        'contact' => $faker->randomNumber(9),
        'email' => $faker->email
    ];
});

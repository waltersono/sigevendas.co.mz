<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->words(3, true)),
        'nuit' => $faker->numberBetween(10000001, 99999999),
        'address' => $faker->address,
        'user_id' => $faker->randomElement(App\Models\User::where('role', 'Manager')->get())
    ];
});

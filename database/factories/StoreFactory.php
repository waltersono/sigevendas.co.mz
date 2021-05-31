<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Store;
use Faker\Generator as Faker;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->randomElement(array('Mercearia Ceu','Mercaria Amizade','Bar dos Amigos','Bar Nova Vida','Explanada Majakaze','Explanada Terra'))),
        'nuit' => $faker->numberBetween(10000001,99999999),
        'address' => $faker->address,
        'user_id' => $faker->randomElement(App\Models\User::where('role','Manager')->get())
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Institution;
use Faker\Generator as Faker;

$factory->define(Institution::class, function (Faker $faker) {
    return [
        'designation'   => ucwords($faker->unique()->sentence(3)),
        'address'   =>  $faker->unique()->address,
        'contact_1' =>  $faker->unique()->phoneNumber,
        'contact_2' =>  $faker->unique()->phoneNumber
    ];
});

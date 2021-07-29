<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->word()),
        'store_id'  => $faker->randomElement(App\Models\Store::all())
    ];
});

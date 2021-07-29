<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->words(3, true)),
        'quantity' => $faker->numberBetween(0, 40),
        'price' => $faker->numberBetween(10, 500),
        'category_id' => $faker->randomElement(App\Models\Category::all()),
        'supplier_id' => $faker->randomElement(App\Models\Supplier::all())
    ];
});

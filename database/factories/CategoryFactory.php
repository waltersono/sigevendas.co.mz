<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->randomElement(array('Alimentos','Alimentos congelados','Frios', 'Hortifruti'))),
        'store_id'  => $faker->randomElement(App\Models\Store::all())
    ];
});

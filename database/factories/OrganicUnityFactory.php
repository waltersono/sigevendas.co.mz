<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrganicUnity;
use Faker\Generator as Faker;

$factory->define(OrganicUnity::class, function (Faker $faker) {
    return [
        'designation' => 'INAS Central'
    ];
});

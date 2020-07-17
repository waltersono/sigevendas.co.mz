<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'designation' => ucfirst($faker->unique()->sentence(4)),
        'type'  => $faker->randomElement(array('short','long')),
        'duration' => $faker->numberBetween(1,3650),
        'academicLevel_id' => $faker->numberBetween(1,8),
        'institution_id' => $faker->numberBetween(1,50),
        'content' => $faker->sentence(20)
    ];
});

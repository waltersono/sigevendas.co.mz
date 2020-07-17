<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        'course_id' => $faker->randomElement(App\Models\Course::all()),
        'employee_id' => $faker->randomElement(App\Models\Employee::all()),
        'start_date' => $faker->date(),
        'finished' => $faker->randomElement(array(0,1))
    ];
});

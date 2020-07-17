<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;

use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name'  =>  $faker->firstName(),
        'surname' =>    $faker->lastName(),
        'gender' => $faker->randomElement(array('m','f','o')),
        'dob'   =>  $faker->date(),
        'id_number'    =>  $faker->unique()->bankAccountNumber(),
        'nuit'  =>  $faker->unique()->bankAccountNumber(),
        'email' =>  $faker->unique()->safeEmail,
        'contact_1' =>  $faker->unique()->phoneNumber,
        'contact_2' =>  $faker->unique()->phoneNumber,
        'career_id' => $faker->randomElement(App\Models\Career::all()),
        'academicLevel_id' => $faker->randomElement(App\Models\AcademicLevel::all()),
        'central' => 0,
        'repartition_id' => $faker->randomElement(App\Models\Repartition::all()),
        'division_id' => $faker->randomElement(App\Models\Delegation::all()),
    ];
});

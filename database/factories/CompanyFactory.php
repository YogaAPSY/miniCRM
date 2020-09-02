<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3, true)
    ];
});

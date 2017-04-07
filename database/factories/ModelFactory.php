<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Spend::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence(2),
        'amount' => $faker->randomNumber(2),
        'currency' => $faker->randomElement(['kyat', 'dollar', 'baht']),
        'note' => $faker->paragraph,
        'spend_date' => $faker->dateTimeThisYear(),
        'spend_for_type' => $faker->randomElement(['projects', 'offices']),
        'spend_for_id' => $faker->numberBetween(1,20),
        'user_id' => $faker->numberBetween(1,5),
    ];
});


$factory->define(App\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->paragraph,
        'date' => $faker->dateTimeThisYear(),
        'user_id' => $faker->numberBetween(1,5),
    ];
});


$factory->define(App\Office::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1,5),
    ];
});
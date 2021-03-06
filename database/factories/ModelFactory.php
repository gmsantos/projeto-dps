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
        'email' => $faker->email,
        'password' => $password ?: $password = bcrypt('senha123'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Volunteer::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'institution_id' => App\Institution::all()->random()->id,
        'user_id' => function () {
            return factory(App\User::class)->create([
                'role' => 'volunteer',
            ])->id;
        }
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Institution::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'user_id' => function () use ($faker) {
            return factory(App\User::class)->create([
                'name' => $faker->company,
                'role' => 'institution',
            ])->id;
        }
    ];
});
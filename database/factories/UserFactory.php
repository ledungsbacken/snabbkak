<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Recepie::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'user_id' => function() { return factory(App\User::class)->create()->id; },
        'name' => $faker->foodName,
        'description' => $faker->text,
    ];
});

$factory->define(App\Ingredient::class, function (Faker $faker) {
    $messurements = [
        'liter',
        'dl',
        'cl',
        'ml',
        'g',
        'oz',
        'ts',
        'pinch',
    ];
    return [
        'recepie_id' => function() { return factory(App\Recepie::class)->create()->id; },
        'name' => $faker->word,
        'amount' => $faker->randomDigit.' '.$messurements[rand(0, count($messurements) - 1)],
    ];
});

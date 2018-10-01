<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Patient::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    return [
        'name' => (string) $faker->name,
        'cpf' => (string) $faker->unique()->numberBetween(10000000000, 99999999999),
        'status' => $faker->numberBetween(0, 1),
        'register_by_user_id' => $user->id
    ];
});

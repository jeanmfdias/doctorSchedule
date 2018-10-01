<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Doctor::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    return [
        'name' => (string) $faker->name,
        'crm' => (string) $faker->unique()->numberBetween(100000, 999999),
        'status' => $faker->numberBetween(0, 1),
        'register_by_user_id' => $user->id
    ];
});

<?php

use Faker\Generator as Faker;
use App\User;
use App\Patient;
use App\Doctor;

$factory->define(App\Schedule::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    $patient = Patient::inRandomOrder()->first();
    $doctor = Doctor::inRandomOrder()->first();
    return [
        'date_time' => $faker->dateTimeBetween('now', '+1 year', 'America/Sao_Paulo'), 
        'description' => $faker->sentence(6, true), 
        'exams' => '[]',
        'patient_id' => $patient->id, 
        'doctor_id' => $doctor->id, 
        'register_by_user_id' => $user->id,
        'status' => $faker->randomElement(['CONSULTED', 'CANCELED', 'MISSED', 'SCHEDULED'])
    ];
});

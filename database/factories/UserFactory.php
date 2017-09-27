<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "apellido_paterno" => $faker->name,
        "apellido_materno" => $faker->name,
        "ubicacion" => $faker->randomNumber(2),
        "departamento" => $faker->randomNumber(2),
        "extension" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "role_id" => factory('App\Role')->create(),
        "remember_token" => $faker->name,
    ];
});

<?php

$factory->define(App\Reservacion::class, function (Faker\Generator $faker) {
    return [
        "nombre" => $faker->name,
        "comentario" => $faker->name,
    ];
});

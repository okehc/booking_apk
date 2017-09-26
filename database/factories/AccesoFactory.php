<?php

$factory->define(App\Acceso::class, function (Faker\Generator $faker) {
    return [
        "nombre_acceso" => $faker->name,
        "id_ubicacion" => $faker->randomNumber(2),
    ];
});

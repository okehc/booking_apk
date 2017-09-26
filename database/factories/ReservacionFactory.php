<?php

$factory->define(App\Reservacion::class, function (Faker\Generator $faker) {
    return [
        "nombre_de_reunion" => $faker->name,
        "ubicacion" => $faker->name,
        "sala_de_juntas" => $faker->name,
        "hora_duracion" => $faker->randomNumber(2),
        "minuto_duracion" => $faker->randomNumber(2),
        "repeat" => 0,
        "comentario" => $faker->name,
    ];
});

<?php

$factory->define(App\Reservacion::class, function (Faker\Generator $faker) {
    return [
        "nombre_de_reunion" => $faker->name,
        "sala_de_juntas" => $faker->name,
        "capacidad" => $faker->randomNumber(2),
        "fecha_de_inicio" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "fecha_de_finalizacion" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "invitado" => $faker->safeEmail,
        "comentario" => $faker->name,
    ];
});

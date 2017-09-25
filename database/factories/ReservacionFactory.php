<?php

$factory->define(App\Reservacion::class, function (Faker\Generator $faker) {
    return [
        "nombre_de_reunion" => $faker->name,
        "ubicacion" => $faker->name,
        "sala_de_juntas" => $faker->name,
        "fecha_de_inicio" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "fecha_de_finalizacion" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "repeat" => 0,
        "invitado" => $faker->name,
        "comentario" => $faker->name,
    ];
});

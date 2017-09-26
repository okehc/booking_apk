<?php

$factory->define(App\Seccion::class, function (Faker\Generator $faker) {
    return [
        "id_ubicacion" => $faker->randomNumber(2),
        "nombre_seccion" => $faker->name,
        "id_atributos" => $faker->randomNumber(2),
    ];
});

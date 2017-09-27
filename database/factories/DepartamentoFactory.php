<?php

$factory->define(App\Departamento::class, function (Faker\Generator $faker) {
    return [
        "departamento" => $faker->name,
        "descripcion" => $faker->name,
    ];
});

                
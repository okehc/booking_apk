<?php

$factory->define(App\Ubicacione::class, function (Faker\Generator $faker) {
    return [
        "nombre" => $faker->name,
        "ciudad" => $faker->name,
        "estado" => $faker->name,
    ];
});

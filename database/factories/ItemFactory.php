                    
<?php

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        "item_nombre" => $faker->name,
        "item_descripcion" => $faker->name,
    ];
});

                
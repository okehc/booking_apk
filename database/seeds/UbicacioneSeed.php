<?php

use Illuminate\Database\Seeder;

class UbicacioneSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nombre' => 'Imperial', 'ciudad' => 'MTY', 'estado' => 'Nuevo Leon',],
            ['id' => 2, 'nombre' => 'Reina', 'ciudad' => 'MTY', 'estado' => 'Nuevo Leon',],
            ['id' => 3, 'nombre' => 'Presidente', 'ciudad' => 'CDMX', 'estado' => 'CDMX',],

        ];

        foreach ($items as $item) {
            \App\Ubicacione::create($item);
        }
    }
}

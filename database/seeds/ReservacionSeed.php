<?php

use Illuminate\Database\Seeder;

class ReservacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'nombre_de_reunion' => 'Reunion kickoff', 'ubicacion' => null, 'sala_de_juntas' => 'imperial', 'hora_duracion' => null, 'minuto_duracion' => null, 'repeat' => 0, 'comentario' => 'porfavor vallan a la sala de juntas',],

        ];

        foreach ($items as $item) {
            \App\Reservacion::create($item);
        }
    }
}

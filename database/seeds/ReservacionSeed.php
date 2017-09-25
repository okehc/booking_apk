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
            
            ['id' => 1, 'nombre_de_reunion' => 'Reunion kickoff', 'ubicacion' => null, 'sala_de_juntas' => 'imperial', 'fecha_de_inicio' => '26/09/2017 09:16:00', 'fecha_de_finalizacion' => '26/09/2017 14:37:00', 'repeat' => 0, 'invitado' => null, 'comentario' => 'porfavor vallan a la sala de juntas',],

        ];

        foreach ($items as $item) {
            \App\Reservacion::create($item);
        }
    }
}

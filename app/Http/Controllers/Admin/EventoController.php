<?php
namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Evento;
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
class EventoController extends Controller
{
    public function index()
    {

    	$userId = Auth::id();
		$reservacions= DB::connection('odbc')->select("SELECT a.id, a.nombre_reunion as title, a.fecha_inicio as fecha, a.hora_inicio as time_start, a.tiempo_duracion as time_end FROM reservaciones a WHERE a.id_usuario = ".$userId." ");
 	
		foreach ($reservacions as $key ) {

			$h_inicio = date('H:i:s', strtotime($key->time_start));
        	$h_duracion = date('H:i:s', strtotime($key->time_end));	
        	$t_final = $h_inicio + $h_duracion;
			
			$t[] =  array('title' => $key->title, 'fecha' => $key->fecha, 'time_start' => $key->time_start, 'time_end' => $t_final  );

		}

 		var_dump($t);

        #return response()->json($data); //para luego retornarlo y estar listo para consumirlo
 
    }
}




?>
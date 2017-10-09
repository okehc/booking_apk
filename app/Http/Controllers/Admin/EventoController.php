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
    public function api()
    {
		$reservacions= DB::connection('odbc')->select("SELECT a.id, a.nombre_reunion as title, a.fecha_inicio as hora_duracion, a.hora_inicio as start, a.hora_inicio + a.tiempo_duracion as end FROM reservaciones a WHERE a.id_usuario = ".$userId." ");
 	
 		var_dump($reservacions);

        return response()->json($data); //para luego retornarlo y estar listo para consumirlo
 
    }
}




?>
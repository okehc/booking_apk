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

			$secs = strtotime($key->time_end)-strtotime("00:00:00");
			$end_time = date("H:i:s",strtotime($key->time_start)+$secs);
			$sTime = date('Y-m-d H:i:s', strtotime("$key->fecha $key->time_start"));
			$eTime = date('Y-m-d H:i:s', strtotime("$key->fecha $end_time"));

			$t[] =  array("title" => $key->title, "start" => $sTime, "end" => $eTime, "url" => "http://10.30.42.27/booking/public/admin/reservacions/".$key->id." ");

		}
		return json_encode($t);
        #return response()->json($data); //para luego retornarlo y estar listo para consumirlo
 
    }
}




?>
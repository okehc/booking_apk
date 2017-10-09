<?php
namespace App\Http\Controllers\Admin;

use DB;
use Auth;

 $userId = Auth::id();
 $json = array();

 $reservacions= DB::connection('odbc')->select("SELECT a.id, a.nombre_reunion as title, a.fecha_inicio as hora_duracion, a.hora_inicio as start, a.hora_inicio + a.tiempo_duracion as end FROM reservaciones a WHERE a.id_usuario = ".$userId." ");

 echo json_encode($reservacions);

?>
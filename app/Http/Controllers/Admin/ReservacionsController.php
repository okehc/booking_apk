<?php

namespace App\Http\Controllers\Admin;

use App\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservacionsRequest;
use App\Http\Requests\Admin\UpdateReservacionsRequest;
use DB;
use Auth;

class ReservacionsController extends Controller
{
    /**
     * Display a listing of Reservacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('reservacion_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('reservacion_delete')) {
                return abort(401);
            }
            $reservacions = Reservacion::onlyTrashed()->get();
        } else {
            $reservacions = Reservacion::all();
        }

        return view('admin.reservacions.index', compact('reservacions'));
    }

    /**
     * Show the form for creating new Reservacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('reservacion_create')) {
            return abort(401);
        }

        $userId = Auth::id();

        $ub_default= DB::connection('odbc')->selectOne("SELECT a.id, a.nombre, a.ciudad, a.estado FROM ubicaciones a JOIN users b ON a.id = b.ubicacion WHERE b.id = ".$userId." ");

        $ubs = DB::connection('odbc')->select("SELECT a.id, a.nombre, a.ciudad, a.estado FROM ubicaciones a ");

        foreach ($ubs as $ub ) {
            $rooms[$ub->id] = DB::connection('odbc')->select("SELECT a.id, a.id_ubicacion, a.nombre_seccion FROM seccions a WHERE a.id_ubicacion = ".$ub->id." "); 
        }


        $items = DB::connection('odbc')->select("SELECT a.id_seccions, a.id_item FROM items_seccions a ");

        foreach ($items as $item ) {
            $room_items[$item->id_seccions] = DB::connection('odbc')->select("SELECT a.item_nombre, a.item_descripcion FROM items a WHERE a.id = ".$item->id_item." "); 
        }

        return view('admin.reservacions.create')->with('ub_default', $ub_default)->with('ubs', $ubs)->with('rooms', $rooms)->with('room_items', $room_items)->with('items', $items);
    }



    /**
     * Store a newly created Reservacion in storage.
     *
     * @param  \App\Http\Requests\StoreReservacionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservacionsRequest $request)
    {
        if (! Gate::allows('reservacion_create')) {
            return abort(401);
        }

        #ar_dump($request); echo "<br>";
        #$request = $this->saveFiles($request);
var_dump($request->date);

        $f_inicio = date('d/m/Y', strtotime($request->date));      ####validar que pedo aqui,, necesitas un numero qeu e formateee en dd/mm/aaaa 
        $h_inicio = date('H:i', strtotime($request->hora_inicio));
        $h_duracion = date('H:i', strtotime($request->horas));
        $id_seccion = $request->sala_de_juntas;
        $repeat  = ($request->repeat == 1) ? 1 : 0 ;

            

        $tStart = strtotime($h_inicio);
        $tEnd = $tStart + strtotime($h_duracion);
        $tNow = $tStart;

var_dump($f_inicio); echo "<br>";
var_dump($h_inicio); echo "<br>";

        # validate if date is selected 
        $val_reservation= DB::connection('odbc')->selectOne("SELECT id FROM reservaciones WHERE id_seccion = ".$request->sala_de_juntas." AND fecha_inicio = '".$f_inicio."' AND hora_inicio='".$h_inicio."' ");

        /*while($tNow <= $tEnd){
            $x = date("H:i",$tNow);
            $val_reservation= DB::connection('odbc')->selectOne("SELECT id FROM reservaciones WHERE id_seccion = ".$request->sala_de_juntas." AND fecha_inicio = '".$f_inicio."' AND hora_inicio='".$x."' ");    
            $x = strtotime('+30 minutes',$tNow);
        }*/

var_dump($val_reservation); echo "<br>";

        if ( !empty($val_reservation) ) {
            $error = "Hora y Sala ya han sido reservadas, elija otra hora";
            #return redirect()->route('admin.reservacions.create')->with('error', $error);    
            echo "nononono";
            exit();
        } else {

            $query  = "INSERT INTO reservaciones (created_at, nombre_reunion, id_ubicacion, id_seccion, fecha_inicio, hora_inicio, tiempo_duracion, message, repeat) VALUES (getdate(), '".$request->nombre_de_reunion."', ".$request->ubicacion.", ".$request->sala_de_juntas.", '".$f_inicio."', '".$h_inicio."', '".$h_duracion."', '".$request->comentario."', ".$repeat.")";


echo "<br>";
var_dump($query);

            $reservation = DB::connection('odbc')->insert("INSERT INTO reservaciones (created_at, nombre_reunion, id_ubicacion, id_seccion, fecha_inicio, hora_inicio, tiempo_duracion, message, repeat) VALUES (getdate(), '".$request->nombre_de_reunion."', ".$request->ubicacion.", ".$request->sala_de_juntas.", '".$f_inicio."', '".$h_inicio."', '".$h_duracion."', '".$request->comentario."', ".$repeat.")");

            $last_id = DB::connection('odbc')->selectOne("SELECT LAST_INSERT_ID()");



            $guest_count = (count($request->guest_name));

            for ($i=0; $i <= $guest_count ; $i++) { 
                
                $q2 = "INSERT INTO invitados (id_reservacion, nombre, apellido, email, created_at) VALUES ".$last_id.", '".$request->guest_name[$i]."', '".$request->guest_last[$i]."', '".$request->guest_email[$i]."', getdate() ";
echo "<br>";
var_dump($q2);
                 #DB::connection('odbc')->insert("INSERT INTO invitados (id_reservacion, nombre, apellido, email, created_at) VALUES ".$last_id.", '".$request->guest_name[$i]."', '".$request->guest_last[$i]."', '".$request->guest_email[$i]."', getdate() ");


            }

        }

        echo "<br>";
        var_dump($request->all());
       

        #$reservacion = Reservacion::create($request->all());
        #return redirect()->route('admin.reservacions.index');
    }


    /**
     * Show the form for editing Reservacion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('reservacion_edit')) {
            return abort(401);
        }
        $reservacion = Reservacion::findOrFail($id);

        return view('admin.reservacions.edit', compact('reservacion'));
    }

    /**
     * Update Reservacion in storage.
     *
     * @param  \App\Http\Requests\UpdateReservacionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservacionsRequest $request, $id)
    {
        if (! Gate::allows('reservacion_edit')) {
            return abort(401);
        }
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->update($request->all());



        return redirect()->route('admin.reservacions.index');
    }


    /**
     * Display Reservacion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('reservacion_view')) {
            return abort(401);
        }
        $reservacion = Reservacion::findOrFail($id);

        return view('admin.reservacions.show', compact('reservacion'));
    }

}

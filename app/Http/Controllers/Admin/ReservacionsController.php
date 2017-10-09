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


    public function addDayswithdate($date,$days, $endDate, &$finalResult){
        $tempDate = strtotime($date);   
        $tempDate += 3600*24*$days;
        if ($tempDate < strtotime($endDate)) {
            $finalResult[] = date("Y-m-d", $tempDate);
            addDayswithdate(date("Y-m-d", $tempDate), $days, $endDate, $finalResult);
        } else {
            return true;        
        }
    }







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


        $f_inicio = $request->date;
        $f_ini2 = explode('/', $f_inicio);
        $f_ini3 = $f_ini2[2]."-".$f_ini2[1]."-".$f_ini2[0]; 

        $h_inicio = date('H:i:s', strtotime($request->hora_inicio));
        $h_duracion = date('H:i:s', strtotime($request->horas));
        $id_seccion = $request->sala_de_juntas;
        $repeat  = ($request->repeat == 1) ? 1 : 0 ;
   
        # validate if date is selected 
        $val_reservation= DB::connection('odbc')->select("SELECT id, fecha_inicio, hora_inicio, tiempo_duracion FROM reservaciones WHERE id_seccion = ".$request->sala_de_juntas." AND fecha_inicio = '".$f_ini3."' ");

        foreach ($val_reservation as $key ) {
            $tiempo_final = $key->hora_inicio + $key->tiempo_duracion;
            if ($h_inicio >= $key->hora_inicio && $h_inicio < $tiempo_final) {
                $validation[] = $key->id; 
            }
        }

        if ( !empty($validation) ) {
            $error = "Hora y Sala ya han sido reservadas, elija otra hora";
            #return redirect()->route('admin.reservacions.create')->with('error', $error);    
            echo "nononono";
            exit();
        } else {

            $reservation = DB::connection('odbc')->insert("INSERT INTO reservaciones (created_at, nombre_reunion, id_ubicacion, id_seccion, fecha_inicio, hora_inicio, tiempo_duracion, message, repeat) VALUES (getdate(), '".$request->nombre_de_reunion."', ".$request->ubicacion.", ".$request->sala_de_juntas.", '".$f_ini3."', '".$h_inicio."', '".$h_duracion."', '".$request->comentario."', ".$repeat.")");

            $last_id = DB::connection('odbc')->selectOne("SELECT id FROM reservaciones WHERE message ='".$request->comentario."' AND  fecha_inicio ='".$f_ini3."' AND hora_inicio = '".$h_inicio."' ");

            $guest_count = (count($request->guest_name));

            for ($i=0; $i < $guest_count; $i++) { 
                
                 DB::connection('odbc')->insert("INSERT INTO invitados (id_reservacion, nombre, apellido, email, created_at) VALUES (".$last_id->id.", '".$request->guest_name[$i]."', '".$request->guest_last[$i]."', '".$request->guest_email[$i]."', getdate()) ");
            }

            if( $repeat == 1 ) {

                if( $request->concurrencia == 1 ) {

                    # -1 cada n dias, -2 cada día de la semana
                    $repeticion = $request->repeticion;
                    $rep_end = $request->rep_end;
                    if ($rep_end == 2) { 
                        $dateEnd = $request->end_date; 
                        $dateEnd2 = explode('/', $dateEnd);
                        $dateEnd3 = $dateEnd2[2]."-".$dateEnd2[1]."-".$dateEnd2[0];
                    } else {
                        $dateEnd3 = date("Y-m-d", strtotime($f_ini3. " +2 years"));
                    }

                    # repeticion cada N dias
                    if ($repeticion == 1) {

                        $startDate = $f_ini3;
                        $endDate = $dateEnd3;
                        $daysBetween = $request->dia_cons;
                        $finalResult = array();
                        addDayswithdate($startDate,$daysBetween, $endDate, $finalResult);

                        for ($i=0; $i < count($finalResult); $i++) { 
                            $reservation = DB::connection('odbc')->insert("INSERT INTO reservaciones (created_at, nombre_reunion, id_ubicacion, id_seccion, fecha_inicio, hora_inicio, tiempo_duracion, message, repeat) VALUES (getdate(), '".$request->nombre_de_reunion."', ".$request->ubicacion.", ".$request->sala_de_juntas.", '".$finalResult[$i]."', '".$h_inicio."', '".$h_duracion."', '".$request->comentario."', ".$repeat.")");
                        }

                    #repeticion diario   
                    } else {

                        $startDate = $f_ini3;
                        $endDate = $dateEnd3;
                        $daysBetween = 1;
                        $finalResult = array();
                        addDayswithdate($startDate,$daysBetween, $endDate, $finalResult);

                        for ($i=0; $i < count($finalResult); $i++) { 
                            $reservation = DB::connection('odbc')->insert("INSERT INTO reservaciones (created_at, nombre_reunion, id_ubicacion, id_seccion, fecha_inicio, hora_inicio, tiempo_duracion, message, repeat) VALUES (getdate(), '".$request->nombre_de_reunion."', ".$request->ubicacion.", ".$request->sala_de_juntas.", '".$finalResult[$i]."', '".$h_inicio."', '".$h_duracion."', '".$request->comentario."', ".$repeat.")");
                        }
                    }


                } elseif ( $request->concurrencia == 2 ) {
                    # code...
                } elseif ( $request->concurrencia == 3 ) {
                    # code...
                }



            }   

        }

        #$reservacion = Reservacion::create($request->all());
        return redirect()->route('admin.reservacions.index');
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

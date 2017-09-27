<?php

namespace App\Http\Controllers\Admin;

use App\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSeccionsRequest;
use App\Http\Requests\Admin\UpdateSeccionsRequest;
use DB;

class SeccionsController extends Controller
{
    /**
     * Display a listing of Seccion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('seccion_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('seccion_delete')) {
                return abort(401);
            }
            $seccions = Seccion::onlyTrashed()->get();
        } else {
            
            try {
                $seccions= DB::connection('mysql')->select('SELECT a.id, b.nombre as id_ubicacion, a.nombre_seccion, a.id_atributos, a.created_at, a.updated_at, 
                                                           a.deleted_at FROM seccions a JOIN ubicaciones b on a.id_ubicacion = b.id  ') ;     

            } catch (\Exception $ubicaciones) {
                die("Could not connect to the database.  Please check your configuration.");
            }

        }

        return view('admin.seccions.index', compact('seccions'));
    }

    /**
     * Show the form for creating new Seccion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('seccion_create')) {
            return abort(401);
        }
        
        # get ubications
        try {
            $ubicaciones= DB::connection('mysql')->select('SELECT id, nombre, estado FROM ubicaciones') ;                
        } catch (\Exception $ubicaciones) {
            die("Could not connect to the database.  Please check your configuration.");
        }

        #get items
        try {
            $items= DB::connection('mysql')->select('SELECT id, item_nombre, item_descripcion FROM items') ;                
        } catch (\Exception $items) {
            die("Could not connect to the database.  Please check your configuration.");
        }

        return view('admin.seccions.create')->with('ubicaciones', $ubicaciones)->with('items', $items);
    }

    /**
     * Store a newly created Seccion in storage.
     *
     * @param  \App\Http\Requests\StoreSeccionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeccionsRequest $request)
    {
        if (! Gate::allows('seccion_create')) {
            return abort(401);
        }
          #count the items in seccion
          $request['id_atributos'] = count($request['item']);          

          # insert and get last id 
          $seccion = Seccion::create($request->all());
          $last_id=$seccion->id;

          try {
            foreach ($request['item'] as $item) {
              
                $inserted_items= DB::connection('mysql')->insert(
                                  'INSERT INTO items_seccions ( id_seccions, id_item, created_at ) 
                                  VALUES ( "'.$last_id.'", "'.$item.'", NOW() )');        
            }
               
          } catch (\Exception $inserted_items) {
                die($inserted_items->getMessage());
          }          

        return redirect()->route('admin.seccions.index');
    }


    /**
     * Show the form for editing Seccion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('seccion_edit')) {
            return abort(401);
        }
        $seccion = Seccion::findOrFail($id);

        return view('admin.seccions.edit', compact('seccion'));
    }

    /**
     * Update Seccion in storage.
     *
     * @param  \App\Http\Requests\UpdateSeccionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeccionsRequest $request, $id)
    {
        if (! Gate::allows('seccion_edit')) {
            return abort(401);
        }
        $seccion = Seccion::findOrFail($id);
        $seccion->update($request->all());



        return redirect()->route('admin.seccions.index');
    }


    /**
     * Display Seccion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('seccion_view')) {
            return abort(401);
        }
        $seccion = Seccion::findOrFail($id);

        # get items
        try {
            $find_items= DB::connection('mysql')->select('SELECT a.item_nombre, a.item_descripcion FROM items a JOIN items_seccions b ON a.id = b.id_item  WHERE b.id_seccions = "'.$id.'" ') ;
            $find_location= DB::connection('mysql')->select('SELECT a.nombre, a.ciudad, a.estado FROM ubicaciones a JOIN seccions b ON a.id = b.id_ubicacion  WHERE b.id = "'.$id.'" ')                
        } catch (\Exception $find_items) {
            die("Could not connect to the database.  Please check your configuration.");
        }

        return view('admin.seccions.show', compact('seccion'))->with('find_items', $find_items);
    }


    /**
     * Remove Seccion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('seccion_delete')) {
            return abort(401);
        }
        $seccion = Seccion::findOrFail($id);
        $seccion->delete();

        return redirect()->route('admin.seccions.index');
    }

    /**
     * Delete all selected Seccion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('seccion_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Seccion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Seccion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('seccion_delete')) {
            return abort(401);
        }
        $seccion = Seccion::onlyTrashed()->findOrFail($id);
        $seccion->restore();

        return redirect()->route('admin.seccions.index');
    }

    /**
     * Permanently delete Seccion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('seccion_delete')) {
            return abort(401);
        }
        $seccion = Seccion::onlyTrashed()->findOrFail($id);
        $seccion->forceDelete();

        return redirect()->route('admin.seccions.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreReservacionsRequest;
use App\Http\Requests\Admin\UpdateReservacionsRequest;

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
        return view('admin.reservacions.create');
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
        $reservacion = Reservacion::create($request->all());



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


    /**
     * Remove Reservacion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('reservacion_delete')) {
            return abort(401);
        }
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete();

        return redirect()->route('admin.reservacions.index');
    }

    /**
     * Delete all selected Reservacion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('reservacion_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Reservacion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Reservacion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('reservacion_delete')) {
            return abort(401);
        }
        $reservacion = Reservacion::onlyTrashed()->findOrFail($id);
        $reservacion->restore();

        return redirect()->route('admin.reservacions.index');
    }

    /**
     * Permanently delete Reservacion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('reservacion_delete')) {
            return abort(401);
        }
        $reservacion = Reservacion::onlyTrashed()->findOrFail($id);
        $reservacion->forceDelete();

        return redirect()->route('admin.reservacions.index');
    }
}

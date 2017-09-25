@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservacion.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.nombre-de-reunion')</th>
                            <td field-key='nombre_de_reunion'>{{ $reservacion->nombre_de_reunion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.ubicacion')</th>
                            <td field-key='ubicacion'>{{ $reservacion->ubicacion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.sala-de-juntas')</th>
                            <td field-key='sala_de_juntas'>{{ $reservacion->sala_de_juntas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.fecha-de-inicio')</th>
                            <td field-key='fecha_de_inicio'>{{ $reservacion->fecha_de_inicio }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.fecha-de-finalizacion')</th>
                            <td field-key='fecha_de_finalizacion'>{{ $reservacion->fecha_de_finalizacion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.repeat')</th>
                            <td field-key='repeat'>{{ Form::checkbox("repeat", 1, $reservacion->repeat == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.invitado')</th>
                            <td field-key='invitado'>{!! $reservacion->invitado !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.comentario')</th>
                            <td field-key='comentario'>{!! $reservacion->comentario !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.reservacions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

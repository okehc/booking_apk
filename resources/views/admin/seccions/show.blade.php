@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.seccion.title')</h3>

<?php
         var_dump($find_items);
?>         

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.seccion.fields.id-ubicacion')</th>
                            <td field-key='id_ubicacion'>{{ $seccion->id_ubicacion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.seccion.fields.nombre-seccion')</th>
                            <td field-key='nombre_seccion'>{{ $seccion->nombre_seccion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.seccion.fields.id-atributos')</th>
                            <td field-key='id_atributos'>{{ $seccion->id_atributos }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.seccions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

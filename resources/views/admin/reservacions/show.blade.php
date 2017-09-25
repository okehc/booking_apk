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
                            <th>@lang('quickadmin.reservacion.fields.nombre')</th>
                            <td field-key='nombre'>{{ $reservacion->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.comentario')</th>
                            <td field-key='comentario'>{{ $reservacion->comentario }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.reservacions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

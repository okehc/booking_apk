@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.accesos.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.accesos.fields.nombre-acceso')</th>
                            <td field-key='nombre_acceso'>{{ $acceso->nombre_acceso }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.accesos.fields.id-ubicacion')</th>
                            <td field-key='id_ubicacion'>
                                {{ $location->nombre }}, {{ $location->ciudad }}, {{ $location->estado }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.accesos.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

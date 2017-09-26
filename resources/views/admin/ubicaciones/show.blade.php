@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ubicaciones.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.ubicaciones.fields.nombre')</th>
                            <td field-key='nombre'>{{ $ubicacione->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ubicaciones.fields.ciudad')</th>
                            <td field-key='ciudad'>{{ $ubicacione->ciudad }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ubicaciones.fields.estado')</th>
                            <td field-key='estado'>{{ $ubicacione->estado }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ubicaciones.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservacion.title')</h3>
    @can('reservacion_create')
    <p>
        <a href="{{ route('admin.reservacions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($reservacions) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.reservacion.fields.nombre-de-reunion')</th>
                        <th>@lang('quickadmin.reservacion.fields.ubicacion')</th>
                        <th>@lang('quickadmin.reservacion.fields.sala-de-juntas')</th>
                        <th>@lang('quickadmin.reservacion.fields.hora-duracion')</th>
                        <th>@lang('quickadmin.reservacion.fields.minuto-duracion')</th>
                        <th>@lang('quickadmin.reservacion.fields.tiempo')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($reservacions) > 0)
                        @foreach ($reservacions as $reservacion)
                            <tr data-entry-id="{{ $reservacion->id }}">
                                
                                <td field-key='nombre_de_reunion'>{{ $reservacion->nombre_reunion }}</td>
                                <td field-key='ubicacion'>{{ $reservacion->ubicacion }}</td>
                                <td field-key='sala_de_juntas'>{{ $reservacion->sala_de_juntas }}</td>
                                <td field-key='hora_duracion'>{{ $reservacion->hora_duracion }}</td>
                                <td field-key='minuto_duracion'>{{ $reservacion->minuto_duracion }}</td>
                                <td field-key='comentario'>{!! $reservacion->tiempo !!}</td>
                                                                <td>
                                    @can('reservacion_view')
                                    <a href="{{ route('admin.reservacions.show',[$reservacion->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection
@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservacion.title')</h3>
    @can('reservacion_create')
    <p>
        <a href="{{ route('admin.reservacions.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('reservacion_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.reservacions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.reservacions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($reservacions) > 0 ? 'datatable' : '' }} @can('reservacion_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('reservacion_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.reservacion.fields.nombre-de-reunion')</th>
                        <th>@lang('quickadmin.reservacion.fields.sala-de-juntas')</th>
                        <th>@lang('quickadmin.reservacion.fields.capacidad')</th>
                        <th>@lang('quickadmin.reservacion.fields.fecha-de-inicio')</th>
                        <th>@lang('quickadmin.reservacion.fields.fecha-de-finalizacion')</th>
                        <th>@lang('quickadmin.reservacion.fields.invitado')</th>
                        <th>@lang('quickadmin.reservacion.fields.comentario')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($reservacions) > 0)
                        @foreach ($reservacions as $reservacion)
                            <tr data-entry-id="{{ $reservacion->id }}">
                                @can('reservacion_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='nombre_de_reunion'>{{ $reservacion->nombre_de_reunion }}</td>
                                <td field-key='sala_de_juntas'>{{ $reservacion->sala_de_juntas }}</td>
                                <td field-key='capacidad'>{{ $reservacion->capacidad }}</td>
                                <td field-key='fecha_de_inicio'>{{ $reservacion->fecha_de_inicio }}</td>
                                <td field-key='fecha_de_finalizacion'>{{ $reservacion->fecha_de_finalizacion }}</td>
                                <td field-key='invitado'>{{ $reservacion->invitado }}</td>
                                <td field-key='comentario'>{!! $reservacion->comentario !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('reservacion_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservacions.restore', $reservacion->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('reservacion_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservacions.perma_del', $reservacion->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('reservacion_view')
                                    <a href="{{ route('admin.reservacions.show',[$reservacion->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('reservacion_edit')
                                    <a href="{{ route('admin.reservacions.edit',[$reservacion->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('reservacion_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.reservacions.destroy', $reservacion->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('reservacion_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.reservacions.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
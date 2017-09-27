@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.accesos.title')</h3>
    
    {!! Form::model($acceso, ['method' => 'PUT', 'route' => ['admin.accesos.update', $acceso->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombre_acceso', trans('quickadmin.accesos.fields.nombre-acceso').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre_acceso', old('nombre_acceso'), ['class' => 'form-control', 'placeholder' => 'Nombre del acceso a crear', 'required' => '']) !!}
                    <p class="help-block">Nombre del acceso a crear</p>
                    @if($errors->has('nombre_acceso'))
                        <p class="help-block">
                            {{ $errors->first('nombre_acceso') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('id_ubicacion', trans('quickadmin.accesos.fields.id-ubicacion').'*', ['class' => 'control-label']) !!}
                    <select name="id_ubicacion">
                        <option value="{{ $location->id }}" selected>{{ $location->nombre }}, {{ $location->ciudad }}, {{ $location->estado }}</option>
                        @foreach($ubicaciones as $ubicacion)
                         <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}, {{ $ubicacion->ciudad }}, {{ $ubicacion->estado }}</option>
                        @endforeach
                    </select>
                    <p class="help-block">Ubicación a la que pertenece</p>
                    @if($errors->has('id_ubicacion'))
                        <p class="help-block">
                            {{ $errors->first('id_ubicacion') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


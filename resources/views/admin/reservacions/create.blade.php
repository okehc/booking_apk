@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservacion.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.reservacions.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('nombre_de_reunion', trans('quickadmin.reservacion.fields.nombre-de-reunion').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('nombre_de_reunion', old('nombre_de_reunion'), ['class' => 'form-control', 'placeholder' => 'Nombre de la Reunión', 'required' => '']) !!}
                    <p class="help-block">Nombre de la Reunión</p>
                    @if($errors->has('nombre_de_reunion'))
                        <p class="help-block">
                            {{ $errors->first('nombre_de_reunion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ubicacion', trans('quickadmin.reservacion.fields.ubicacion').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ubicacion', old('ubicacion'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ubicacion'))
                        <p class="help-block">
                            {{ $errors->first('ubicacion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sala_de_juntas', trans('quickadmin.reservacion.fields.sala-de-juntas').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('sala_de_juntas', old('sala_de_juntas'), ['class' => 'form-control', 'placeholder' => 'Nombre de sala de juntas', 'required' => '']) !!}
                    <p class="help-block">Nombre de sala de juntas</p>
                    @if($errors->has('sala_de_juntas'))
                        <p class="help-block">
                            {{ $errors->first('sala_de_juntas') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha_de_inicio', trans('quickadmin.reservacion.fields.fecha-de-inicio').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha_de_inicio', old('fecha_de_inicio'), ['class' => 'form-control datetime', 'placeholder' => 'Fecha de Inicio', 'required' => '']) !!}
                    <p class="help-block">Fecha de Inicio</p>
                    @if($errors->has('fecha_de_inicio'))
                        <p class="help-block">
                            {{ $errors->first('fecha_de_inicio') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fecha_de_finalizacion', trans('quickadmin.reservacion.fields.fecha-de-finalizacion').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fecha_de_finalizacion', old('fecha_de_finalizacion'), ['class' => 'form-control datetime', 'placeholder' => 'Fecha de Terminación de Reunión', 'required' => '']) !!}
                    <p class="help-block">Fecha de Terminación de Reunión</p>
                    @if($errors->has('fecha_de_finalizacion'))
                        <p class="help-block">
                            {{ $errors->first('fecha_de_finalizacion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('repeat', trans('quickadmin.reservacion.fields.repeat').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('repeat', 0) !!}
                    {!! Form::checkbox('repeat', 1, false, []) !!}
                    <p class="help-block">repetir la reunion?</p>
                    @if($errors->has('repeat'))
                        <p class="help-block">
                            {{ $errors->first('repeat') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('invitado', trans('quickadmin.reservacion.fields.invitado').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('invitado', old('invitado'), ['class' => 'form-control ', 'placeholder' => 'Escribir los correos separados por comas ( , )']) !!}
                    <p class="help-block">Escribir los correos separados por comas ( , )</p>
                    @if($errors->has('invitado'))
                        <p class="help-block">
                            {{ $errors->first('invitado') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('comentario', trans('quickadmin.reservacion.fields.comentario').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('comentario', old('comentario'), ['class' => 'form-control ', 'placeholder' => 'Texto para enviar por correo']) !!}
                    <p class="help-block">Texto para enviar por correo</p>
                    @if($errors->has('comentario'))
                        <p class="help-block">
                            {{ $errors->first('comentario') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "HH:mm:ss"
        });
    </script>

@stop
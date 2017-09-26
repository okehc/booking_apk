@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reservacion.title')</h3>
    
    {!! Form::model($reservacion, ['method' => 'PUT', 'route' => ['admin.reservacions.update', $reservacion->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
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
                    {!! Form::label('hora_duracion', trans('quickadmin.reservacion.fields.hora-duracion').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('hora_duracion', old('hora_duracion'), ['class' => 'form-control', 'placeholder' => 'Hora que dura la reunión', 'required' => '']) !!}
                    <p class="help-block">Hora que dura la reunión</p>
                    @if($errors->has('hora_duracion'))
                        <p class="help-block">
                            {{ $errors->first('hora_duracion') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('minuto_duracion', trans('quickadmin.reservacion.fields.minuto-duracion').'*', ['class' => 'control-label']) !!}
                    {!! Form::number('minuto_duracion', old('minuto_duracion'), ['class' => 'form-control', 'placeholder' => 'minutos', 'required' => '']) !!}
                    <p class="help-block">minutos</p>
                    @if($errors->has('minuto_duracion'))
                        <p class="help-block">
                            {{ $errors->first('minuto_duracion') }}
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

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


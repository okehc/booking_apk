@extends('layouts.app')

@section('javascript')


  <script type="text/javascript" src="{{asset('datePicker/moment.js)}}"></script>
<script type="text/javascript" src="{{asset('datePicker/transition.js)}}"></script>
<script type="text/javascript" src="{{asset('datePicker/collapse.js)}}"></script>
<script type="text/javascript" src="{{asset('datePicker/bootstrap.min.js)}}"></script>
<script type="text/javascript" src="{{asset('datePicker/bootstrap-datetimepicker.min.js)}}"></script>

    <script>
    $(function() {        
        $('.options').hide();
        var x = document.getElementById("ubicacion").value;
        $('#' + x).show(); 
        $('#ubicacion').change(function(){
            $('.options').hide();
            $('#' + $(this).val()).show();
        });


        $('.desc').hide();
        var y = $('.options').val(); 

        $('#' + y).show(); 
        $('.options').change(function(){
            $('.desc').hide();
            $('#' + $(this).val()).show();
        });
        

        $('.datepicker').datetimepicker();


    });
    </script>
@endsection

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
                    <select name="ubicacion" id="ubicacion">
                        <option value="{{ $ub_default->id }}" SELECTED>{{ $ub_default->nombre}} - {{ $ub_default->ciudad}} - {{ $ub_default->estado}}</option>

                        @foreach($ubs as $ub)
                            <option value="{{ $ub->id }}">{{ $ub->nombre}} - {{ $ub->ciudad}} - {{ $ub->estado}}</option>
                        @endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('ubicacion'))
                        <p class="help-block">
                            {{ $errors->first('ubicacion') }}
                        </p>
                    @endif
                </div>
            </div>

            
            <div class="row" >
                <div class="col-xs-12 form-group">
                    {!! Form::label('sala_de_juntas', trans('quickadmin.reservacion.fields.sala-de-juntas').'*', ['class' => 'control-label']) !!}

                    @foreach($ubs as $ub)
                    <select name="sala_de_juntas" id="{{ $ub->id }}" class="options"> 
                        @foreach($rooms[$ub->id] as $room)
                            <option value="{{ $room->id }}">{{ $room->nombre_seccion}}</option>
                        @endforeach
                    </select>
                    @endforeach



                    <p class="help-block"> Inventario de Sala </br>
                        @foreach($items as $item)

                            @foreach($room_items[$item->id_seccions] as $it_desc)
                                <p id="{{ $item->id_seccions }}" class="desc" > {{ $it_desc->item_nombre }} - {{ $it_desc->item_descripcion }} </p>
                            @endforeach
                        @endforeach

                    </p>

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
                    

                    <input type="text" class="form-control datepicker" name="date">


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


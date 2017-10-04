@extends('layouts.app')

@section('javascript')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
 
       <link rel="stylesheet" href="{{asset('picker/jquery.timepicker.css')}}">
    <script src="{{asset('picker/jquery.timepicker.js')}}"></script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.3/jquery.timepicker.min.js"></script>

    <script>
    $(function() {        
        $('.options').hide();
        $('#divConcurrencia').hide();

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
        
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true,
            daysOfWeekDisabled: "0,6",
            daysOfWeekHighlighted: "1",
            calendarWeeks: true, 
            todayHighlight: true,
            sideBySide: true
        });


         $( "#timepicker" ).timepicker();
         $('#divConcurrencia').hide();

         $("#repeat").change(function() {
            if(this.checked) {
                $('#divConcurrencia').show();
            } else {
                $('#divConcurrencia').hide();
            }
         });


        var conc = $("#concurrencia").val();

        if ( conc == 1 ) {
            $("#diar").show(); 
            $("#sem").hide(); 
            $("#men").hide(); 
        } else if ( conc == 2 ) {
            $("#sem").show(); 
            $("#diar").hide(); 
            $("#men").hide(); 
        } else {
            $("#men").show(); 
            $("#sem").hide(); 
            $("#diar").hide(); 
        }
        

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
                    
                    {!! Form::label('hora_inicio', trans('quickadmin.reservacion.fields.hora-inicio').'*', ['class' => 'control-label']) !!}
                    </br>

                    <input type="text" id="timepicker" class="from-control">

                    
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


                    <select name="horas" class="form-control"> 
                    <?php
                        $start = "00:00";
                        $end = "12:00";
                    
                        $tStart = strtotime($start);
                        $tEnd = strtotime($end);
                        $tNow = $tStart;
                    
                        while($tNow <= $tEnd){
                            $x = date("H:i",$tNow);
                            echo "<option value='".$x."'>".$x."</option>";
                            $tNow = strtotime('+30 minutes',$tNow);
                        }
                    ?>
                    </select>

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
                    
                    <input type="checkbox" id="repeat" value="repeat">

                </div>
                <div class="col-xs-12 form-group" id="divConcurrencia">
                    {!! Form::label('concurrencia', trans('quickadmin.reservacion.fields.concurrencia').'', ['class' => 'control-label']) !!}
                    <select name="concurrencia" id="concurrencia" class="form-control" > 
                        <option value="1">Diario</option>
                        <option value="2">Semanal</option>
                        <option value="3">Mensual</option>
                    </select>
                </div>
            </div>


            <div class="row" id="diar">
                <div class="col-xs-12 form-group">
                    <input type="radio" name="cuantosDias" > Cada 
                        <select name="dia_cons" >
                            <option  value="1"> 1 </option>
                            <option  value="2"> 2 </option>
                            <option  value="3"> 3 </option>
                            <option  value="4"> 4 </option>
                            <option  value="5"> 5 </option>
                            <option  value="6"> 6 </option>
                            <option  value="7"> 7 </option>
                        </select> dia(s)
                </div>
            </div>
            
            <div  class="row" id="sem">    
                <div class="col-xs-12 form-group">
                    <input type="radio" name="cuantosDias" value="2"> Cada día de la semana
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


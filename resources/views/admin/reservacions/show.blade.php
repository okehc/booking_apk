@extends('layouts.app')
@section('javascript')
 <script src="{!!asset('/assets/dist/summernote.css')!!}"></script>
 <script src="{!!asset('/assets/dist/summernote.min.js')!!}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:300,
            });
        });
    </script>
@endsection
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
                            <th>@lang('quickadmin.reservacion.fields.nombre-de-reunion')</th>
                            <td field-key='nombre_de_reunion'>{{ $reservacion->nombre_de_reunion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.ubicacion')</th>
                            <td field-key='ubicacion'>{{ $reservacion->ubicacion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.sala-de-juntas')</th>
                            <td field-key='sala_de_juntas'>{{ $reservacion->sala_de_juntas }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.hora-duracion')</th>
                            <td field-key='hora_duracion'>{{ $reservacion->hora_duracion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.minuto-duracion')</th>
                            <td field-key='minuto_duracion'>{{ $reservacion->minuto_duracion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.repeat')</th>
                            <td field-key='repeat'>{{ Form::checkbox("repeat", 1, $reservacion->repeat == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reservacion.fields.comentario')</th>
                            <td field-key='comentario'>{!! $reservacion->comentario !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>


 <div class="box-body">
 <div class="form-group">
 {{Form::label('title', 'Minuta')}}
 </div>
 <div class="form-group">
  {{Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'summernote'))}}
 </div>
 <div id="summernote"></div>
 <div class="form-group">
     {{Form::submit('Enviar Minuta',array('class' => 'btn btn-primary btn-sm'))}} </div>


            <a href="{{ route('admin.reservacions.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

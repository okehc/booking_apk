@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.departamentos.title')</h3>
    
    {!! Form::model($departamento, ['method' => 'PUT', 'route' => ['admin.departamentos.update', $departamento->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('departamento', trans('quickadmin.departamentos.fields.departamento').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('departamento', old('departamento'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('departamento'))
                        <p class="help-block">
                            {{ $errors->first('departamento') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('descripcion', trans('quickadmin.departamentos.fields.descripcion').'', ['class' => 'control-label']) !!}
                    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('descripcion'))
                        <p class="help-block">
                            {{ $errors->first('descripcion') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


                
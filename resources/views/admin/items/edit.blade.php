                    
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>
    
    {!! Form::model($item, ['method' => 'PUT', 'route' => ['admin.items.update', $item->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('item_nombre', trans('quickadmin.items.fields.item-nombre').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('item_nombre', old('item_nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre del articulo para la salas', 'required' => '']) !!}
                    <p class="help-block">Nombre del articulo para la salas</p>
                    @if($errors->has('item_nombre'))
                        <p class="help-block">
                            {{ $errors->first('item_nombre') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('item_descripcion', trans('quickadmin.items.fields.item-descripcion').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('item_descripcion', old('item_descripcion'), ['class' => 'form-control ', 'placeholder' => 'Descripción del Item a agregar']) !!}
                    <p class="help-block">Descripción del Item a agregar</p>
                    @if($errors->has('item_descripcion'))
                        <p class="help-block">
                            {{ $errors->first('item_descripcion') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


                
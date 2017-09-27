@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.apellido-paterno')</th>
                            <td field-key='apellido_paterno'>{{ $user->apellido_paterno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.apellido-materno')</th>
                            <td field-key='apellido_materno'>{{ $user->apellido_materno }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.ubicacion')</th>
                            <td field-key='ubicacion'>{{ $user->ubicacion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.departamento')</th>
                            <td field-key='departamento'>{{ $user->departamento }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.extension')</th>
                            <td field-key='extension'>{{ $user->extension }}</td>
                        </tr>
                        <tr>                        
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>{{ $user->role->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

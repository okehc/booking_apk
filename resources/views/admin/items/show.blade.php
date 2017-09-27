                    
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.items.fields.item-nombre')</th>
                            <td field-key='item_nombre'>{{ $item->item_nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.items.fields.item-descripcion')</th>
                            <td field-key='item_descripcion'>{!! $item->item_descripcion !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.items.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

                
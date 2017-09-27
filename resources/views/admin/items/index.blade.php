                    
@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.items.title')</h3>
    @can('item_create')
    <p>
        <a href="{{ route('admin.items.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($items) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.items.fields.item-nombre')</th>
                        <th>@lang('quickadmin.items.fields.item-descripcion')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($items) > 0)
                        @foreach ($items as $item)
                            <tr data-entry-id="{{ $item->id }}">
                                
                                <td field-key='item_nombre'>{{ $item->item_nombre }}</td>
                                <td field-key='item_descripcion'>{!! $item->item_descripcion !!}</td>
                                                                <td>
                                    @can('item_view')
                                    <a href="{{ route('admin.items.show',[$item->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('item_edit')
                                    <a href="{{ route('admin.items.edit',[$item->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
</td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection

                
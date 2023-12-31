@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item route='{{route("backend.$module_name.index")}}' icon='{{ $module_icon }}'>
        {{ __($module_title) }}
    </x-backend-breadcrumb-item>
    <x-backend-breadcrumb-item type="active">{{ __($module_action) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-0">
                    <i class="{{ $module_icon }}"></i> {{ __($module_title) }}
                    <small class="text-muted">{{ __($module_action) }}</small>
                </h4>
                <div class="small text-medium-emphasis">{{ __($module_title) }} {{__('common.sub_title')}}</div>
            </div>
            <div class="btn-toolbar d-block" role="toolbar" aria-label="Toolbar with buttons">
                <a href="{{ route("backend.$module_name.create") }}" class="btn btn-outline-success m-1" data-toggle="tooltip" title="Create New"><i class="fas fa-plus-circle"></i> @lang("Create new :module_name", ['module_name'=>Str::title($module_name)])</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">

                @if (count($backups))
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                {{__('backup.list.index.id')}}
                            </th>
                            <th>
                               {{__('backup.list.index.file')}}
                            </th>
                            <th>
                               {{__('backup.list.index.size')}}
                            </th>
                            <th>
                               {{__('backup.list.index.date')}}
                            </th>
                            <th>
                               {{__('backup.list.index.age')}}
                            </th>
                            <th class="text-end">
                               {{__('backup.list.index.action')}}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($backups as $key => $backup)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{__('backup.list.index.file_name')}}
                            </td>
                            <td>
                                {{__('backup.list.index.file_size')}}
                            </td>
                            <td>
                                {{__('backup.list.index.date_created')}}
                            </td>
                            <td>
                                {{__('backup.list.index.date_ago')}}
                            </td>
                            <td class="text-end">
                                <a href="{{ route("backend.$module_name.download", $backup['file_name']) }}" class="btn btn-primary m-1 btn-sm" data-toggle="tooltip" title="@lang('Download File')"><i class="fas fa-cloud-download-alt"></i>&nbsp;@lang('Download')</a>

                                <a href="{{ route("backend.$module_name.delete", $backup['file_name']) }}" class="btn btn-danger m-1 btn-sm" data-toggle="tooltip" title="@lang('Delete File')"><i class="fas fa-trash"></i>&nbsp;@lang('Delete')</a>

                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                @else
                <div class="text-center">
                    <h4>{{__('backup.list.index.no_backups')}}</h4>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
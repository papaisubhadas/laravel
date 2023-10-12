@extends ('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                {{ __($module_title) }} {{__('common.sub_title')}}
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_title)]) --}}
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a href='{{ route("backend.$module_name.index") }}' class="btn btn-secondary" data-toggle="tooltip" title="{{ ucwords($module_name) }} List"><i class="fas fa-list"></i> {{__('common.list')}}</a>
            </x-slot>
        </x-backend.section-header>

        <div class="row mt-4">
            <div class="col">
                <table id="datatable" class="table table-bordered table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>
                                {{__('common.id')}}
                            </th>
                            <th>
                                {{__('common.name')}}
                            </th>
                            <th>
                               {{ __('common.updatedat') }}
                            </th>
                            <th>
                               {{ __('common.deletedby') }}
                            </th>
                            <th class="text-end">
                                {{__('common.action')}}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 0 ?>
                        @foreach($$module_name as $module_name_singular)
                        <?php $i++ ?>
                        <tr>
                            <td>
                                {{ $i}}
                            </td>
                            <td>
                                <strong>
                                    {{ $module_name_singular->title }}
                                </strong>
                            </td>
                            <td>
                                {{ $module_name_singular->updated_at->isoFormat('llll') }}
                            </td>
                            <td>
                                {{ $module_name_singular->deleted_by }}
                            </td>
                            <td class="text-end">
                                <a href="{{route("backend.$module_name.restore", $module_name_singular)}}" class="btn btn-warning btn-sm" data-method="PATCH" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('bannerslideshow::labels.backend.restore')}}"><i class='fas fa-undo'></i> {{__('bannerslideshow::labels.backend.restore')}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                   {{ __('common.total') }}{{ $$module_name->total() }} {{ ucwords($module_name) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-end">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('after-scripts-end')

@endsection

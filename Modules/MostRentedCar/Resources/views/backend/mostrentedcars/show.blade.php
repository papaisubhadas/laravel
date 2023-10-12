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

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                {{ __($module_title) }} {{__('common.sub_title')}}
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary" data-toggle="tooltip" title="{{ ucwords($module_name) }} List"><i class="fas fa-list"></i> {{__('common.list')}}</a>
               {{-- @can('edit_'.$module_name)
                <x-buttons.edit route='{!!route("backend.$module_name.edit", $$module_name_singular)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                @endcan--}}
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col-12">

                <p>
                    @lang("Displaing all the values of :module_name", ['module_name'=>ucwords($module_name_singular), 'id'=>$$module_name_singular->id]).
                </p>
                <table class="table table-responsive-sm table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">
                            <strong>
                                {{ __('car.name') }}
                            </strong>
                        </th>
                        <th scope="col">
                            <strong>
                                {{ __('car.value') }}
                            </strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <strong>
                                {{ __('car.most_rented_name') }}
                            </strong>
                        </td>
                        <td>
                            {{ (!empty($$module_name_singular->car()->first()) && $$module_name_singular->car()->first()->translate(App::currentLocale())) ? $$module_name_singular->car()->first()->translate(App::currentLocale())->name : '' }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                {{ __('car.display_order') }}
                            </strong>
                        </td>
                        <td>
                            {{ (!empty($$module_name_singular) && $$module_name_singular->most_rent_car_display_order) ? $$module_name_singular->most_rent_car_display_order : '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                {{-- Lightbox2 Library --}}
                <x-library.lightbox />

            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-end text-muted">
                    {{__('common.updated')}}{{$$module_name_singular->updated_at->diffForHumans()}},
                    {{__('common.created')}} {{$$module_name_singular->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection

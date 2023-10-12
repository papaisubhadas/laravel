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
                {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_title)]) --}}
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary" data-toggle="tooltip" title="{{ ucwords($module_name) }} List"><i class="fas fa-list"></i>  {{ __('common.list') }}</a>
                @can('edit_'.$module_name)
                <x-buttons.edit route='{!!route("backend.$module_name.edit", $$module_name_singular)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                @endcan
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col-12">

                <p>
                    @lang("Displaing all the values of :module_name (Id: :id)", ['module_name'=>ucwords($module_name_singular), 'id'=>$$module_name_singular->id]).
                </p>
                <table class="table table-responsive-sm table-hover table-bordered">
                    <?php
                    $all_columns = $$module_name_singular->getTableColumns();
                    ?>
                    <thead>
                    <tr>
                        <th scope="col">
                            <strong>
                                @lang('Name')
                            </strong>
                        </th>
                        <th scope="col">
                            <strong>
                                @lang('Value')
                            </strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <strong>
                             {{-- Car type --}}
                             {{ __('common.cartype') }}
                            </strong>
                        </td>
                        <td>
                            @php
                                if(!empty($car_details[0]->car) && count($car_details[0]->car->car_has_car_types) > 0) {
                                    $car_type_str = '';
                                    foreach($car_details[0]->car->car_has_car_types as $index=>$car_has_car_type) {
                                        if($index != 0) {
                                            $car_type_str .= ', ';
                                        }
                                        if(!empty($car_has_car_type->car_type)  && $car_has_car_type->car_type!= NULL && $car_has_car_type->car_type->translate(App::currentLocale())) {
                                            $car_type_str .= $car_has_car_type->car_type->translate(App::currentLocale())->title;
                                        }
                                    }
                                }
                            @endphp
                            @if(isset($car_type_str))
                                {{$car_type_str}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                {{-- Car Name --}}
                                {{ __('carinquiry.carinquiries.index.car_name') }}
                            </strong>
                        </td>
                        <td>
                            @if(isset($car_details[0]->car_name))

                                <a target=”_blank” href="{{route('backend.cars.show', show_column_value($$module_name_singular, $all_columns[2]))}}">{{$car_details[0]->car_name}}</a>

                            @endif
                        </td>
                    </tr>
                    @for($i=3 ;$i < sizeof($all_columns) - 6;$i++)
                        <tr>
                            <td>
                                <strong>
                                        {{ __(label_case($all_columns[$i]->Field)) }}
                                </strong>
                            </td>
                            <td>
                                    {!! show_column_value($$module_name_singular, $all_columns[$i]) !!}
                            </td>
                        </tr>
                    @endfor
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
                    {{ __('common.updated') }} {{$$module_name_singular->updated_at->diffForHumans()}},
                    {{ __('common.created') }} {{$$module_name_singular->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection

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
                    @can('edit_'.$module_name)
                        <x-buttons.edit route='{!!route("backend.$module_name.edit", $$module_name_singular)!!}' title="{{__('Edit')}} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
                    @endcan
                </x-slot>
            </x-backend.section-header>

            <hr>

            <div class="row mt-4">
                <div class="col-12 col-sm-6">

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
                                    {{__('deal.deals.show.name')}}
                                </strong>
                            </th>
                            <th scope="col">
                                <strong>
                                    {{__('deal.deals.show.value')}}
                                </strong>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <strong>
                                    {{__('deal.deals.show.deal_type')}}
                                </strong>
                            </td>
                            <td>
                                @if(App::currentLocale() == 'en')
                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->deal_name : '' }}
                                @elseif(App::currentLocale() == 'ar')
                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->deal_name : '' }}
                                @elseif(App::currentLocale() == 'fr')
                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->deal_name : '' }}
                                @elseif(App::currentLocale() == 'ru')
                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->deal_name : '' }}
                                @endif
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>
                                   {{__('deal.deals.show.deal_image')}}
                                </strong>
                            </td>
                            <td>
                                @if(App::currentLocale() == 'en')
                                    <img src="{{ url("frontend/deals/".$$module_name_singular->translate('en')->image) }}" height="150" width="200" />
{{--                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->image : '' }}--}}
                                @elseif(App::currentLocale() == 'ar')
                                    <img src="{{ url("frontend/deals/".$$module_name_singular->translate('ar')->image) }}" height="150" width="200" />

{{--                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->image : '' }}--}}
                                @elseif(App::currentLocale() == 'fr')
                                    <img src="{{ url("frontend/deals/".$$module_name_singular->translate('fr')->image) }}" height="150" width="200" />

{{--                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->image : '' }}--}}
                                @elseif(App::currentLocale() == 'ru')
                                    <img src="{{ url("frontend/deals/".$$module_name_singular->translate('ru')->image) }}" height="150" width="200" />

{{--                                    {{ (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->image : '' }}--}}
                                @endif
                            </td>

                        </tr>
                        @for($i=1 ;$i < sizeof($all_columns) - 6;$i++)
                            <tr>
                                <td>
                                    <strong>

                                        {{ __(label_case($all_columns[$i]->Field)) }}
                                    </strong>
                                </td>
                                <td>

                                    @if($all_columns[$i]->Field == 'image')
                                        @if( !empty($image) && file_exists(public_path("frontend/image/$image")))
                                        <img src="{{ url("frontend/image/$image") }}" height="150" width="200" />
                                        @endif
                                    @elseif($all_columns[$i]->Field == 'feature_image')
                                        <?php
                                        $fea_img =$$module_name_singular->feature_image;
                                        ?>
                                        @if(!empty($fea_img) && file_exists(public_path("frontend/Feature/Deal/$fea_img")))
                                        <img src="{{ url("frontend/Feature/Deal/$fea_img") }}" height="150" width="200" />
                                        @endif
                                    @elseif($all_columns[$i]->Field == 'status')
                                        @if(show_column_value($$module_name_singular, $all_columns[$i]) == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">In Active</span>
                                        @endif
                                    @else
                                        {!! show_column_value($$module_name_singular, $all_columns[$i]) !!}
                                    @endif
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>

                    {{-- Lightbox2 Library --}}
                    <x-library.lightbox />


                </div>
                <div class="col-12 col-sm-6">

                    <div class="text-center">
{{--                        <a href="{{route("frontend.$module_name.show", [encode_id($$module_name_singular->id), $$module_name_singular->slug])}}" class="btn btn-success" target="_blank"><i class="fas fa-link"></i> Public View</a>--}}
                    </div>
                    <hr>

                    <h4>{{__('deal.deals.show.deal_car')}} </h4>
                    <table class="table table-responsive-sm table-hover table-bordered">
                        <tr>
                            <th>{{__('deal.deals.show.car_name')}}</th>
                            <th>{{__('deal.deals.show.deal_amount')}}</th>
                        </tr>

                            @foreach($$module_name_singular->cars as $row)
                            <tr>
                                <td>
                                    <a href="{{route('backend.cars.show', $row->id)}}">{{$row->name}}</a>
                                </td>
                                <td>
                                   {{ $row->pivot->connectedcar_value }}
                                </td>
                        </tr>
                        @endforeach

                    </table>



                    <hr>

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

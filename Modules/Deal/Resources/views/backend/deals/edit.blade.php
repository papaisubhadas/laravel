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
                <x-buttons.show route='{!!route("backend.$module_name.show", $$module_name_singular)!!}' title="{{__('Show')}} {{ ucwords(Str::singular($module_name)) }}" class="ms-1" />
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">
                {{ html()->modelForm($$module_name_singular, 'PATCH', route("backend.$module_name.update", $$module_name_singular))->acceptsFiles()->class('form ajaxifyForm')->open() }}

                @include ("$module_path.$module_name.form")

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {{ html()->submit($text = icon('fas fa-save')." Save")->class('btn btn-success') }}
                        </div>
                    </div>
                    {{ html()->form()->close() }}

                    <div class="col-8">
                        <div class="float-end">
                            @can('delete_'.$module_name)
                            <a href="{{route("backend.$module_name.destroy", $$module_name_singular)}}" class="btn btn-danger" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('deal::labels.backend.delete')}}"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                        </div>
                    </div>
                </div>

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
@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script type="module">
        $(document).ready(function() {
            $('.faq-section').css('display','block');
        });
         //delete block
         $(document).on("click", ".close_btn", function(event){
            event.preventDefault();
            var this_ele = $(this);

            swal({
                    title: '',
                    text: '{{__('car.delete_block_msg')}}',
                    type: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: false,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#ea5455',
                    cancelButtonText: '{{__('car.no')}}',
                    confirmButtonText: '{{__('car.yes')}}',
                },
                function () {

                    if(this_ele.data('exist') == true) {
                        var id = this_ele.data('id');
                        var delete_class = this_ele.data('deleteid');
                        var array_delete_item = [];
                        if($('.'+delete_class).val().length > 0) {
                            array_delete_item.push($('.'+delete_class).val());
                            array_delete_item.push(id);
                            $('.'+delete_class).val(array_delete_item);
                        }
                        else {
                            array_delete_item.push(id);
                            $('.'+delete_class).val(array_delete_item);
                        }
                    }
                    this_ele.parent().parent().remove();

                    swal.close();
                });
        });
        $(".add_car_add_dtl").click(function (ev) {
                ev.preventDefault();
                var i;
                if ($(this).siblings(".car_add_block").find('div').hasClass('car_add_block_in')) {
                    i = $(this).siblings(".car_add_block").find('.car_add_block_in').last().data('fe_en') + 1;
                } else {
                    i = 0;
                }

                var add_item_heml = '<div class="row mb-3 car_add_block_in" data-fe_en = "' + i + '">' +
                    '<div class="col-11 col-sm-11">' +
                    '<div class="row">' +
                    '<div class="col-12 col-sm-6 ">' +
                    '<div class="form-group">' +
                    '<label class="form-label" for="question">{{ __('faq.faq_content.create.question') }}</label><span class="text-danger"></span>' +
                    ' <input class="form-control" type="text" name="' + $(this).data('key') + '_' + $(this).data('locale') + '[' + i + '] " id="question" placeholder="{{ __('faq.faq_content.create.question') }}">' +
                    ' </div>' +
                    '</div>' +
                    '<div class="col-12 col-sm-6">' +
                    '<div class="form-group">' +
                    '<label class="form-label" for="answer">{{ __('faq.faq_content.create.answer') }}</label><span class="text-danger"></span>' +
                    '<input class="form-control" type="text" name="' + $(this).data('value') + '_' + $(this).data('locale') + '[' + i + '] " id="answer" placeholder="{{ __('faq.faq_content.create.answer') }}">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-1 text-center">' +
                    '<br>' +
                    '<i class="nav-icon fa-regular fa fa-times close_btn"></i>' +
                    ' </div>' +
                    '</div>';
                $(this).siblings(".car_add_block").append(add_item_heml);
        });

          
            
    </script>
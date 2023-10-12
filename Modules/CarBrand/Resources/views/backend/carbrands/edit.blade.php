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

                {{ html()->modelForm($$module_name_singular, 'PATCH', route("backend.$module_name.update", $$module_name_singular))->acceptsFiles()->class('form ajaxifyForm')->novalidate("novalidate")->open() }}


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
                            <a id="delete-details" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
<style>
    .note-editor .note-toolbar .note-dropdown-menu, .note-popover .popover-content .note-dropdown-menu{
        min-width: 200px !important;
    }
</style>
{{--script--}}
@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script type="module">
        //ckeditor integration
        /*$(document).ready(function () {
            $('.ckeditor').ckeditor();
        });*/
        $(document).ready(function() {
            $('.content').summernote({
                height: 400,

            });
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
        // but now i replaced it with this code.
        $(document).on("submit", ".ajaxifyForm", function(event){
            $('.error-msg').hide();
            $('.error-msg').text('');
            // $('.submit_button').click(function (event) {

            $("button[type='submit']").prop( "disabled", true);
            $(".formSaving").html('Processing..<i class="fas fa-spin fa-spinner"></i>');
            event.preventDefault();

            var form = $(".ajaxifyForm")[0];
            var formData = new FormData(form);

            // var data = new FormData(this);

            $.ajax({

                url: $(this).attr("action"),
                type:"POST",
                data: formData, //pass the formdata object
                cache: false,
                contentType: false, //tell jquery to avoid some checks
                processData: false,
                dataType: 'json',
                // data:/*data*/$(this).serialize() ,
                success:function(response){
                    if(response.status == 0) {
                        if(response.errors == 'Please Upload Resume in Profile Page Then Apply For Job') {
                            toastr.error(response.errors, 'Response');
                            setTimeout(function(){
                                window.location.href = response.redirect},2600);
                        }
                        else {
                            var errors = response.errors;
                            var errorsHtml= '';

                            $('.error-msg').append('<p><i class="fas fa-exclamation-triangle"></i> Please fix the following errors &amp; try again!    </p><ul>');
                            $.each( errors, function( key, value ) {
                                if(key.includes('.')) {
                                    var key_val = key.split('.');
                                    key = key_val[0]+'_'+key_val[1];
                                };
                                errorsHtml += '<li>' + value + '</li>';
                            });

                            $(window).scrollTop(0);
                            $('.error-msg').append(errorsHtml+'</ul>');
                            $('.error-msg').show();

                            $("button[type='submit']").prop( "disabled", false);
                            $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                        }
                        return;
                    }
                    else{

                        // toastr.success(response.message, '');
                        $('.error-msg').hide();

                        $("button[type='submit']").prop( "disabled", false);
                        $(".formSaving").html('<i class="fas fa-check"></i> save </span>');

                        if (response.data.redirect != undefined) {
                            setTimeout(function () {
                                window.location.href = response.data.redirect
                            }, 2600);
                        }

                    }
                },
                error: function(error) {
                    var errors = error.response.errors;
                    var errorsHtml= '';
                    $.each( errors, function( key, value ) {
                        $('.'+key+'_err').text(value);
                    });
                    $("button[type='submit']").prop( "disabled", false);
                    $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                },
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
    <!-- / Scripts -->


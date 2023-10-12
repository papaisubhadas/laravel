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
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary ms-1" data-toggle="tooltip" title="{{ __($module_title) }} List"><i class="fas fa-list-ul"></i> {{ __('common.list') }}</a>
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">
                {{ html()->form('POST', route("backend.$module_name.store"))->acceptsFiles()->class('form ajaxifyForm')->novalidate("novalidate")->open() }}

                @include ("$module_path.$module_name.form")

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{ html()->button($text = "<i class='fas fa-plus-circle'></i> " . ucfirst($module_action) . "", $type = 'submit')->class('btn btn-success') }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="float-end">
                            <div class="form-group">
                                <x-buttons.cancel></x-buttons.cancel>
                            </div>
                        </div>
                    </div>
                </div>

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">

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
        /*$(document).ready(function () {
            $('.ckeditor').ckeditor();
        });*/
        $(document).ready(function() {
            $('.content').summernote({
                height: 400,

            });
            $('.faq-section').css('display','none');
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
    </script>
<!-- / Scripts -->


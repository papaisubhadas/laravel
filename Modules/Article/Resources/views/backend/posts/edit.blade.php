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

                @include ("article::backend.$module_name.form")

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {{ html()->submit($text = icon('fas fa-save')." Save")->class('btn btn-success') }}
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="float-end">
                            @can('delete_'.$module_name)
                            <a id="delete-details" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            @endcan
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
<script type="module">
$(document).on("submit", ".ajaxifyForm", function(event){
    $('.error-msg').hide();
    $('.error-msg').text('');
    // $('.submit_button').click(function (event) {

    $(".formSaving").html('Processing..<i class="fas fa-spin fa-spinner"></i>');
    event.preventDefault();

    var form = $(".ajaxifyForm")[0];
    var formData = new FormData(form);
    // var data = new FormData(this);

    // console.log('formData ->',formData);
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

                    $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                }
                return;
            }
            else{

                // toastr.success(response.message, '');
                $('.error-msg').hide();

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
            $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
        },
    });

});
</script>

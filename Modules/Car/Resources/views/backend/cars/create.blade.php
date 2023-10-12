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
                <a href="{{ route("backend.$module_name.index") }}" class="btn btn-secondary ms-1" data-toggle="tooltip" title="{{ __($module_title) }} List"><i class="fas fa-list-ul"></i> {{ __('car.list') }} </a>
            </x-slot>
        </x-backend.section-header>

        <hr>

        <div class="row mt-4">
            <div class="col">

                <form class="ajaxifyForm" method="POST" action="{{ route("backend.$module_name.store") }}" enctype="multipart/form-data">
                    @csrf

                @include ("$module_path.$module_name.form")

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{ html()->button($text = "<i class='fas fa-plus-circle'></i> " . ucfirst($module_action) . "", $type = 'submit')->class('btn btn-success submit_button') }}
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="module">
        //ckeditor integration

        $(document).ready(function() {
            $('.content').summernote({
                height: 400,

            });
            $('.faq-section').css('display','none');
        });
        /*$(".dropzone").sortable({
            items:'.dz-preview',
            cursor: 'grab',
            url: "/upload",
            opacity: 0.5,
            containment: '.dropzone',
            distance: 20,
            tolerance: 'pointer',
            stop: function () {
                var queue = myDropzone.getAcceptedFiles();
                newQueue = [];
                $('#imageUpload .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                    var name = el.innerHTML;
                    queue.forEach(function(file) {
                        if (file.name === name) {
                            newQueue.push(file);
                        }
                    });
                });
                myDropzone.files = newQueue;
            }
        });*/
     /*   $(document).ready(function(){
            // $('.sortable').sortable();

           // Dropzone.autoDiscover = false;
           //  $("#file-dropzone").sortable({
           //
           //      change: function (event, ui) {
           //
           //          ui.placeholder.css({visibility: 'visible', border: '1px solid#337ab7' });
           //
           //      }
           //
           //  });
            //alert('hi');
            // instantiate the uploader
            $('#file-dropzone').dropzone({
                url: "/upload",
                maxFilesize: 100,
                // paramName: "uploadfile",
                // maxThumbnailFilesize: 99999,
                // previewsContainer: '.visualizacao',
                addRemoveLinks: true,
                //previewTemplate : $('.preview').html(),
                // init: function() {
                //     this.on('completemultiple', function(file, json) {
                //        // $('.sortable').sortable('enable');
                //     });
                //     this.on('success', function(file, json) {
                //         alert('aa');
                //     });
                //
                //     this.on('addedfile', function(file) {
                //
                //     });
                //
                //     this.on('drop', function(file) {
                //         console.log('File',file)
                //     });
                // },
                success: function (file, response) {
                    var imgName = response;
                    file.previewElement.classList.add("dz-success");
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                }
            });

        });*/

        //DropzoneJS snippet - js



    $(document).ready(function() {});

        //summernote


        // Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (var i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var file = event.target;
                        // $($.parseHTML('<img>')).attr('src', event.target.result).attr('width', '130').attr('class', 'ml10').attr('width', '130').appendTo(imgPreviewPlaceholder);
                        $("<div class=\"pip\"  style=\"float: left;position: relative;\">" +
                            "<img class=\"imageThumb ml10\" src=\"" + event.target.result + "\" title=\"" + file.name + "\" width=\"130\"/>" +
                            "<br/>" +
                            //<span class=\"remove\"  style=\"position: absolute;right: 5px;top: 4px;\"><i class=\"fa fa-window-close\" aria-hidden=\"true\"></i></span>
                            "</div>").insertAfter(imgPreviewPlaceholder);
                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });

                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('.images').on('change', function() {
            $(".pip").remove();
            previewImages(this, 'div.images-preview-div');
        });

        //tab
        $(document).ready(function(){

            $(".tabs_c li a").click(function(e){
                e.preventDefault();
            });

            $(".tabs_c2 li.outer-tab").click(function(){
                var tabid = $(this).find("a").attr("href");
                //$(".tabs_c li,.tabs_c div.tab").removeClass("active");   // removing active class from tab
                $(this).siblings(".tabs_c2 .outer-tab").removeClass("active");
               // $(this).parents(".tabs_c").find("div.tab").css("background-color", "red");
                $(this).parents(".tabs_c2").find("div.outer-tab-cont").removeClass("active");
                //$(this).parents(".tabs_c").find(".tab").hide();   // hiding open tab
                $(tabid).addClass('active');
                //$(tabid).show();    // show tab
                $(this).addClass("active"); //  adding active class to clicked tab

            });

            $(".tabs_c1 li.inner-tab").click(function(){
                var tabid = $(this).find("a").attr("href");
                //$(".tabs_c li,.tabs_c div.tab").removeClass("active");   // removing active class from tab
                $(this).siblings(".tabs_c1 .inner-tab").removeClass("active");
                // $(this).parents(".tabs_c").find("div.tab").css("background-color", "red");
                $(this).parents(".tabs_c1").find("div.inner-tab-cont").removeClass("active");
                //$(this).parents(".tabs_c").find(".tab").hide();   // hiding open tab
                $(tabid).addClass('active');
                //$(tabid).show();    // show tab
                $(this).addClass("active"); //  adding active class to clicked tab

            });

        });

        //add feature block
        $(".add_feature").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".feature_block").find('div').hasClass('feature_block_in')){
                i = $(this).siblings(".feature_block").find('.feature_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3  feature_block_in" data-fe_en = "'+i+'">' +
                '<div class="col-11 col-sm-11 ">';

                if($(this).data('locale') == 'en') {
                    add_item_heml += '<div class="row">'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group">'+
                    '<label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>'+
                    ' <input class="form-control" value ="" type="text" name="'+ $(this).data('icon')+ '[' + i + ']" id="feature_title" placeholder="{{ __('car.icon_html') }}">'+
                    ' </div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group">'+
                    '<label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>'+
                    '<input class="form-control" value ="" type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + ']" id="feature_title" placeholder="{{ __('car.feature_title') }}">'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                }
                else {
                    add_item_heml += '<div class="form-group">'+
                    '<label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>'+
                    '<input class="form-control"= type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + ']" id="feature_title" placeholder="{{ __('car.feature_title') }}">'+
                '</div>';
                }

                add_item_heml += '</div>'+
                '<div class="col-1 text-center">'+
            '<br>'+
            '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
            '</div>'+
        '</div>';
            $(this).siblings(".feature_block").append(add_item_heml);
        });

        //add service block
        $(".add_service").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".service_block").find('div').hasClass('service_block_in')){
                i = $(this).siblings(".service_block").find('.service_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3  service_block_in" data-fe_en = "'+i+'">' +
                                    '<div class="col-11 col-sm-11">'+
                                    '<div class="form-group">'+
                                        '<label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>'+
                                        '<input class="form-control" type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + '] " id="service_title" placeholder="{{ __('car.service_title') }}">'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-1 text-center">'+
                                '<br>'+
                                '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
                                '</div>'+
                            '</div>';
            $(this).siblings(".service_block").append(add_item_heml);
        });

        //add rent block
        $(".add_rent_dtl").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".rent_detail_block").find('div').hasClass('rent_dtl_block_in')){
                i = $(this).siblings(".rent_detail_block").find('.rent_dtl_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3 rent_dtl_block_in" data-fe_en = "'+i+'">' +
                '<div class="col-11 col-sm-11 ">'+
                    '<div class="form-group">'+
                    '<label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>'+
                    '<input class="form-control" type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + '] " id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">'+
                '</div>'+
                '</div>'+
                '<div class="col-1 text-center">'+
                '<br>'+
                '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
                '</div>'+
            '</div>';
            $(this).siblings(".rent_detail_block").append(add_item_heml);
        });

        //add car specification block
        $(".add_car_spec_dtl").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".car_spec_block").find('div').hasClass('car_spec_block_in')){
                i = $(this).siblings(".car_spec_block").find('.car_spec_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3 car_spec_block_in" data-fe_en = "'+i+'">' +
                '<div class="col-11 col-sm-11 ">';

                if($(this).data('locale') == 'en') {
                    add_item_heml +=  '<div class="row">'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group">'+
                    '<label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>'+
                    '<input class="form-control" value ="" type="text" name="'+ $(this).data('icon')+ '[' + i + ']" id="feature_title" placeholder="{{ __('car.icon_html') }}">'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group">'+
                    '<label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>'+
                    '<input class="form-control" type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + '] " id="specification_title" placeholder="{{ __('car.specification_title') }}">'+
                    '</div>'+
                    '</div>'+
                    '</div>';
                }
                else{
                    add_item_heml += '<div class="form-group">'+
                        '<label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>'+
                        '<input class="form-control" type="text" name="'+ $(this).data('name') + '_' + $(this).data('locale') + '[' + i + '] " id="specification_title" placeholder="{{ __('car.specification_title') }}">'+
                    '</div>';
                }


                add_item_heml += '</div>'+
                '<div class="col-1 text-center">'+
                '<br>'+
                '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
                '</div>'+
            '</div>';
            $(this).siblings(".car_spec_block").append(add_item_heml);
        });

        //add car additional detail block
        $(".add_car_add_dtl").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".car_add_block").find('div').hasClass('car_add_block_in')){
                i = $(this).siblings(".car_add_block").find('.car_add_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3 car_add_block_in" data-fe_en = "'+i+'">'+
            '<div class="col-11 col-sm-11">'+
            '<div class="row">'+
            '<div class="col-12 col-sm-6 ">'+
            '<div class="form-group">'+
            '<label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>'+
            ' <input class="form-control" type="text" name="'+ $(this).data('key') + '_' + $(this).data('locale') + '[' + i + '] " id="key" placeholder="{{ __('car.key') }}">'+
            ' </div>'+
            '</div>'+
            '<div class="col-12 col-sm-6">'+
            '<div class="form-group">'+
            '<label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>'+
            '<input class="form-control" type="text" name="'+ $(this).data('value') + '_' + $(this).data('locale') + '[' + i + '] " id="value" placeholder="{{ __('car.value') }}">'+
            '</div>'+
            '</div>'+
            '</div>'+
            ' </div>'+
            '<div class="col-1 text-center">'+
            '<br>'+
            '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
                ' </div>'+
            '</div>';
            $(this).siblings(".car_add_block").append(add_item_heml);
        });

        //add car rental include block
        $(".add_car_rent_in_dtl").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".car_rent_in_block").find('div').hasClass('car_rent_in_block_in')){
                i = $(this).siblings(".car_rent_in_block").find('.car_rent_in_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3 car_rent_in_block_in" data-fe_en = "'+i+'">'+
            '<div class="col-11 col-sm-11">'+
            '<div class="row">'+
            '<div class="col-12 col-sm-6 ">'+
            ' <div class="form-group">'+
            ' <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>'+
            '<input class="form-control" type="text" name="'+ $(this).data('key') + '_' + $(this).data('locale') + '[' + i + '] " id="key" placeholder="{{ __('car.key') }}">'+
                '</div>'+
            '</div>'+
            '<div class="col-12 col-sm-6 " >'+
            '<div class="form-group">'+
            '<label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>'+
            '<input class="form-control" type="text" name="'+ $(this).data('value') + '_' + $(this).data('locale') + '[' + i + '] " id="value" placeholder="{{ __('car.value') }}">'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<div class="col-1 text-center">'+
            '<br>'+
            '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
            '</div>'+
            '</div>';
            $(this).siblings(".car_rent_in_block").append(add_item_heml);
        });

        //add car rental requirement block
        $(".add_car_rent_req_in_dtl").click(function(ev) {
            ev.preventDefault();
            var i;
            if ($(this).siblings(".car_ren_req_in_block").find('div').hasClass('car_ren_req_in_block_in')){
                i = $(this).siblings(".car_ren_req_in_block").find('.car_ren_req_in_block_in').last().data('fe_en') + 1;
            }
            else {
                i = 0;
            }

            var add_item_heml = '<div class="row mb-3  car_ren_req_in_block_in" data-fe_en = "'+i+'">'+
            '<div class="col-11 col-sm-11">'+
            '<div class="row">'+
            ' <div class="col-12 col-sm-6 ">'+
            ' <div class="form-group">'+
            '  <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>'+
            ' <input class="form-control" type="text" name="'+ $(this).data('key') + '_' + $(this).data('locale') + '[' + i + '] " id="key" placeholder="{{ __('car.key') }}">'+
            ' </div>'+
            '</div>'+
            '<div class="col-12 col-sm-6 ">'+
            '<div class="form-group">'+
            ' <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>'+
            ' <input class="form-control" type="text" name="'+ $(this).data('value') + '_' + $(this).data('locale') + '[' + i + '] " id="value" placeholder="{{ __('car.value') }}">'+
            '</div>'+
            ' </div>'+
            ' </div>'+
            '</div>'+
            '<div class="col-1 text-center">'+
            '  <br>'+
            '<i class="nav-icon fa-regular fa fa-times close_btn"></i>'+
            '</div>'+
            '</div>';
            $(this).siblings(".car_ren_req_in_block").append(add_item_heml);
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
                    this_ele.parent().parent().remove();
                    swal.close();
                });
        });
        // but now i replaced it with this code.
          $(document).on("submit", ".ajaxifyForm", function(event){
              $('.error-msg').hide();
              $('.error-msg').text('');
       // $('.submit_button').click(function (event) {

            //$("button[type='submit']").html('Processing..<i class="fas fa-spin fa-spinner"></i>');
            $("button[type='submit']").prop( "disabled", true);
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
                            //$("button[type='submit']").html('<i class="fas fa-plus-circle"></i> Create</span>');
                        }
                        return;
                    }
                    else{

                       // toastr.success(response.message, '');
                        $('.error-msg').hide();

                        $("button[type='submit']").prop( "disabled", false);
                        //$("button[type='submit']").html('<i class="fas fa-plus-circle"></i> Create </span>');

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
                  //  $("button[type='submit']").html('<i class="fas fa-plus-circle"></i> Create </span>');
                },
            });

        });

    </script>
    <!-- / Scripts -->

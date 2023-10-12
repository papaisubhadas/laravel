<style>
    .ml10 {
        margin-left: 10px;
    }
    .tabs_c{
        width:100%;
        height:auto;
        margin:0 auto;
    }

    /* tab list item */
    .tabs_c .tabs_c-list{
        list-style:none;
        margin:0px;
        padding:0px;
    }
    .tabs_c .tabs_c-list li{
        width:auto;
        float:left;
        margin:0px;
        margin-right:2px;
        padding:10px 20px;
        text-align: center;
        /*background-color: #aaa;*/
        border-radius:3px;
    }
    .tabs_c .tabs_c-list li{
        color: #000 !important;
        background-color: transparent !important;
        border-bottom: 1px solid #ccc !important;
    }
    .tabs_c .tabs_c-list li.active{
        color: #fff !important;
        /*background-color: #aaa !important;*/
        border-radius:3px;
        border: 1px solid #ccc !important;
        border-bottom: none !important;
    }
    .tabs_c .tabs_c-list li:hover{
        cursor:pointer;
    }
    .tabs_c .tabs_c-list li a{
        text-decoration: none;
        color:#000;
    }
    .tabs_c .tabs_c-list li.active a{
        color:white;
    }

    /* Tab content section */
    .tabs_c .tab{
        display:none;
        width:96%;
        height:auto;
        border-radius:3px;
        background-color:#fff;
        /*color:darkslategray;*/
        clear:both;
    }
    .tabs_c .tab h3{
        border-bottom:3px solid cornflowerblue;
        letter-spacing:1px;
        font-weight:normal;
        padding:5px;
    }
    .tabs_c .tab p{
        line-height:20px;
        letter-spacing: 1px;
    }

    /* When active state */
    .tabs_c .active{
        display:block !important;
    }
    .tabs_c .tabs-list li.active{
        background-color:lavender !important;
        color:black !important;
    }
    .tabs_c .active a{
        color:black !important;
    }
    .close_btn {
        font-size: 20px;
        font-weight: bold;
    }

    /* media query */
    @media screen and (max-width:360px){
        .tabs_c{
            margin:0;
            width:96%;
        }
        .tabs_c .tabs_c-list li{
            width:80px;
        }
    }
</style>

{{--New Design--}}

<div class="row mb-3">
    <p><strong> {{__('banner.note')}}</strong> {{__('banner.you_must_enter')}} <strong>{{__('banner.title')}}</strong> {{__('banner.and')}} <strong>{{__('banner.sub_title')}}</strong> {{__('banner.end_txt')}}</p>
    <div class="tabs_c tabs_c1">
        <ul class="tabs_c-list">
            <li class="active"><a href="#general_en">EN</a></li>
            <li class=""><a href="#general_ar">AR</a></li>
            <li class=""><a href="#general_fr">FR</a></li>
            <li class=""><a href="#general_ru">RU</a></li>
        </ul>
        @php

            $title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->title : '';
            $title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->title : '';
            $title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->title : '';
            $title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->title : '';

            $sub_title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->sub_title : '';
            $sub_title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->sub_title : '';
            $sub_title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->sub_title : '';
            $sub_title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->sub_title : '';

        @endphp
        <div id="general_en" class="tab active">
            <br/>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'title_en';
                        $field_lable = __('banner.slide.create.title');
                        $field_placeholder = __('banner.slide.create.title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($title_en) }}
                        @if ($errors->has('title_en'))
                            <span class="text-danger">{{ $errors->first('title_en') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'sub_title_en';
                        $field_lable = __('banner.slide.create.sub_title');
                        $field_placeholder = __('banner.slide.create.sub_title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($sub_title_en) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'status';
                        $field_lable =__('banner.slide.create.status');
                        $field_placeholder = "-- Select an option --";
                        $required = "required";
                        $select_options = [
                            'active'=>'Active',
                            'inactive'=>'In Active'
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        @if(isset($image) || !empty($image))
                            <img src="{{ url("frontend/sliders/$image") }}" height="150" width="200" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'image';
                        $field_lable = __('banner.slide.create.banner_image');
                        $field_placeholder = $field_lable;
                        $required = (isset($image) || !empty($image)) ? "":"required";
                        ?>
                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        <input id="image" name="image" multiple="" type="file" class="form-control" placeholder="Choose Image">

                    </div>
                </div>
            </div>


        </div>
        <div id="general_ar" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'title_ar';
                        $field_lable = __('banner.slide.create.title');
                        $field_placeholder = __('banner.slide.create.title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($title_ar) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'sub_title_ar';
                        $field_lable = __('banner.slide.create.sub_title');
                        $field_placeholder = __('banner.slide.create.sub_title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($sub_title_ar) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">

                </div>
            </div>


        </div>
        <div id="general_fr" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'title_fr';
                        $field_lable = __('banner.slide.create.title');
                        $field_placeholder = __('banner.slide.create.title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($title_fr) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'sub_title_fr';
                        $field_lable = __('banner.slide.create.sub_title');
                        $field_placeholder = __('banner.slide.create.sub_title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($sub_title_fr) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">

                </div>
            </div>

        </div>
        <div id="general_ru" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'title_ru';
                        $field_lable = __('banner.slide.create.title');
                        $field_placeholder = __('banner.slide.create.title');
                        $required = "required";
                        ?>
                        {{ html()->label( $field_lable,  $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($title_ru) }}

                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'sub_title_ru';
                        $field_lable = __('banner.slide.create.sub_title');
                        $field_placeholder = __('banner.slide.create.sub_title');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($sub_title_ru) }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">

                </div>
            </div>

        </div>
    </div>
</div>

<x-library.select2 />
<script type="module">

    //tab
    $(document).ready(function(){

        $(".tabs_c li a").click(function(e){
            e.preventDefault();
        });

        $(".tabs_c1 ul li").click(function(){

            var tabid = $(this).find("a").attr("href");
            //$(".tabs_c li,.tabs_c div.tab").removeClass("active");   // removing active class from tab
            $(this).siblings(".tabs_c1 li").removeClass("active");
            // $(this).parents(".tabs_c").find("div.tab").css("background-color", "red");
            $(this).parents(".tabs_c1").find("div.tab").removeClass("active");
            //$(this).parents(".tabs_c").find(".tab").hide();   // hiding open tab
            $(tabid).addClass('active');
            //$(tabid).show();    // show tab
            $(this).addClass("active"); //  adding active class to clicked tab

        });

    });

    $(document).on("submit", ".ajaxifyForm", function(event){
        $('.error-msg').hide();
        $('.error-msg').text('');
        // $('.submit_button').click(function (event) {

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@if(isset($bannerslideshow))
<script>
    $(document).ready(function () {
        $(document).on("click", "#delete-details", function() {
            swal({
                title: '',
                text: '{{ __('banner.delete_permanently') }}',
                type: 'warning',
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: false,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#ea5455',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
            },
            function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var id ="{{$$module_name_singular->id}}";
                    $.ajax({
                        type: "post",
                        url: "{{ route('backend.bannerslideshows.delete_details',$$module_name_singular->id) }}",
                        success: function (response) {
                            swal.close();
                            window.location.href = response.redirect_url;
                        },
                        error: function(res){
                            console.log(res);
                        }
                    });
            });
        });
    });
</script>
@endif


@extends('frontend.layouts.app')

@section('title', 'Friends Car Rental - ' . __('Contact Us'))

@section('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: none;
        }
        .car_facilities img, .car_facilities i {

            width: 24px;
        }
        .success-message {
            margin-top: 23px;
            background-color: #008000!important;
            padding: 13px 40px;
            color: #fff !important;
            font-size: 16px;
            border-radius: 6px;
        }
        .loader {
            /*position:fixed;*/
            position: relative;
            width: 100%;
            height: 35px;
            width:100%;
            left:0;right:0;top:0;bottom:0;
            background-color: rgba(255,255,255,0.7);
            z-index:9999;
            display:none;
        }
        @-webkit-keyframes spin {
            from {-webkit-transform:rotate(0deg);}
            to {-webkit-transform:rotate(360deg);}
        }
        @keyframes spin {
            from {transform:rotate(0deg);}
            to {transform:rotate(360deg);}
        }
        .loader::after {
            content:'';
            display:block;
            position:absolute;
            left:48%;top:40%;
            width:40px;height:40px;
            border-style:solid;
            border-color:black;
            border-top-color:transparent;
            border-width: 4px;
            border-radius:50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
    </style>
@stop

@section('content')
    @php
        if(session()->exists('settings_contact'))
        {
            $settings_contact = session()->get('settings_contact');
        }
    @endphp
    <div class="color_hr"></div>
    <section class="container">
        <nav class="pt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            {{ Breadcrumbs::render('contact_us') }}
        </nav>
    </section>
    <section class="company_contact_us">
    <div class="contact_us">
        <div class="container">
            <h1 class="main_title">{{ __('text.contactus') }}</h1>
            <div class="contact_info_detail">
                @if(isset($settings_contact['address']))
                <div class="contact_txt">
                    <i class="fa-solid fa-location-dot contact_icon"></i>
                    <p>{{$settings_contact['address']->val}}</p>
                </div>
                @endif
                @if(isset($settings_contact['phone_no']))
                <div class="contact_txt">
                    <i class="fa-solid fa-phone contact_icon"></i>
                    <p>{{$settings_contact['phone_no']}}</p>
                </div>
               @endif
               @if(isset($settings_contact['email']))
                <div class="contact_txt">
                    <i class="fa-solid fa-envelope contact_icon"></i>
                    <p>{{$settings_contact['email']}}</p>
                </div>
                @endif
                <div class="contact_txt">
                    <i class="fa-solid fa-message contact_icon"></i>
                    <p>Open 24 hours</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="contact_map">
                @if(isset($settings_contact['embeded_map_url']))
                <iframe class="b_radius map_fix" src="{{isset($settings_contact['embeded_map_url']) ? $settings_contact['embeded_map_url'] : ''}}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
                <div class="get_in_touch">
                    <div class="contact_form">
                        <h1>{{ __('text.getintouch') }}</h1>
                        <form  class="contactajaxifyForm" method="POST" action="{{ route('frontend.contact_now') }}">
                            @csrf
                            <div class="error">
                                <input type="name" name="customer_name" placeholder="{{ __('text.name') }}">
                                <span class="text-danger error-text customer_name_err"></span>
                                <br>
                            </div>
                            <div class="error">
                                <input type="tel" name="customer_phone_no" placeholder="{{ __('text.phone') }}" maxlength="20">
                                <span class="text-danger error-text customer_phone_no_err"></span>
                            </div>
                            <div class="error">
                                <input type="email" name="customer_email" placeholder="{{ __('text.email') }}">
                                <span class="text-danger error-text customer_email_err"></span>
                            </div>
                            <div class="error">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="{{ __('text.sendmessage') }}" ></textarea>
                            </div>
                            <button class="gold_btn contact_btn" type="submit"> {{ __('text.sendmessage') }} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
    <script>
        //get country code in hidden input
        $('.phonecode-dropdown').click(function (){
            $('#phone_country_code').val($(this).data('code'));
            $('.active_country').attr('src', $(this).data('image'));
        });
        $('.phonecode-dropdown-in').click(function (){
            $('#phone_country_code_in').val($(this).data('code'));
            $('.active_country_d').attr('src', $(this).data('image'));
            $('#phone_code_spn').text($(this).data('code'));
        });

        $('.car_type_id_input').click(function (){
            $('#car_type_id').val($(this).data('id'));
            $('.car-type').text($(this).data('title'));
        });

        $(document).on("submit", ".contactajaxifyForm", function(event){

            var currentForm = $(this);
            $(".formSaving").html('{{__('text.processing')}}<i class="fas fa-spin fa-spinner"></i>');
            event.preventDefault();

            $('.contact_btn').text('{{__('text.processing')}}');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: $(this).attr("action"),
                type:"POST",
                dataType: 'json',
                /*     contentType: false,*/
                data:$(this).serialize() ,
                success:function(response){
                    if(response.status == 0) {
                        if(typeof response.slug !== 'undefined' && response.slug == 'order')
                        {
                            toastr.error(response.errors, 'Response');
                        }
                        else {
                            var errors = response.errors;
                            var errorsHtml= '';
                            $(currentForm).find(".error-text").text("");
                            $.each( errors, function( key, value ) {
                                $('.'+key+'_err').text('');
                                if(key.includes('.')) {
                                    var key_val = key.split('.');
                                    key = key_val[0]+'_'+key_val[1];
                                };
                                $('.'+key+'_err').text(value);

                            });

                            $('.contact_btn').text('{{ __('text.sendmessage') }}');
                            $('.company_contact_us .contact_us .get_in_touch .contact_form form input').attr('style','margin-bottom: 0px !important');
                            $('.error').attr('style','margin-bottom: 12px !important');


                            $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                        }
                        return;
                    }
                    else{
                        Swal.fire({
                            title: "<strong>{{__('frontend.home.index.thank_you')}}</strong>",
                            text: "{{__('frontend.home.index.call_back')}}",
                            imageUrl: "{{asset('frontend/image/check_image.png')}}",
                            imageHeight:100,
                            imageWidth:100,
                            confirmButtonText: "{{__('frontend.home.index.ok')}}",
                        });

                        $('.submit_btn').text('{{__('text.contact_success')}}');

                        setTimeout(function(){
                            window.location.href = response.data.redirect},2600);

                    }
                },
                error: function(error) {
                    $(currentForm).find(".error-text").hide();
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
@stop


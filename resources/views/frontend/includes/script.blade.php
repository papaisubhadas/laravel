
<link rel="preload" href="{{ asset('frontend/js/jquery.js') }}" as="script">
<script src="{{ asset('frontend/js/jquery.js') }}" as="script"></script>

<script>
    jQuery.event.special.touchstart = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.touchmove = {
        setup: function( _, ns, handle ) {
            this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
        }
    };
    jQuery.event.special.wheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("wheel", handle, { passive: true });
        }
    };
    jQuery.event.special.mousewheel = {
        setup: function( _, ns, handle ){
            this.addEventListener("mousewheel", handle, { passive: true });
        }
    };
</script>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js" as="script">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js" as="script">

<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js" as="script"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js" as="script"></script>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" as="script">
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" as="script">

<script src='https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js' as="script"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js' as="script"></script>

<!-- owl carousel -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" as="script">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"  as="script"></script>

<!-- flatpickr -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js" as="script">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js" as="script"></script>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" as="script">
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" as="script"></script>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js" as="script">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js" as="script"></script>

<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" as="script">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" as="script"></script>

<link rel="preload" href="https://unpkg.com/infinite-scroll@4.0.1/dist/infinite-scroll.pkgd.min.js" as="script">
<script src="https://unpkg.com/infinite-scroll@4.0.1/dist/infinite-scroll.pkgd.min.js" as="script"></script>

<link rel="preload" href="{{ asset('frontend/js/xzoom.min.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/back-to-top.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/foundation.min.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/custom.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/jquery.hammer.min.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/magnific-popup.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/modernizr.js') }}" as="script">
<link rel="preload" href="{{ asset('frontend/js/setup.js') }}" as="script">


<script src="{{ asset('frontend/js/xzoom.min.js') }}" as="script" async></script>
<script src="{{ asset('frontend/js/back-to-top.js') }}" as="script" async></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" as="script" async></script>
<script src="{{ asset('frontend/js/foundation.min.js') }}" async></script>
<script src="{{ asset('frontend/js/custom.js') }}" as="script"></script>
<script src="{{ asset('frontend/js/jquery.hammer.min.js') }}" async></script>
<script src="{{ asset('frontend/js/magnific-popup.js') }}" async></script>
<script src="{{ asset('frontend/js/modernizr.js') }}" async></script>
<script src="{{ asset('frontend/js/setup.js') }}" async></script>

<link rel="preload" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js" async as="script">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js" as="script" async></script>

<link rel="preload" href="https://unpkg.com/default-passive-events" async as="script">
<script  as="script" src="https://unpkg.com/default-passive-events" async></script>


<script>

    $(document).on("submit", ".ajaxifyForm", function(event) {

        var currentForm = $(this);
        $(".formSaving").html('{{ __('text.processing') }}<i class="fas fa-spin fa-spinner"></i>');
        event.preventDefault();

        $('.submit_btn').text('{{ __('text.processing') }}');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            dataType: 'json',
            /*     contentType: false,*/
            data: $(this).serialize(),
            success: function(response) {
                if (response.status == 0) {
                    if (typeof response.slug !== 'undefined' && response.slug == 'order') {
                        toastr.error(response.errors, 'Response');
                    } else {
                        var errors = response.errors;
                        var errorsHtml = '';
                        $(currentForm).find(".error-text").text("");
                        $.each(errors, function(key, value) {
                            $('.' + key + '_err').text('');
                            if (key.includes('.')) {
                                var key_val = key.split('.');
                                key = key_val[0] + '_' + key_val[1];
                            };
                            //errorsHtml += '<li>' + value + '</li>';
                            $('.' + key + '_err').text(value);
                        });

                        $('.submit_btn').text('{{ __('text.send_enquiry') }}');
                        $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                    }
                    return;
                } else {
                    Swal.fire({
                        title: "<strong>{{ __('frontend.home.index.thank_you') }}</strong>",
                        text: "{{ __('frontend.home.index.call_back') }}",
                        imageUrl: "{{ asset('frontend/image/check_image.png') }}",
                        confirmButtonText: "{{ __('frontend.home.index.ok') }}",
                        imageHeight: 100,
                        imageWidth: 100
                    });
                    $('.car_inq_modal').modal('toggle');
                    $('.submit_btn').text('{{__('text.send_enquiry')}}');

                    // setTimeout(function(){
                    //     window.location.href = response.data.redirect},2600);

                }
            },
            error: function(error) {
                $(currentForm).find(".error-text").hide();
                var errors = error.response.errors;
                var errorsHtml = '';
                $.each(errors, function(key, value) {
                    $('.' + key + '_err').text(value);
                });
                $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
            },
        });

    });

    //get country code in hidden input
    $('body').on('click','.phonecode-dropdown', function (){
        $('#phone_country_code').val($(this).data('code'));
        $('.active_country').attr('src', $(this).data('image'));
    });
    $('body').on('click','.phonecode-dropdown-in',function (){
        $('#phone_country_code_in').val($(this).data('code'));
        $('.active_country_d').attr('src', $(this).data('image'));
        $('#phone_code_spn').text($(this).data('code'));
    });
    $('body').on('click','.iti__country',function (){
        $('#phone').val('+' + $(this).data('dial-code') + ' ');
    });
    $('body').on('click','.car_type_id_input',function (){
        $('#car_type_id').val($(this).data('id'));
        $('.car-type').text($(this).data('title'));
    });

    //car data get and display in model and modal open
    $(document).on("click", ".msg_send", function(event){
        var locale = $('html').attr('lang');
        event.preventDefault();

        var id = $(this).data('id');
        var url = '{!! url('/') !!}' + '/' + locale + '/car-detail/' + id ;
        //get data
        $.get(url, function (data) {
            $('#message_send .modal-content').html(data.view);

            $('.ajaxifyForm').trigger("reset");
            $('.error-text').text('');

            $('#phone_country_code_in').val(data.data['dubai_phone_codes'].phonecode);
            let active_country_d = 'vendor/blade-flags/country-'+data.data['dubai_phone_codes'].iso+'.svg';
            $('.active_country_d').attr('src', '{{ asset('+active_country_d+') }}');
            $('#phone_code_spn').text(data.data['dubai_phone_codes'].phonecode);
            $("#message_send #car_rent_detail").text('');

            if(data.data['image'] != '') {
                $("#message_send #car_image").attr('src', $("#message_send #car_image").data('path') + '/' + data.data['image'])
            }
            if(data.data['name'] != '') {
                $("#message_send #car_title").text(data.data['name'])
            }
            $("#message_send #inquiry_id").val(data.data['id'])
            if(data.data['car_rent_details'].length != undefined) {
                $.each( data.data['car_rent_details'], function( key, value ) {
                    $("#message_send #car_rent_detail").append('<li> <i class="fa-solid fa-circle-check rigth_icon"></i>' + value + '</li>');
                });
            }

            var input = document.querySelector("#phone");
            if (input != null) {
                var intl = window.intlTelInput(input, ({
                    initialCountry: "ae",
                    //         nationalMode  :true
                }));
            }

            $(".start_booking_date").datepicker({
                minDate: new Date(),
                dateFormat: 'dd/M/yyyy',
                format: 'h:i A',
                // step:60

            });

            $(".end_booking_date").datepicker({
                minDate: new Date(),
                dateFormat: 'dd/M/yyyy',
                format: 'h:i A',
            });

            $('#message_send').modal('show');
        })
    });

    $("img.lazy").lazyload({data_attribute: "original"});
    $('body').mouseover(function() {
        $("img.lazy").lazyload({data_attribute: "original"});
    });
    $('.dropbtn').click(function() {
        $("img.lazy").lazyload({data_attribute: "original"});
    });

    //CAR BRAND IN MENU LAZY IMAGE CODE IN DIFFERENT WAY
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazyload");
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.src = image.dataset.original;
                        image.classList.remove("lazyload");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazyload");

            function lazyload () {
                if(lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function(img) {
                        if(img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazyload');
                        }
                    });
                    if(lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    })

</script>
@yield('scripts')
<x-google-analytics config="{{$google_analytics}}" />

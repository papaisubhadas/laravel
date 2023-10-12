@extends('frontend.layouts.app')
@section('title', $meta_title)
@section('meta_title', (isset($car_type) && isset($car_type->meta_title))  ? $car_type->meta_title : '')
@section('meta_keywords', (isset($car_type) && isset($car_type->meta_keyword))  ? $car_type->meta_keyword : '')
@section('meta_description', (isset($car_type) && isset($car_type->meta_description))  ? $car_type->meta_description : '')
@section('metadata')
    @if(file_exists(public_path("frontend/Feature/CarType/".$car_type->feature_image)) && !empty($car_type->feature_image))
        <meta property="og:image" content="{{  url('frontend/Feature/CarType/'.$car_type->feature_image) }}" />
        <meta name="twitter:image" content="{{  url('frontend/Feature/CarType/'.$car_type->feature_image) }}" />
    @endif
@endsection

@section('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: none;
        }
        .car_facilities img, .car_facilities i {
            width: 24px;
        }
    </style>
@stop

@section('content')
    <div class="color_hr"></div>

    <div class="container my-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            @if(!empty($car_type))
                {{ Breadcrumbs::render('car_type_detail',array('title' => $car_type->title, 'slug' => $car_type->slug)) }}
            @else
                {{ Breadcrumbs::render('car_type') }}
            @endif
        </nav>
    </div>

    <span>{{ (!empty(car_type_schema($car_type,'b')) ? '' : '') }}<span>

    <section class="free_delivery">
        <div class="container">
            <div class="car_delivery">
                <div class="free_delivery_txt">
                    @if(isset($cars) && !empty($cars) && !$cars->isEmpty())
                        <h1>{{(isset($car_type) && $car_type->translation->custom_title)  ? $car_type->custom_title : ''}}</h1>
                    @else
                        <h1>No cars available in : {{$car_type->title}}</h1>
                    @endif
                    {{--                        <p>{{$car_type->description}}</p>--}}
                </div>
                <!-- <div class="car_list_show">
                    <p>Showing 1 - 20 of 720 cars</p>
                </div> -->
            </div>
        </div>
    </section>


    <section class="most_rent_car_list recommended_car">
        <div class="container">
            {{--            <h1 class="main_title">Special Offer</h1>--}}
            <div class="row">
                @if(isset($cars) && !empty($cars))
                    @php
                        $get_locale_whatsapp_number = get_locale_whatsapp_number();
                        $get_locale_contact_number = get_locale_contact_number();
                    @endphp
                    @foreach($cars as $index => $car)
                        {{-- && in_array($car->id, $most_rented_arr)--}}
                        {{-- @if($index <= 20)--}}
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="most_rent_car">
                                <div class="rent_car_img">
                                    <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}">
                                        @php
                                            $car_offers_var = $car->car_offers;
                                            // $today = date('Y-m-d');
                                            // $flag = false;
                                            // if(count($car_offers_var) > 0) {
                                            //     foreach ($car_offers_var  as $car_offer) {
                                            //         $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active')->count();
                                            //         if(!empty($car_offer_data)) {
                                            //             $flag = true;
                                            //         }
                                            //     }
                                            // }
                                        @endphp
                                        @php
                                            if($car->car_images_first) {
                                                $car_image_first = $car->car_images_first;
                                                if(!empty($car_image_first)&& !empty($car_image_first->image)){
                                                    if(file_exists(public_path().'/frontend/image/'.$car_image_first->image)){
                                                        $image_exist=1;
                                                    }
                                               }
                                            }
                                        @endphp
                                        @if(!empty($image_exist))
                                            <div class="car_rental_img">
                                        <img class="img-fluid" src="{{ asset('frontend/image/'.$car_image_first->image) }}" alt="{{ $car->title }}">
                                          @if(isset($car->deals) && count($car->deals) > 0)
                                                    <img class="img-fluid special_offer" src="{{ asset('frontend/image/special_offer_tag.png') }}" alt="">
                                                @endif
                                        </div>
                                            <p class="delivery_txt">{{ __('text.free_delivery') }}</p>
                                        @endif
                                    </a>
                                </div>
                                <div class="most_rent_car_details">
                                    <div class="car_full_details">
                                        <div class="brand_name">
                                            @php
                                                $car_brand_image = (!empty($car->car_brand)) ?$car->car_brand->image : '';
                                            @endphp
                                            <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}" class="text-decoration-none urus_fix"><h4>{{ $car->translation->name ?? '' }}</h4></a>
                                            @if(file_exists(public_path().'/frontend/image/'. $car_brand_image))
                                                <img class="img-fluid" src="{{ asset('frontend/image/'. $car_brand_image) }}" alt="">
                                            @endif
                                        </div>
                                        <div class="rent_counts">
                                            @php
                                                if(!empty($car_offers_var)) {
                                                    $daily_price = floor($car->daily_price);
                                                    $monthly_price = floor($car->monthly_price);
                                                    $weekly_price = floor($car->weekly_price);
                                                    $total_discount_price_daily = 0;
                                                    $total_discount_price_monthly = 0;
                                                    $total_discount_price_weekly = 0;
                                                    foreach ($car_offers_var as $index=>$car_offer) {
                                                        $car_offer_data = $car_offer;
                                                        if(!empty($car_offer_data)) {
                                                            if($car_offer->offer_type == 'percentage') {
                                                                $discount_price = (float)$daily_price * (float)$car_offer->offer_value / 100;
                                                                $discount_month_price = (float)$monthly_price * (float)$car_offer->offer_value / 100;
                                                                $discount_week_price = (float)$weekly_price * (float)$car_offer->offer_value / 100;
                                                            }
                                                            else {
                                                                $discount_price = (float)$car_offer->offer_value;
                                                                $discount_month_price = (float)$car_offer->offer_value;
                                                                $discount_week_price = (float)$car_offer->offer_value;

                                                            }
                                                            $total_discount_price_daily = $total_discount_price_daily + $discount_price;
                                                            $total_discount_price_monthly = $total_discount_price_monthly + $discount_month_price;
                                                            $total_discount_price_weekly = $total_discount_price_weekly + $discount_week_price;

                                                        }
                                                    }
                                                    $daily_price = $daily_price - $total_discount_price_daily;
                                                    $monthly_price = $monthly_price - $total_discount_price_monthly;
                                                    $weekly_price = $weekly_price - $total_discount_price_weekly;

                                                }
                                            @endphp
                                            @if(isset($car->deals) && count($car->deals) > 0)
                                                @foreach($car->deals as $car_deal_data)
                                                    @php $deal_flag = 0 @endphp
                                                    @if(($car_deal_data->deal_type) == "daily")
                                                        @php $deal_flag = 1 @endphp
                                                        <div class="rent_day">
                                                            <p>
                                                                <del> {{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}</del> {!! '&nbsp;' !!}</p>
                                                            <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }} <p>{{ __('text.day') }}</p> </span>
                                                        </div>
                                                        @break
                                                    @else
                                                        @if($deal_flag == 0)
                                                            <div class="rent_day">
                                                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }} <p>{{ __('text.day') }}</p> </span>
                                                            </div>
                                                            @break
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="rent_day">
                                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }} <p>{{ __('text.day') }}</p> </span>
                                                </div>
                                            @endif
                                            @if(isset($car->deals) && count($car->deals) > 0)
                                                @php $deal_flag = 0 @endphp
                                                @php $counter = 0 @endphp
                                                @foreach($car->deals as $car_deal_data)
                                                    @if(($car_deal_data->deal_type) == "monthly")
                                                        @php $deal_flag = 1 @endphp
                                                        <div class="rent_day rent_month">

                                                            <p> <del> {{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}</del> {!! '&nbsp;' !!}</p>
                                                            <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }} <p>{{ __('text.month') }}</p> </span>

                                                        </div>
                                                        @break
                                                    @else
                                                        @php $deal_flag = 0 @endphp
                                                    @endif
                                                @endforeach
                                                @if($deal_flag == 0)
                                                    <div class="rent_day rent_month">
                                                        <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }} <p>{{ __('text.month') }}</p> </span>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="rent_day rent_month">
                                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }} <p>{{ __('text.month') }}</p> </span>
                                                </div>
                                            @endif
                                        </div>
                                            @if(!empty($car->car_specifications) && count($car->car_specifications))
                                                <ul class="car_facilities">
                                                    @foreach ($car->car_specifications as $key=>$car_specification)
                                                        @if($key <= 2)
                                                            <li> {!! $car_specification->icon_html !!} {{ $car_specification->specification_title }}</li>
                                                        @endif
                                                        {{-- /*$car_specifications = $car->car_specifications;
                                                         $door_text = '';
                                                         $seat_text = '';
                                                         $bag_text = '';
                                                         foreach ($car_specifications as $car_specification) {
                                                             if($car_specification->translate('en')) {
                                                                 if(strpos($car_specification->translate('en')->specification_title, 'Doors') !== false) {
                                                                     $door_text = $car_specification->specification_title;
                                                                 }
                                                                 if(strpos($car_specification->translate('en')->specification_title, 'Seats') !== false) {
                                                                     $seat_text = $car_specification->specification_title;
                                                                 }
                                                                 if(strpos($car_specification->translate('en')->specification_title, 'Bags') !== false) {
                                                                     $bag_text = $car_specification->specification_title;
                                                                 }
                                                             }
                                                         }*/--}}
                                                    @endforeach
                                                </ul>
                                                {{--                                                <ul>--}}
                                                {{--                                                    @if($door_text != '')--}}
                                                {{--                                                        <li> <img src="{{ asset('frontend/image/car_door.png') }}" alt=""> {{ $door_text }}</li>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                    @if($seat_text != '')--}}
                                                {{--                                                        <li> <img src="{{ asset('frontend/image/car_seats.png') }}" alt=""> {{ $seat_text }}</li>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                    @if($bag_text != '')--}}
                                                {{--                                                        <li> <img src="{{ asset('frontend/image/car_bags.png') }}" alt=""> {{ $bag_text }}</li>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </ul>--}}
                                            @endif
                                        @if(!empty($car->car_rent_details))
                                            <div class="car_service">
                                                <ul>
                                                    @foreach ($car->car_rent_details as $car_rent_detail)
                                                        @if($car_rent_detail->translation)
                                                            <li> <i class="fa-solid fa-circle-check rigth_icon"></i> {{ $car_rent_detail->translation->rent_detail_text ?? '' }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="contact_info">
                                        <a href="tel:{{ (!empty($get_locale_contact_number) ? $get_locale_contact_number : '') }}" class="call"><img class="img-fluid" src="{{ asset('frontend/image/call_info.png') }}" alt=""></a>
                                        <a href="https://wa.me/{{ (!empty($get_locale_whatsapp_number) ? $get_locale_whatsapp_number : '') }}?text={{__('frontend.home.index.wa_text')}} {{ $car->translation->name ?? '' }}" target="_blank"  class="whatsapp"><img class="img-fluid" src="{{ asset('frontend/image/whatsapp.png') }}" alt=""></a>
                                        <a href="msg_send" class="msg_send" data-id="{{ $car->id }}" data-bs-toggle="modal" data-bs-target="#message_send">{{ __('text.book_now') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--@endif--}}
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    @include('frontend.pages.models.car_inquiry')

            @if($car_type->description != '')
                <section class="dubai_car_rent">
            <div class="container">
                <div class="dubai_car_rent_details">
                    {!! $car_type->description !!}
                </div>
            </div>
        </section>
            @endif

            @if(!empty($faq_details))
                <section class="dubai_car_rent" style="background-color: transparent !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="faq mt-3 mb-5">
                        {{ __('text.frequently_asked_question') }}
                    </h3>
                    <div class="accordion accordion-flush mb-5" id="">
                                @if(isset($faq_details) && !empty($faq_details))
                            @foreach($faq_details as $faq_detail)
                                <div class="accordion-item accordion_body_fix my-3">
                                                <h4 class="accordion-header" >
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                                            aria-controls="flush-collapseThree">
                                                            {{ $faq_detail->question }}
                                                    </button>
                                                </h4>
                                            <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                                                 aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body pt-0">
                                                    <div class="py-3 faq_size">
                                                        {{ $faq_detail->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
            @endif
            @stop

            @section('scripts')
                {{-- <script>
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

        //car data get and display in model and modal open
        $(document).on("click", ".msg_send", function(event){
            var locale = $('html').attr('lang');

            event.preventDefault();
            $('.ajaxifyForm').trigger("reset");
            $('#phone_country_code_in').val('{{$dubai_phone_codes->phonecode}}');
            $('.active_country_d').attr('src', '{{ asset('vendor/blade-flags/country-'.strtolower($dubai_phone_codes->iso).'.svg') }}');
            $('#phone_code_spn').text('{{$dubai_phone_codes->phonecode}}');
            var id = $(this).data('id');
            $("#message_send #car_rent_detail").text('');
            var url = '{!! url('/') !!}' + '/' + locale + '/car-detail/' + id ;
            //get data
            $.get(url, function (data) {
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
            })
        });

    </script> --}}
    <script type="application/ld+json">

        @php
        $car_type_schema = car_type_schema($car_type);
        @endphp

        @if(!empty($car_type_schema))
            "<?php echo $car_type_schema; ?>";
        @endif
    </script>

    <script>
        let page = 2;
        var $grid = $('.render-div');

        function getPenPath() {
            return "{{ route('frontend.car_type_details',['slug' => $car_type->id]) }}?page=" + page;
        }

        if(page){
            $grid.infiniteScroll({
                path: getPenPath,
                history: false,
                responseBody: 'json',
            });
        }

        /* append items on load */
        $grid.on('load.infiniteScroll', function(event, response, path) {
            $(".render-div").append(response.html);
            $("img.lazy").lazyload({data_attribute: "original"});
            page = response.page;
        });
    </script>
@stop


@extends('frontend.layouts.app')
@section('title', $meta_title)
@section('meta_title', isset($car) && isset($car_type->meta_title) ? $car->meta_title : '')
@section('meta_keywords', $car->meta_keyword)
@section('meta_description', $car->meta_description)
@section('metadata')
    @if(file_exists(public_path('frontend/Feature/Car/' . $car->feature_image)) && !empty($car->feature_image))
        <meta property="og:image" content="{{ url('frontend/Feature/Car/' . $car->feature_image) }}" />
        <meta name="twitter:image" content="{{ url('frontend/Feature/Car/' . $car->feature_image) }}" />

    @endif
@endsection
@section('styles')
    <style>
        .car_facilities img,
        .car_facilities i {
            width: 24px;
        }

        @media (max-width: 767px) {
            .border_bottom_fix {
                border-bottom: 1px solid #5F5F5F;
            }

            .xs-pb-2 {
                padding-bottom: 0.5rem !important;
            }

            .xs-pt-2 {
                padding-top: 0.5rem !important;
            }
        }
        .dubai_car_rent_details div iframe.note-video-clip {
            width: 100% !important;
        }
    </style>
@stop


@section('content')
    <div class="color_hr"></div>

    <div class="container my-3">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            @php
                $app_current_locale = array_key_exists(\App::currentLocale(), app()->config->get('app.available_locales')) ? \App::currentLocale() : \Config::get('app.fallback_locale');
                $breadcrumb_car['title'] = $car->name;
                $breadcrumb_car['slug'] = $car->slug;
                if (!empty($car->car_brand)) {
                    echo Breadcrumbs::render('brand_car', ['slug' => $car->car_brand->slug, 'title' => $car->car_brand->translate($app_current_locale)->title], $breadcrumb_car);
                } else {
                    echo Breadcrumbs::render('no_brand_car', $breadcrumb_car);
                }
            @endphp
        </nav>
        @php
            $get_locale_whatsapp_number = get_locale_whatsapp_number();
            $get_locale_contact_number = get_locale_contact_number();
        @endphp

        <!-- desktop view -->
        <div class="bg_color_rent d-none d-md-block">
            <div class="row">
                <div class="col-md-9">
                    <div class="d-flex align-items-center">
                        @php
                            $car_brand_image = !empty($car->car_brand) ? $car->car_brand->image : '';
                            $cars = $car;
                        @endphp

                        <span>{{ (!empty(car_detail_schema($cars,'b')) ? '' : '') }}</span>
                        <div class="mx-2 brand_img">
                            @if ($car_brand_image != null && file_exists(public_path() . '/frontend/image/' . $car_brand_image))
                                <img src="{{ asset('frontend/image/' . $car_brand_image) }}" alt="" class="img-fluid">
                            @endif
                        </div>
                        <h1 class="rent_lamborghini">
                            {{ $car->custom_title }}
                        </h1>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-end align-items-center">
                    <!-- <span class="px-3">
                    <a href="#"><img src="{{ asset('frontend/image/share_icone.png') }}" alt="" class="img-fluid"></a>
                 </span>
                            <span class="">
                    <a href="#"><img src="{{ asset('frontend/image/information_icon.png') }}" class="img-fluid" alt=""></a>
                 </span>
                            <span class="px-3">
                    <a href="#"><img src="{{ asset('frontend/image/link_icon.png') }}" class="img-fluid" alt=""></a>
                 </span> -->
                </div>
            </div>
        </div>

        <!-- mobile view -->
        <div class="bg_color_rent d-block d-md-none">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex  align-items-center">
                        <div class="mx-2 brand_img">
                            @if ($car_brand_image != null && file_exists(public_path() . '/frontend/image/' . $car_brand_image))
                                <img src="{{ asset('frontend/image/' . $car_brand_image) }}" alt=""
                                    class="img-fluid">
                            @endif
                        </div>
                        <div class="rent_lamborghini px-2">
                            {{ $car->custom_title }}
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-12 d-flex justify-content-end align-items-center">
                         <div class="row px-3">
                                <div class="col-6 d-flex justify-content-end px-0">
                                <span class="px-2">
                                   <a href="#"><img src="{{ asset('frontend/image/share_icone.png') }}" class="img-fluid" alt=""></a>
                                </span>
                                    <span class="">
                                   <a href="#"><img src="{{ asset('frontend/image/information_icon.png') }}" class="img-fluid" alt=""></a>
                                </span>
                                    <span class="px-2">
                                   <a href="#"><img src="{{ asset('frontend/image/link_icon.png') }}" class="img-fluid" alt=""></a>
                                </span>
                                </div>
                            </div>
                    </div>-->
            </div>
        </div>

        <section class="mt-3 mb-5">
            @php
                if (count($car->car_images) > 0) {
                    $car_images = $car->car_images;
                }
            @endphp
            <div class="row flex_d_fix">
                <div class="col-xl-6 text-center text-xl-start pb-3">
                    <div class="main-wrapper">
                        <div class="demo">
                            <div class="lSSlideOuter ">
                                <div class="lSSlideWrapper usingCss"
                                    style="direction:ltr;transition-duration: 400ms; transition-timing-function: ease;">
                                    <ul id="lightSlider" class="lightSlider lSSlide lsGrab"
                                        style="width: 780px; transform: translate3d(-3120px, 0px, 0px); height: 520px; padding-bottom: 0%;">
                                        @if(isset($car_images) && count($car_images) > 0)
                                            @foreach($car_images as $car_image)
                                                @if(!empty($car_image->image) && file_exists(public_path().'/frontend/image/'.$car_image->image))
                                                <li data-thumb="{{ asset('frontend/image/'. $car_image->image) }}"
                                                    class="lslide"
                                                    style="width: 780px; margin-right: 0px;">
                                                    <a href="{{ asset('frontend/image/'. $car_image->image) }}"
                                                       data-fancybox="gallery">
                                                        <img src="{{ asset('frontend/image/'. $car_image->image) }}" alt="{{$car->custom_title}}">
                                                    </a>
                                                </li>

                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <section class="fix_bg_set">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="padding_b_fix">
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">{{ __('text.model') }}</span>
                                        </div>
                                        <div class="padding_b_fix">
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">{{ __('text.insurance') }}</span>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">{{ __('text.deposit') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="padding_b_fix">
                                            <span class="fix_text">{{ $car->car_model_year }}</span>
                                        </div>
                                        <div class="padding_fix">
                                            <span class="fix_text">{{ $car->insurance }}</span>
                                        </div>
                                        <div class="padding_b_fix">
                                            <span
                                                class="fix_text">{{ floor(Session::has('conversion_rate') ? $car->deposit * Session::get('conversion_rate') : $car->deposit) }}
                                                {{ Session::has('currency') ? Session::get('currency') : 'AED' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="padding_b_fix">
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">{{ __('text.delivery') }}</span>
                                        </div>
                                        <div class="padding_b_fix">
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">KMs</span>
                                        </div>
                                        <div class="padding_b_fix">
                                            <i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i>
                                            <span class="model_fix">{{ __('text.min_age') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="padding_b_fix">
                                            <span class="fix_text">{{ $car->delivery }}</span>
                                        </div>
                                        <div class="padding_fix">
                                            <span class="fix_text">{{ $car->daily_mileage_limit }}
                                                KM/{{ __('text.day') }}</span>
                                        </div>
                                        <div class="padding_b_fix">
                                            <span class="fix_text">{{ $car->min_age }} {{ __('text.years') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $today = date('Y-m-d');
                            $car_offers_var = $car->car_offers;
                            $flag = false;

                            if (!empty($car_offers_var)) {
                                $daily_price = floor($car->daily_price);
                                $monthly_price = floor($car->monthly_price);
                                $weekly_price = floor($car->weekly_price);
                                $total_discount_price_daily = 0;
                                $total_discount_price_weekly = 0;
                                $total_discount_price_monthly = 0;
                                foreach ($car_offers_var as $index => $car_offer) {
                                    $car_offer_data = $car_offer;
                                    if (!empty($car_offer_data)) {
                                        if ($car_offer->offer_type == 'percentage') {
                                            $discount_price = ((float) $daily_price * (float) $car_offer->offer_value) / 100;
                                            $discount_price_weekly = ((float) $weekly_price * (float) $car_offer->offer_value) / 100;
                                            $discount_month_price = ((float) $monthly_price * (float) $car_offer->offer_value) / 100;
                                        } else {
                                            $discount_price = (float) $car_offer->offer_value;
                                            $discount_price_weekly = (float) $car_offer->offer_value;
                                            $discount_month_price = (float) $car_offer->offer_value;
                                        }
                                        $total_discount_price_daily = $total_discount_price_daily + $discount_price;
                                        $total_discount_price_weekly = $total_discount_price_monthly + $discount_price_weekly;
                                        $total_discount_price_monthly = $total_discount_price_monthly + $discount_month_price;
                                    }
                                }
                                $daily_price = $daily_price - $total_discount_price_daily;
                                $monthly_price = $monthly_price - $total_discount_price_monthly;
                                $weekly_price = $weekly_price - $total_discount_price_weekly;
                            }
                        @endphp
                        <div class="fix-daily d-md-block  mt-3">
                            <div class="row align-items-baseline">

                                @if (isset($car->deals) && count($car->deals) > 0)
                                    @foreach ($car->deals as $car_deal_data)
                                        @php $deal_flag = 0 @endphp
                                        @if ($car_deal_data->deal_type == 'daily')
                                            @php $deal_flag = 1 @endphp
                                            <div class="col-4 text-center border_right_fix">
                                                {{-- <div class="model_fix_day pb-2">
                                                    {{ __('text.daily') }}
                                                </div> --}}
                                                <p class="pb-2">
                                                    <del>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}</del>
                                                    {!! '&nbsp;' !!}
                                                </p>
                                                <div class="fix_text  xs-pb-2">
                                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                        {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }}
                                                        <p class=" pt-2">/ {{ __('text.day') }}</p>
                                                    </span>
                                                </div>
                                            </div>
                                        @break

                                    @else
                                        @if ($deal_flag == 0)
                                            <div class="col-4 text-center border_right_fix">
                                                {{-- <div class="model_fix_day pb-2">
                                                        {{ __('text.daily') }}
                                                    </div> --}}
                                                <p class="pb-2"> {!! '&nbsp;' !!}</p>
                                                <div class="fix_text  xs-pb-2">
                                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                                                        <p class=" pt-2">/ {{ __('text.day') }}</p>
                                                    </span>
                                                </div>
                                            </div>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <div class="col-4 text-center border_right_fix">
                                {{-- <div class="model_fix_day pb-2">
                                            {{ __('text.daily') }}
                                        </div> --}}
                                <p class="pb-2"> {!! '&nbsp;' !!}</p>
                                <div class="fix_text  xs-pb-2">
                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                                        <p class=" pt-2">/ {{ __('text.day') }}</p>
                                    </span>
                                </div>
                            </div>
                        @endif

                        <div class="col-4 text-center border_right_fix xs-pt-2 ">
                            {{-- <div class="model_fix_day pb-2">
                                         {{ __('text.weekly') }}
                                     </div> --}}
                            <p class="pb-2"> {!! '&nbsp;' !!}</p>
                            <div class="fix_text xs-pb-2">
                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                    {{ floor(Session::has('conversion_rate') ? floor($car->weekly_price * Session::get('conversion_rate')) : $car->weekly_price) }}
                                    <p class=" pt-2">/ {{ __('text.week') }}</p>
                                </span>
                            </div>
                        </div>

                        @if (isset($car->deals) && count($car->deals) > 0)
                            @php $deal_flag = 0 @endphp
                            @php $counter = 0 @endphp
                            @foreach ($car->deals as $car_deal_data)
                                @if ($car_deal_data->deal_type == 'monthly')
                                    @php $deal_flag = 1 @endphp
                                    <div class="col-4 text-center xs-pt-2 ">
                                        {{-- <div class="model_fix_day pb-2">
                                                    {{ __('text.daily') }}
                                                </div> --}}
                                        <p class=" pb-2">
                                            <del>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                {{ floor(Session::has('conversion_rate') ? floor($car->monthly_price * Session::get('conversion_rate')) : $car->monthly_price) }}</del>
                                            {!! '&nbsp;' !!}
                                        </p>
                                        <div class="fix_text">
                                            <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                {{ floor(Session::has('conversion_rate') ? floor($car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate')) : $car_deal_data->pivot->connectedcar_value) }}
                                                <p class=" pt-2">/ {{ __('text.month') }}</p>
                                            </span>
                                        </div>
                                    </div>
                                @break

                            @else
                                @php $deal_flag = 0 @endphp
                            @endif
                        @endforeach
                        @if ($deal_flag == 0)
                            <div class="col-4 text-center xs-pt-2 ">
                                {{-- <div class="model_fix_day pb-2">
                                                {{ __('text.daily') }}
                                            </div> --}}
                                <p class="pb-2"> {!! '&nbsp;' !!}</p>
                                <div class="fix_text">
                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                        {{ floor(Session::has('conversion_rate') ? floor($car->monthly_price * Session::get('conversion_rate')) : $car->monthly_price) }}
                                        <p class=" pt-2">/ {{ __('text.month') }}</p>
                                    </span>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-4 text-center xs-pt-2 ">
                            {{-- <div class="model_fix_day pb-2">
                                            {{ __('text.daily') }}
                                        </div> --}}
                            <p class=""> {!! '&nbsp;' !!}</p>
                            <div class="fix_text">
                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                    {{ floor(Session::has('conversion_rate') ? floor($car->monthly_price * Session::get('conversion_rate')) : $car->monthly_price) }}
                                    <p class=" pt-2">/ {{ __('text.month') }}</p>
                                </span>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
            <section class="contact_info_fix d-none d-md-block">
                <div class="contact_info">
                    <a href="tel:{{ !empty($get_locale_contact_number) ? $get_locale_contact_number : '' }}"
                        class="call"><img class="img-fluid"
                            src="{{ asset('frontend/image/call_info.png') }}" alt="call info"></a>

                    <a href="https://wa.me/{{ !empty($get_locale_whatsapp_number) ? $get_locale_whatsapp_number : '' }}?text={{ __('frontend.home.index.wa_text') }} {{ $car->custom_title }}"
                        {{-- <a href="https://wa.me/{{ ((!empty($phone_no) && $phone_no->translate('en')) ? $phone_no->translate('en')->val : '') }}" --}} target="_blank" class="whatsapp"><img class="img-fluid"
                            src="{{ asset('frontend/image/whatsapp.png') }}" alt="whatsapp"></a>

                    {{-- <a href="https://wa.me/{{ ((!empty($phone_no) && $phone_no->translate('en')) ? $phone_no->translate('en')->val : '') }}"
                                   target="_blank" class="whatsapp"><img class="img-fluid" src="{{ asset('frontend/image/whatsapp.png') }}" alt=""></a> --}}
                    <a href="msg_send" style="background-color: var(--pur-golden);border-radius: 50px;"
                        data-id="{{ $car->id }}" data-bs-toggle="modal" data-bs-target="#message_send"
                        class="book_now_fix msg_send">{{ __('text.book_now') }}</a>
                </div>
            </section>


            <section class="contact_info_fix d-block d-md-none cardcontinfo">
                <div class="contact_info">
                    <a href="tel:{{ !empty($get_locale_contact_number) ? $get_locale_contact_number : '' }}"
                        class="call"><img class="img-fluid"
                            src="{{ asset('frontend/image/call_info.png') }}" alt="call info"></a>
                    <a href="https://wa.me/{{ !empty($get_locale_whatsapp_number) ? $get_locale_whatsapp_number : '' }}?text={{ __('frontend.home.index.wa_text') }} {{ $car->translation->name ?? '' }}"
                        target="_blank" class="whatsapp"><img class="img-fluid"
                            src="{{ asset('frontend/image/whatsapp.png') }}" alt="whatsapp"></a>
                    <a href="msg_send" style="background-color: var(--pur-golden);border-radius: 50px;"
                        data-id="{{ $car->id }}" data-bs-toggle="modal" data-bs-target="#message_send"
                        class="book_now_fix msg_send">{{ __('text.book_now') }}</a>
                </div>
            </section>
            <div class="delivry">
                <div class="delivery_pickup mt-3 mx-1">
                    {{ __('text.delivery_pick_up') }}
                </div>
                @if (!empty($car->car_delivery_pick_up_services))
                    <div class="row mt-3 px-1">
                        @foreach ($car->car_delivery_pick_up_services as $car_delivery_pick_up_service)
                            @if ($car->translation)
                                <div class="col-xl-4 col-6 ellipsis">
                                    <img src="{{ asset('frontend/image/Ellipse.png') }}" alt="Ellipse">
                                    <span class="px-2 branch">
                                        {{ $car_delivery_pick_up_service->service_title }}
                                    </span>
                                </div>
                            @endif
                        @endforeach

                    </div>
                @endif
                <div class="mt-3 mx-1 ellipsis" style="color: #FFF489;">
                    {{ __('text.supplier_note') }}: {{ $car->supplier_note }}
                </div>
            </div>
        </section>
    </div>
</div>
</section>
<section class="carspecs_bg">
<div class="row">
    <div class="col-md-12">
        <div class="row flex_d_fix">
            <div class="col-md-6">
                <div class="car_specs">{{ __('text.car_specs') }}</div>
                @if (!empty($car->car_specifications))
                    <div class="row">
                        @php
                            $car_spe_row = ceil(count($car->car_specifications) / 2);
                        @endphp
                        @foreach ($car->car_specifications as $index => $car_specification)
                            @if ($car_specification->translation)
                                @if ($index == 0 || $index == $car_spe_row)
                                    <div class="col-6 py-3">
                                @endif
                                @php
                                    $door_text = '';
                                    $seat_text = '';
                                    $bag_text = '';
                                    $coupe_text = '';
                                    $transmission_text = '';
                                    if ($car_specification->translate('en')) {
                                        if (strpos($car_specification->translate('en')->specification_title, 'Doors') !== false) {
                                            $door_text = $car_specification->specification_title;
                                        }
                                        if (strpos($car_specification->translate('en')->specification_title, 'Seats') !== false) {
                                            $seat_text = $car_specification->specification_title;
                                        }
                                        if (strpos($car_specification->translate('en')->specification_title, 'Bags') !== false) {
                                            $bag_text = $car_specification->specification_title;
                                        }
                                        if (strpos($car_specification->translate('en')->specification_title, 'Coupe') !== false) {
                                            $coupe_text = $car_specification->specification_title;
                                        }
                                        if (strpos($car_specification->translate('en')->specification_title, 'Transmission') !== false) {
                                            $transmission_text = $car_specification->specification_title;
                                        }
                                    }
                                @endphp
                                <div
                                    class="d-flex align-items-center {{ $index == $car_spe_row - 1 || $index + 1 == count($car->car_specifications) ? 'px-0' : 'pb-3' }}">
                                    {!! $car_specification->icon_html !!}
                                    <span class="coupe px-3">
                                        {{ $car_specification->specification_title }}
                                    </span>
                                </div>
                                @if ($index + 1 == $car_spe_row || $index + 1 == count($car->car_specifications))
                    </div>
                @endif
                @endif
                @endforeach
            </div>
            @endif
            @if (!empty($car->car_features))
                <div class="row">
                    <div class="car_specs">{{ __('text.car_features') }}</div>
                    @php
                        $car_fea_row = ceil(count($car->car_features) / 2);
                    @endphp
                    @foreach ($car->car_features as $index => $car_feature)
                        @if ($car_feature->translate(App::currentLocale()))
                            @if ($index == 0 || $index == $car_fea_row)
                                <div class="col-6 py-3">
                            @endif
                            @php
                                $control_text = '';
                                $memory_text = '';
                                $camera_text = '';
                                $parking_text = '';
                                $warning_text = '';
                                if ($car_feature->translate('en')) {
                                    if (strpos($car_feature->translate('en')->feature_title, 'Control') !== false) {
                                        $control_text = $car_feature->feature_title;
                                    }
                                    if (strpos($car_feature->translate('en')->feature_title, 'Memory') !== false) {
                                        $memory_text = $car_feature->feature_title;
                                    }
                                    if (strpos($car_feature->translate('en')->feature_title, 'Camera') !== false) {
                                        $camera_text = $car_feature->feature_title;
                                    }
                                    if (strpos($car_feature->translate('en')->feature_title, 'Parking') !== false) {
                                        $parking_text = $car_feature->feature_title;
                                    }
                                    if (strpos($car_feature->translate('en')->feature_title, 'Warning') !== false) {
                                        $warning_text = $car_feature->feature_title;
                                    }
                                }
                            @endphp
                            <div
                                class="d-flex align-items-center {{ $index == $car_fea_row - 1 || $index + 1 == count($car->car_features) ? 'justify-content-xs-center' : 'pb-3' }}">
                                {!! $car_feature->icon_html !!}
                                <span class="coupe px-3">
                                    {{ $car_feature->feature_title }}
                                </span>
                            </div>
                            @if ($index + 1 == $car_fea_row || $index + 1 == count($car->car_features))
                </div>
            @endif
            @endif
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-md-6 border_left_fix_car">
        <div class="car_specs">{{ __('text.rental_includes') }}</div>
        @if (!empty($car->car_rental_includes))
            <div class="row">
                <div class="col-6 py-3">
                    @foreach ($car->car_rental_includes as $index => $car_rental_include)
                        @if ($car_rental_include->translation)
                            <div class="d-flex align-items-center pb-3">
                                <span class="coupe">
                                    {{ $car_rental_include->key }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-6 py-3">
                    @foreach ($car->car_rental_includes as $index => $car_rental_include)
                        @if ($car_rental_include->translation)
                            <div class="d-flex align-items-center justify-content-end pb-3">
                                <span class="coupe">
                                    {{ $car_rental_include->value }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="car_specs">{{ __('text.requirements') }}</div>
        @if (!empty($car->car_rental_requirements))
            <div class="row">
                <div class="col-6 pt-3">
                    @foreach ($car->car_rental_requirements as $index => $car_rental_requirement)
                        @if ($car_rental_requirement->translation)
                            <div class="d-flex align-items-center pb-3">
                                <span class="coupe">
                                    {{ $car_rental_requirement->key }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-6 pt-3">
                    @foreach ($car->car_rental_requirements as $index => $car_rental_requirement)
                        @if ($car_rental_requirement->translation)
                            <div class="d-flex align-items-center justify-content-end pb-3">
                                <span class="coupe">
                                    {{ $car_rental_requirement->value }}
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
    </div>
    @endif
    <div class="col-12 text-center mb-4 rd_btn_fix">
        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <button class="gold_btn btn_fix_gold">{{ __('text.required_documents') }} <i
                    class="fa-solid fa-arrow-right px-3" style="color: #ffffff;"></i></button>
        </a>
    </div>
    <!-- Modal -->
    <div class="modal fade px-1" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        @if(!empty($cms_section->page_body))
        {!! $cms_section->page_body !!}
        @endif
    </div>
</div>
</div>
<!-- <div class="col-md-3">
<iframe class="b_radius map_fix" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14880.533600125722!2d72.790108!3d21.186859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04dce4cc91805%3A0x5836095c3d07ac53!2sVPN%20INFOTECH%20-%20Top%20Rated%20IT%20Company%20in%20Surat%20India!5e0!3m2!1sen!2sin!4v1680674899286!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div> -->
</div>
</section>
<!-- Modal -->
@include('frontend.pages.models.car_inquiry')
</div>

@if (!empty($car->description))
<section class="dubai_car_rent" style="background-color: transparent !important;">
<div class="container">
    <div class="dubai_car_rent_details">
        {!! $car->description !!}
    </div>
</div>
</section>
@endif


@if (!empty($faq_details))
<section class="dubai_car_rent" style="background-color: transparent !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="faq mt-3 mb-5">
                    {{ __('text.frequently_asked_question') }}
                </h3>
                <div class="accordion accordion-flush mb-5" id="">
                    @if (isset($faq_details) && !empty($faq_details))
                        @foreach ($faq_details as $faq_detail)
                            <div class="accordion-item accordion_body_fix my-3">
                                <h4 class="accordion-header" >
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{ $faq_detail->id }}"
                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                        {{ $faq_detail->question }}
                                    </button>
                                </h4>
                                <div id="flush-collapse{{ $faq_detail->id }}" class="accordion-collapse collapse"
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

<section class="most_rent_car_list latest_car_rental d-lg-block d-none">
<div class="container">
<h2 class="main_title">{{ __('text.similar_car_rental_options') }}</h2>
<div class="car_rental_items owl-carousel" style="direction:ltr">
    @if (isset($similar_car_data) && !empty($similar_car_data))
        @foreach ($similar_car_data->chunk(4) as $carsChunk)
            @foreach ($carsChunk as $index => $car)
                <div class="most_rent_car">
                    <div class="rent_car_img">
                        @php
                            $car_offers_var = $car->car_offers;
                            $today = date('Y-m-d');
                            $flag = false;

                        @endphp
                        @php

                            if ($car->car_images_first) {
                                $car_image_first = $car->car_images[0];
                                if (!empty($car_image_first) && !empty($car_image_first->image)) {
                                    if (file_exists(public_path() . '/frontend/image/' . $car_image_first->image)) {
                                        $image_exist = 1;
                                    }
                                }
                            }
                        @endphp
                        @if (!empty($image_exist))
                            <div class="car_rental_img">
                                <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}"
                                    class="text-decoration-none urus_fix">
                                    <img class="img-fluid"
                                        src="{{ asset('frontend/image/' . $car_image_first->image) }}"
                                        alt="{{ $car->slug }}">
                                </a>
                                @if (isset($car->deals) && count($car->deals) > 0)
                                    <img class="img-fluid special_offer"
                                        src="{{ asset('frontend/image/special_offer_tag.png') }}"
                                        alt="special offer tag">
                                @endif
                            </div>
                            <p class="delivery_txt">{{ __('text.free_delivery') }}</p>
                        @endif
                    </div>
                    <div class="most_rent_car_details">
                        <div class="car_full_details">
                            <div class="brand_name">
                                @php
                                    $car_brand_image = !empty($car->car_brand) ? $car->car_brand->image : '';
                                @endphp
                                <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}"
                                    class="text-decoration-none urus_fix">
                                    <h4>{{ $car->translation->name ?? '' }}</h4>
                                </a>
                                @if (file_exists(public_path() . '/frontend/image/' . $car_brand_image))
                                    <img class="img-fluid"
                                        src="{{ asset('frontend/image/' . $car_brand_image) }}"
                                        alt="{{ $car->slug }}">
                                @endif
                            </div>
                            <div class="rent_counts">
                                <!-- @php
                                    if (!empty($car_offers_var)) {
                                        $daily_price = floor($car->daily_price);
                                        $monthly_price = floor($car->monthly_price);
                                        $total_discount_price_daily = 0;
                                        $total_discount_price_monthly = 0;
                                        foreach ($car_offers_var as $index => $car_offer) {
                                            if (!empty($car_offer_data)) {
                                                if ($car_offer->offer_type == 'percentage') {
                                                    $discount_price = ((float) $daily_price * (float) $car_offer->offer_value) / 100;
                                                    $discount_month_price = ((float) $monthly_price * (float) $car_offer->offer_value) / 100;
                                                } else {
                                                    $discount_price = (float) $car_offer->offer_value;
                                                    $discount_month_price = (float) $car_offer->offer_value;
                                                }
                                                $total_discount_price_daily = $total_discount_price_daily + $discount_price;
                                                $total_discount_price_monthly = $total_discount_price_monthly + $discount_month_price;
                                            }
                                        }
                                        $daily_price = $daily_price - $total_discount_price_daily;
                                        $monthly_price = $monthly_price - $total_discount_price_monthly;
                                    }
                                @endphp -->
                                @if (isset($car->deals) && count($car->deals) > 0)
                                    @foreach ($car->deals as $car_deal_data)
                                        @php $deal_flag = 0 @endphp
                                        @if ($car_deal_data->deal_type == 'daily')
                                            @php $deal_flag = 1 @endphp
                                            <div class="rent_day">
                                                <p>
                                                    <del>
                                                        {{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}</del>
                                                    {!! '&nbsp;' !!}
                                                </p>
                                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                    {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }}
                                                    <p>{{ __('text.day') }}</p>
                                                </span>
                                            </div>
                                        @break

                                    @else
                                        @if ($deal_flag == 0)
                                            <div class="rent_day">
                                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                    {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                                                    <p>{{ __('text.day') }}</p>
                                                </span>
                                            </div>
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <div class="rent_day">
                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                    {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                                    <p>{{ __('text.day') }}</p>
                                </span>
                            </div>
                        @endif
                        @if (isset($car->deals) && count($car->deals) > 0)
                            @php $deal_flag = 0 @endphp
                            @php $counter = 0 @endphp
                            @foreach ($car->deals as $car_deal_data)
                                @if ($car_deal_data->deal_type == 'monthly')
                                    @php $deal_flag = 1 @endphp
                                    <div class="rent_day rent_month">

                                        <p>
                                            <del>
                                                {{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                                {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}</del>
                                            {!! '&nbsp;' !!}
                                        </p>
                                        <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                            {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }}
                                            <p>{{ __('text.month') }}</p>
                                        </span>

                                    </div>
                                @break

                            @else
                                @php $deal_flag = 0 @endphp
                            @endif
                        @endforeach
                        @if ($deal_flag == 0)
                            <div class="rent_day rent_month">
                                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                    {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}
                                    <p>{{ __('text.month') }}</p>
                                </span>
                            </div>
                        @endif
                    @else
                        <div class="rent_day rent_month">
                            <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}
                                <p>{{ __('text.month') }}</p>
                            </span>
                        </div>
                    @endif
                </div>
                <ul class="car_facilities">
                    @if (!empty($car->car_specifications) && count($car->car_specifications))
                            @foreach ($car->car_specifications as $key => $car_specification)
                                @if ($key <= 2)
                                    <li> {!! $car_specification->icon_html !!}
                                        {{ $car_specification->specification_title }}</li>
                                @endif
                            @endforeach
                    @endif
                </ul>
                @if (!empty($car->car_rent_details))
                    <div class="car_service">
                        <ul>
                            @foreach ($car->car_rent_details as $car_rent_detail)
                                @if ($car_rent_detail->translation)
                                    <li>
                                        <i class="fa-solid fa-circle-check rigth_icon"></i>
                                        {{ $car_rent_detail->translation->rent_detail_text ?? '' }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="contact_info">
                <a href="tel:{{ !empty($get_locale_contact_number) ? $get_locale_contact_number : '' }}"
                    class="call"><img class="img-fluid"
                        src="{{ asset('frontend/image/call_info.png') }}" alt="call info"></a>

                <a href="https://wa.me/{{ !empty($get_locale_whatsapp_number) ? $get_locale_whatsapp_number : '' }}?text={{ __('frontend.home.index.wa_text') }} {{ $car->translation->name ?? '' }}"
                    target="_blank" class="whatsapp"><img class="img-fluid"
                        src="{{ asset('frontend/image/whatsapp.png') }}" alt="whatsapp"></a>
                <a href="msg_send" data-id="{{ $car->id }}" data-bs-toggle="modal"
                    data-bs-target="#message_send"
                    class="book_now_fix msg_send">{{ __('text.book_now') }}</a>
            </div>
        </div>
    </div>
@endforeach
@endforeach
@endif
</div>
</div>
</section>
<section class="most_rent_car_list recommended_car d-lg-none d-md-block">
<div class="container">
<div class="main_title text-center">{{ __('text.similar_car_rental_options') }}</div>
<div class="row">
@if (isset($similar_car_data) && !empty($similar_car_data))
@foreach ($similar_car_data as $index => $car)
<div class="col-lg-4 col-md-6 col-12">
    <div class="most_rent_car">

        <div class="rent_car_img">
            <div class="recommended_car_list owl-carousel">

                @php
                    $car_offers_var = $car->car_offers;
                    $today = date('Y-m-d');
                    $flag = false;

                @endphp
                @php
                    if (count($car->car_images) > 0) {
                        $car_image_first = $car->car_images[0] ?? [];

                        $car_image_second = $car->car_images[1] ?? [];

                        $car_image_third = $car->car_images[2] ?? [];
                    }
                @endphp
                <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}">
                    <img class="img-fluid"
                        src="{{ isset($car_image_first) ? asset('frontend/image/' . $car_image_first->image) : '' }}"
                        alt="{{ $car->slug }}">
                </a>
                @if (isset($car_image_second) && !empty($car_image_second))
                    <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}">
                        <img class="img-fluid"
                            src="{{ isset($car_image_second) ? asset('frontend/image/' . $car_image_second->image) : '' }}"
                            alt="{{ $car->slug }}">
                    </a>
                @endif

                @if (isset($car_image_third) && !empty($car_image_third))
                    <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}">
                        <img class="img-fluid"
                            src="{{ isset($car_image_third) ? asset('frontend/image/' . $car_image_third->image) : '' }}"
                            alt="{{ $car->slug }}">
                    </a>
                @endif

            </div>

            {{-- @if ($flag == true) --}}
            @if (isset($car->deals) && count($car->deals) > 0)
                <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}">
                    <img class="img-fluid special_offer"
                        src="{{ asset('frontend/image/special_offer_tag.png') }}"
                        alt="special offer tag">
                </a>
            @endif

            <p class="delivery_txt">{{ __('text.free_delivery') }}</p>
        </div>

        <div class="most_rent_car_details">
            <div class="car_full_details">
                <div class="brand_name">
                    @php
                        $car_brand_image = !empty($car->car_brand) ? $car->car_brand->image : '';
                    @endphp
                    <a href="{{ route('frontend.car_details', ['slug' => $car->slug]) }}"
                        class="text-decoration-none urus_fix">
                        <h4>{{ $car->translation->name ?? '' }}
                        </h4>
                    </a>
                    <img class="img-fluid"
                        src="{{ asset('frontend/image/' . $car_brand_image) }}" alt="{{ $car->translation->name ?? '' }}">
                </div>
                <div class="rent_counts">
                    @php
                        if (!empty($car_offers_var)) {
                            $daily_price = floor($car->daily_price);
                            $monthly_price = floor($car->monthly_price);
                            $total_discount_price_daily = 0;
                            $total_discount_price_monthly = 0;
                            foreach ($car_offers_var as $index => $car_offer) {
                                // $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active');
                                $car_offer_data = $car_offer;
                                if (!empty($car_offer_data)) {
                                    if ($car_offer->offer_type == 'percentage') {
                                        $discount_price = ((float) $daily_price * (float) $car_offer->offer_value) / 100;
                                        $discount_month_price = ((float) $monthly_price * (float) $car_offer->offer_value) / 100;
                                    } else {
                                        $discount_price = (float) $car_offer->offer_value;
                                        $discount_month_price = (float) $car_offer->offer_value;
                                    }
                                    $total_discount_price_daily = $total_discount_price_daily + $discount_price;
                                    $total_discount_price_monthly = $total_discount_price_monthly + $discount_month_price;
                                }
                            }
                            $daily_price = $daily_price - $total_discount_price_daily;
                            $monthly_price = $monthly_price - $total_discount_price_monthly;
                        }
                    @endphp
                    @if (isset($car->deals) && count($car->deals) > 0)
                        @foreach ($car->deals as $car_deal_data)
                            @php $deal_flag = 0 @endphp
                            @if ($car_deal_data->deal_type == 'daily')
                                @php $deal_flag = 1 @endphp
                                <div class="rent_day">
                                    <p>
                                        <del>
                                            {{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                            {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}</del>
                                        {!! '&nbsp;' !!}
                                    </p>
                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                        {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }}
                                        <p>{{ __('text.day') }}</p>
                                    </span>
                                </div>
                            @break

                        @else
                            @if ($deal_flag == 0)
                                <div class="rent_day">
                                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                                        <p>{{ __('text.day') }}</p>
                                    </span>
                                </div>
                            @break
                        @endif
                    @endif
                @endforeach
            @else
                <div class="rent_day">
                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                        {{ floor(Session::has('conversion_rate') ? $car->daily_price * Session::get('conversion_rate') : $car->daily_price) }}
                        <p>{{ __('text.day') }}</p>
                    </span>
                </div>
            @endif


            @if (isset($car->deals) && count($car->deals) > 0)
                @php $deal_flag = 0 @endphp
                @php $counter = 0 @endphp
                @foreach ($car->deals as $car_deal_data)
                    @if ($car_deal_data->deal_type == 'monthly')
                        @php $deal_flag = 1 @endphp
                        <div class="rent_day rent_month">

                            <p>
                                <del>
                                    {{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                    {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}</del>
                                {!! '&nbsp;' !!}
                            </p>
                            <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                                {{ floor(Session::has('conversion_rate') ? $car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate') : $car_deal_data->pivot->connectedcar_value) }}
                                <p>{{ __('text.month') }}</p>
                            </span>

                        </div>
                    @break

                @else
                    @php $deal_flag = 0 @endphp
                @endif
            @endforeach
            @if ($deal_flag == 0)
                <div class="rent_day rent_month">
                    <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                        {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}
                        <p>{{ __('text.month') }}</p>
                    </span>
                </div>
            @endif
        @else
            <div class="rent_day rent_month">
                <span>{{ Session::has('currency') ? Session::get('currency') : 'AED' }}
                    {{ floor(Session::has('conversion_rate') ? $car->monthly_price * Session::get('conversion_rate') : $car->monthly_price) }}
                    <p>{{ __('text.month') }}</p>
                </span>
            </div>
        @endif

    </div>

        @if (!empty($car->car_specifications) && count($car->car_specifications))
            <ul class="car_facilities">
                @foreach ($car->car_specifications as $key => $car_specification)
                    @if ($key <= 2)
                        <li> {!! $car_specification->icon_html !!}
                            {{ $car_specification->specification_title }}</li>
                    @endif
                @endforeach
            </ul>
        @endif
    @if (!empty($car->car_rent_details))
        <div class="car_service">
            <ul>
                @foreach ($car->car_rent_details as $car_rent_detail)
                    @if ($car->translation)
                        <li>
                            <i class="fa-solid fa-circle-check rigth_icon"></i>
                            {{ $car_rent_detail->translation->rent_detail_text ?? '' }}
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="contact_info d-none d-md-flex">
    <a href="tel:{{ !empty($get_locale_contact_number) ? $get_locale_contact_number : '' }}"
        class="call"><img class="img-fluid"
            src="{{ asset('frontend/image/call_info.png') }}" alt="call info"></a>
    <a href="https://wa.me/{{ !empty($get_locale_whatsapp_number) ? $get_locale_whatsapp_number : '' }}?text={{ __('frontend.home.index.wa_text') }} {{ $car->translation->name ?? '' }}"
        target="_blank" class="whatsapp"><img class="img-fluid"
            src="{{ asset('frontend/image/whatsapp.png') }}" alt="whatsapp"></a>
    <a href="msg_send" data-id="{{ $car->id }}" data-bs-toggle="modal"
        data-bs-target="#message_send"
        class="book_now_fix msg_send">{{ __('text.book_now') }}</a>
</div>
</div>
</div>
</div>
@endforeach
@endif
</div>
</div>
</section>
@stop

@section('scripts')
{{-- <script>
    //get country code in hidden input
    $('.phonecode-dropdown').click(function() {
        $('#phone_country_code').val($(this).data('code'));
        $('.active_country').attr('src', $(this).data('image'));
    });
    $('.phonecode-dropdown-in').click(function() {
        $('#phone_country_code_in').val($(this).data('code'));
        $('.active_country_d').attr('src', $(this).data('image'));
        $('#phone_code_spn').text($(this).data('code'));
    });

  //car data get and display in model and modal open
  $(document).on("click", ".msg_send", function (event) {
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
                if (data.data['image'] != '') {
                    $("#message_send #car_image").attr('src', $("#message_send #car_image").data('path') + '/' + data.data['image'])
                }
                if (data.data['name'] != '') {
                    $("#message_send #car_title").text(data.data['name'])
                }
                $("#message_send #inquiry_id").val(data.data['id'])
                if (data.data['car_rent_details'].length != undefined) {
                    $.each(data.data['car_rent_details'], function (key, value) {
                        $("#message_send #car_rent_detail").append('<li> <i class="fa-solid fa-circle-check rigth_icon"></i>' + value + '</li>');
                    });
                }
            })
        });

</script> --}}
<script type="application/ld+json">
    @php
        $car_detail_schema = car_detail_schema($cars);
    @endphp

    @if(!empty($car_detail_schema))
        "<?php echo $car_detail_schema; ?>";
    @endif
</script>

@stop

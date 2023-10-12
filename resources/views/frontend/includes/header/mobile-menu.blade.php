@php

$settings = session()->get('settings');
if (session()->exists('header_quick_links')) {
    $header_quick_links = session()->get('header_quick_links');
}
$currentLocaleData = isset(config('global.language')[App::currentLocale()]) ? config('global.language')[App::currentLocale()] : [];
$currentLocaleImage = isset($currentLocaleData['image']) ? $currentLocaleData['image'] : null;
$currentLocaleTitle = isset($currentLocaleData['title']) ? $currentLocaleData['title'] : null;
$currentLocaleTitleText = isset($currentLocaleData["locale_title"]) ? $currentLocaleData["locale_title"] : null;


@endphp
 <!-- mobile view -->
 <div class="bg_color navbar_none_m ">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between flex-row-reverse py-3">

            <div class="support px-3">
                <div class="support_icon">
                        <img src="{{ asset('frontend/image/24-hours-support.webp') }}" class="lazy"
                            alt="" width="32" height="32">
                </div>
                <span class="font_service">24/7 <p>{{ __('text.service') }}</p> </span>
            </div>
            <div class="d-flex align-items-center flex-row-reverse justify-content-between ">
                @if (isset($settings['logo']))
                    <a href="{{ route('frontend.home') }}" aria-label="Friends Car Rental">
                            <img src="{{ asset('frontend/image/webp/' . explode('.',$settings['logo'])[0].'.webp') }}"
                                class="img-fluid lazy logo_max_width_200 mx-3" alt="" loading="lazy" width="200" height="62">
                    </a>
                @endif
                <button class="navbar-toggler" aria-label="navbar toggle" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                    aria-controls="offcanvasWithBothOptions">
                    <span class="navbar-toggler-icon-fix"></span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-start navbar_none_m" data-bs-scroll="true" tabindex="-1"
    id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        @if (isset($settings['logo']))
            <a href="{{ route('frontend.home') }}">
                    <img src="{{ asset('frontend/image/webp/' . explode('.',$settings['logo'])[0].'.webp') }}"
                        class="img-fluid lazy logo_max_width_fix" alt="" loading="lazy" width="200" height="32">
            </a>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="filter: invert(1);"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="navbar-nav">
            <div class="dropdown col-md-12 border_bottom_1" style="z-index: inherit;">
                <button
                    class="btn btn-secondary dropdown-toggle car_type_fix aed dropbtn nav-link text-uppercase text-start"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('text.car_types') }} <i
                        class="fa-solid fa-angle-down"></i>
                </button>

                <div class="dropdown-menu dropdown-menu min_width_fix_car_type_mobile px-3 mobile_position_fix">
                    @if (isset($car_types) && !empty($car_types))
                        <div class="row">
                            @foreach ($car_types as $index => $car_type)
                                @if (!empty($car_type) && $car_type != null)
                                    <div class="col-12 mb-2 position-relative px-0">
                                        <a href="{{ route('frontend.car_type_details', ['slug' => $car_type->slug]) }}"
                                            class="p-0 fix_img_cars">
                                            <img loading="lazy" class="img-fluid b_border_radius col_fix lazy"
                                                data-original="{{ asset('frontend/image/webp/' . explode('.',$car_type->image)[0].'.webp') }}"
                                                src="{{ asset('frontend/image/compress/' . explode('.',$car_type->image)[0].'.webp') }}"
                                                alt="{{ $car_type->translation->title ?? $car_type->title }}"
                                                >
                                            <div class="text_car_fix px-3">
                                                {{ strtoupper($car_type->translation->title ?? $car_type->title) }}
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="dropdown col-md-12 border_bottom_1" style="z-index: inherit;">
                <button
                    class="btn btn-secondary dropdown-toggle car_type_fix aed dropbtn nav-link text-uppercase text-start"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('text.car_brand') }} <i
                        class="fa-solid fa-angle-down"></i>
                </button>

                <div class="dropdown-menu dropdown-menu min_width_fix_cartype px-3 mobile_position_fix ">
                    @if (isset($car_brands) && !empty($car_brands))
                        <div class="row">
                            @foreach ($car_brands as $index => $car_brand)
                                @if (!empty($car_brand))
                                    <div class=" col-12 mb-3">
                                        <div class="text-center d-flex align-items-center">
                                            <a href="{{ route('frontend.car_brand_details', ['slug' => $car_brand->slug]) }}"
                                                class="d-flex justify-content-start align-items-center">
                                                <div class="brad_a">
                                                    <img class="img-fluid m_height_fix lazy"
                                                        data-original="{{ asset('frontend/image/webp/' .  explode('.',$car_brand->image)[0].'.webp') }}"
                                                        src="{{ asset('frontend/image/compress/' .  explode('.',$car_brand->image)[0].'.webp') }}"
                                                        alt="{{ $car_brand->translation? $car_brand->translation->title : "" }}" loading="lazy">
                                                </div>
                                                <div class="m_fix">
                                                    <p>{{ $car_brand->translation? $car_brand->translation->title : "" }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="dropdown border_bottom_1" style="z-index: 600;">
                <a class="btn btn-secondary dropdown-toggle car_type_fix aed dropbtn nav-link text-uppercase text-start"
                    href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('text.quick_links') }} <i class="fa-solid fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu dropdown_content_quick dropdown_quick_link mobile_position_fix mx-2 border-0 box-s"
                    aria-labelledby="dropdownMenuLink1">
                    @if (isset($header_quick_links) && !empty($header_quick_links))
                        @foreach ($header_quick_links as $index => $header_quick_link)
                            <a href="{{ $header_quick_link->val }}"
                                class="seven_quick_link text-uppercase">{{ $header_quick_link->name }}</a>
                        @endforeach
                    @endif
                </ul>
            </div>
        </ul>
        <div class="mx-3 mt-3">
            <div class="row mt-3 align-items-center padding_x_fix">
                <div class="dropdown col-md-6">
                    <button
                        class="btn btn-secondary dropdown-toggle uk d-flex align-items-center justify-content-between"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Session::has('currency'))
                            <img data-original="{{ asset('frontend/image/dollar.png') }}"
                                class="img-fluid lazy pr-15" width="32" height="32">{{ Session::get('currency') }}
                        @else
                            <img data-original="{{ asset('frontend/image/dollar.png') }}"
                                class="img-fluid lazy pr-15" width="32" height="32">{{ Session::put('currency', 'AED') }}
                            <img data-original="{{ asset('frontend/image/dollar.png') }}"
                                class="img-fluid lazy pr-15" width="32" height="32">{{ Session::get('currency') }}
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown_bg_fix dropdown_fix_aed">
                        @if (!empty($currencies))
                            @foreach ($currencies as $currency)
                                @if (Session::get('currency') == $currency['currency_code'])
                                    <li class="d-none"><a class="dropdown-item text-uppercase uk text-white"
                                            href="{{ route('currency.switch', $currency['currency_code']) }}">{{ $currency['currency_code'] }}</a>
                                    </li>
                                @elseif(Session::get('currency') != $currency['currency_code'])
                                    <li><a class="dropdown-item text-uppercase uk text-white"
                                            href="{{ route('currency.switch', $currency['currency_code']) }}">{{ $currency['currency_code'] }}</a>
                                    </li>
                                @else
                                    <li><a class="dropdown-item text-uppercase uk text-white"
                                            href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                                @endif
                            @endforeach
                        @endif
                        @if (Session::get('currency') == 'AED')
                            <li class="d-none"><a class="dropdown-item text-uppercase uk text-white"
                                    href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                        @else
                            <li><a class="dropdown-item text-uppercase uk text-white"
                                    href="{{ route('currency.switch', 'AED') }}">AED </a></li>
                        @endif

                    </ul>
                </div>
                <div class="dropdown col-md-6 pt-5" style="z-index: inherit;">
                    @if (!empty($currentLocaleImage))
                        <a class="btn dropdown-toggle border-0 text-uppercase uk px_uk_fix d-flex align-items-center justify-content-between"
                            href="{{ route('language.switch', 'en') }}" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div>
                                <img src="{{ asset('frontend/image/' . $currentLocaleImage) }}" alt=""
                                    class="pr-15 img-fluid" loading="lazy" width="32" height="32"> {{ $currentLocaleTitleText }}
                            </div>
                        </a>
                    @endif

                    <ul class="dropdown-menu dropdown_bg_fix dropdown_fix_multi"
                        data-popper-placement="bottom-start">
                        @if (!empty(config('global.language')))
                            @foreach (config('global.language') as $language)
                                @if ($currentLocaleTitle == $language['title'])
                                    <li><a class="dropdown-item text-uppercase uk text-white d-none"
                                            href="{{ route('language.switch', $language['code']) }}"><img
                                                src="{{ asset('frontend/image/' . $language['image']) }}"
                                                alt="" class="pr-15 img-fluid"
                                                loading="lazy" width="32" height="32">{{ $language['locale_title'] }}</a></li>
                                @else
                                    <li><a class="dropdown-item text-uppercase uk text-white"
                                            href="{{ route('language.switch', $language['code']) }}"><img
                                                src="{{ asset('frontend/image/' . $language['image']) }}"
                                                alt="" class="pr-15 img-fluid"
                                                loading="lazy" width="32" height="32">{{ $language['locale_title'] }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="text-black text-center get_the_app py-2">{{ __('text.get_the_app') }}</div>
            <div class="d-flex align-items-center justify-content-xs-center padding_gpay_icon">
                <div class="">
                    <a href="{{ isset($settings['apple_link']) ? $settings['apple_link'] : '' }}" target="_blank"
                        aria-label="apple_link">
                        <img src="{{ asset('frontend/image/apple-app-icon.png') }}" class="img-fluid"
                            alt="" loading="lazy" width="134" height="48"></a>
                </div>
                <div class="px-2">
                    <a href="{{ isset($settings['google_play_link']) ? $settings['google_play_link'] : '' }}"
                        aria-label="google_play_link" target="_blank"> <img
                            src="{{ asset('frontend/image/google-app-icon.png') }}" class="img-fluid"
                            alt="" loading="lazy" width="142" height="48"></a>
                </div>
            </div>
        </div>
    </div>
</div>

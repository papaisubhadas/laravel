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
<nav id="nav_bar" class="navbar navbar-expand-lg py-0 navbar_none">
    <div class="nav_container">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav new_navbar_nav">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('frontend.deals.get_deal_by_type', ['type' => 'daily']) }}">{{ __('text.deals') }}</a>
                </li>
                @if (isset($car_brands) && count($car_brands) > 0)
                <li class="nav-item cursor_pointer">
                    <div class="dropdown dropdown_list_fix">
                        <a href="{{ route('frontend.car_brands_list') }}"
                            class="dropbtn nav-link text-uppercase">{{ __('text.car_brand') }}</a>
                            <div class="dropdown-content min_width_fix p-3">
                                <div class="row pb-1">
                                    @foreach ($car_brands as $index => $car_brand)
                                        @if ($car_brand != null)
                                            <div class="col-auto {{ $index > 4 ? 'pt-3' : '' }}">
                                                <a class="text-center brad_fix py-3"
                                                    href="{{ route('frontend.car_brand_details', ['slug' => $car_brand->slug]) }}">
                                                    <img class="brand_img img-fluid pb-2 lazy"
                                                        src="{{ asset('frontend/image/compress/' .explode('.',$car_brand->image)[0].'.webp') }}"
                                                        data-original="{{ asset('frontend/image/webp/' .explode('.',$car_brand->image)[0].'.webp') }}"
                                                        alt="{{ $car_brand->translation ? $car_brand->translation->title : '' }}"
                                                        width="180" height="180" loading="lazy">
                                                    <p class="m_fix">
                                                        {{ $car_brand->translation ? $car_brand->translation->title : '' }}
                                                    </p>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </li>
                @endif
                <li class="nav-item cursor_pointer">
                    <div class="dropdown dropdown_list_fix">
                        <a href="{{ route('frontend.car_types_list') }}"
                            class="dropbtn nav-link text-uppercase">{{ __('text.car_types') }}</a>
                        @if (isset($car_types) && count($car_types) > 0)
                            <div class="dropdown-content min_width_fix p-3 pb-0">
                                <div class="row pb-1">
                                    @foreach ($car_types as $index => $car_type)
                                        @if ($car_type != null)
                                            <div class="col-auto col_fix position-relative">
                                                <a href="{{ route('frontend.car_type_details', ['slug' => $car_type->slug]) }}"
                                                    class=" fix_img_cars p-0">
                                                    <img class="img-fluid b_border_radius lazy"
                                                        src="{{ asset('frontend/image/compress/' .explode('.',$car_type->image)[0].'.webp') }}"
                                                        data-original="{{ asset('frontend/image/webp/' .explode('.',$car_type->image)[0].'.webp') }}"
                                                        alt="{{ $car_type->translation ? $car_type->translation->title : '' }}"
                                                        width="180" height="180" loading="lazy">
                                                </a>
                                                <span
                                                    class="text_car_fix">{{ $car_type->translation ? $car_type->translation->title : '' }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase"
                        href="{{ url(App::currentLocale() . '/pages/rental-policy') }}">{{ __('text.rental_policy') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase"
                        href="{{ route('frontend.posts.blogs') }}">{{ __('text.blog') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase"
                        href="{{ route('frontend.contact-us') }}">{{ __('text.contact_us') }}</a>
                </li>
                <li class="nav-item cursor_pointer">
                    <div class="dropdown dropdown_list_fix">
                        <a href="#" class="dropbtn nav-link text-uppercase">{{ __('text.quick_links') }}</a>
                        <div class="dropdown-content dropdown_content_fix py-3">
                            @if (isset($header_quick_links) && !empty($header_quick_links))
                                @foreach ($header_quick_links as $index => $header_quick_link)
                                    <a href="{{ $header_quick_link->val }}"
                                        class="seven_quick_link text-uppercase">{{ $header_quick_link->name }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

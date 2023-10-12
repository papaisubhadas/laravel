<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- google analytics meta --}}
<meta name="google-site-verification" content="gC3Ly4PEDtZb77M2Y30Aj-WFDKRgzNzv7YbV1SzKbJM" />

{{--  facebook verification meta  --}}
<meta name="facebook-domain-verification" content="megvnbyzynh9grbrlo9h75pcxnwxys" />
<meta name="p:domain_verify" content="47015de81e3a57f0141927739af5578a"/>

<meta name="robots" content="index, follow" />

@if (
    !empty(request()->route()) &&
        (request()->route()->getName() == 'frontend.index' ||
            request()->route()->getName() == 'frontend.home'))
    <title>{{ isset($settings_common['meta_name']) ? $settings_common['meta_name']->val : '' }}</title>
    <meta name="keywords"
        content="{{ isset($settings_common['meta_keyword']) ? $settings_common['meta_keyword']->val : '' }}">
    <meta name="description"
        content="{{ isset($settings_common['meta_desciption']) ? $settings_common['meta_desciption']->val : '' }}">

    <meta name="og:image"
        content="{{ isset($settings_common['feature_image']) ? asset('frontend/image'.'/'.$settings_common['feature_image']->val) : '' }}">
@else
    <title> @yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta name="twitter:title" content="@yield('meta_title')" />
    <meta name="twitter:description" content="@yield('meta_description')" />

    @yield('metadata')

@endif
<link rel="canonical" href="{{ Request::url() }}" />
<link rel="icon" type="image/png" href="{{ asset('frontend/image/web-favicon.png') }}" defer>

@vite(['public/frontend.css'])

<style>
    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_service {
        padding: 0;
        margin-bottom: 0;
    }



    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_service li {
        display: flex;
        ;
        align-items: center;
        ;
        list-style: none;
        color: #000;
        line-height: 32px;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis
    }


    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_service li .rigth_icon {
        padding-right: 15px;
        color: var(--pur-golden);
        font-size: 18px;
        padding-left: 2px;
    }



    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_facilities {
        min-height: 70px;
        margin-bottom: 0;
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center
    }

    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_facilities li {
        display: flex;
        align-items: center;
        list-style: none;
        line-height: 14px;
        font-size: 14px;
        font-weight: 500;
        color: var(--dark)
    }

    .most_rent_car_list .most_rent_car .most_rent_car_details .car_full_details .car_facilities li img {
        padding-right: 10px;
        width: auto
    }

    .car_brand .car_brand_items .car_name .car_brand_img {
        height: 60px !important;
        width: auto !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 8px auto !important;
    }
</style>

@if (App::currentLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('frontend/css/ar-style.css?time='.time()) }}">
@endif

@yield('styles')


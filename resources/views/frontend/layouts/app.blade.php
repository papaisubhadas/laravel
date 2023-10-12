
@php
    session()->forget('settings_common');
    if (session()->exists('settings_common')) {
        $settings_common = session()->get('settings_common');
    } else {
        $all_settings = \App\Models\Setting::with(["translation"])->get(["id", "type", "section"]);

        /* settings */
        $settings = $all_settings->where('section', 'header')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        session()->put('settings', $settings);
        /* settings_footer */
        $settings_footer = $all_settings->where('section', 'footer')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            if($data->type == 'address'){
                return [$data->translation->name => $data];
            }
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        session()->put('settings_footer', $settings_footer);

        /* settings_contact */
        $settings_contact = $all_settings->where('section', 'contact_us')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            if($data->type == 'address'){
                return [$data->translation->name => $data];
            }
            return [$data->translation->name => $data->translation->val ?? $data->val];
        });
        session()->put('settings_contact', $settings_contact);

        /* settings_whatsapp */
        $settings_whatsapp = $all_settings->where('section', 'whatsapp_section')->where('type', 'whatsapp_number')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data];
        });
        session()->put('settings_whatsapp', $settings_whatsapp);

        /* settings_common */
        $settings_common = $all_settings->where('section', 'common')->mapWithKeys(function($data){
            $data->translation = !$data->translation ? $data->translations[0] : $data->translation;
            return [$data->translation->name => $data];
        });
        session()->put('settings_common', $settings_common);

        /* footer_sec_one_quick_links */
        $footer_sec_one_quick_links = $all_settings->where('section', 'footer')->where('type', 'sec_one_q_link');
        session()->put('footer_sec_one_quick_links', $footer_sec_one_quick_links);

        /* footer_sec_sec_quick_links */
        $footer_sec_sec_quick_links = $all_settings->where('section', 'footer')->where('type', 'sec_second_q_link');
        session()->put('footer_sec_sec_quick_links', $footer_sec_sec_quick_links);

        /* header_quick_links */
        $header_quick_links = $all_settings->where('section', 'header')->where('type', 'quick_link');
        session()->put('header_quick_links', $header_quick_links);
    }
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('frontend.includes.head')

    <style>
        .carousel-caption, .email_info,.offer_section .new_title  ,.fill_inquiries{
            min-width: fit-content !important;
            min-height: fit-content !important;
        }

        .slider-image{
            max-width: 100%;
            height: auto;
        }
        .car_category { padding: 15px 0; }


        .slider-wrapper-image{
            width:100%;
            height:100%;
        }


        @media screen and (max-width: 425px) {
             .slider-wrapper-image{
                width:100%;
                height:100%;
            }

            div.dropdown > a.btn > div > img.pr-15{
                width : 32px;
                height: 32px;
            }
        }
    </style>
</head>

<body id="body" style="overflow-x: hidden;" @if(App::currentLocale() == 'ar') dir="rtl" @else dir="ltr" @endif>

@include('frontend.includes.header')

@yield('content')

@include('frontend.includes.footer')

@include('frontend.includes.script')

</body>
</html>

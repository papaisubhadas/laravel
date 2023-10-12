@extends('backend.layouts.app')

@section('title') {{ $module_action }} {{ $module_title }} @endsection

@section('breadcrumbs')
    <x-backend-breadcrumbs>
        <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ $module_title }}</x-backend-breadcrumb-item>
    </x-backend-breadcrumbs>
@endsection

@section('content')
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

        @import url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css');
        .sortable {
            padding: 0;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .sortable li {
            float: left;
            width: 120px;
            height: 120px;
            overflow:hidden;
            border:1px solid red;
            text-align: center;
            margin:5px;
        }
        li.sortable-placeholder {
            border: 1px dashed #CCC;
            background: none;
        }
    </style>

    <div class="card">
        <div class="card-body">

            <x-backend.section-header>
                <i class="{{ $module_icon }}"></i> {{ $module_title }} <small class="text-muted">{{ $module_action }}</small>

                <x-slot name="subtitle">
                    {{ __('settings.settings') }} {{__('common.sub_title')}}
                    {{-- @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)]) --}}
                </x-slot>
                <x-slot name="toolbar">
                    <x-backend.buttons.return-back />
                </x-slot>
            </x-backend.section-header>

            <hr>

            <div class="row mt-4">
                <div class="col">
                    <form method="post" action="{{ route('backend.settings.store') }}" class="form-horizontal ajaxifyForm" role="form">
                        {!! csrf_field() !!}

                        <div class="tabs_c tabs_c1">
                            <ul class="tabs_c-list">
                                <li class="active inner-tab"><a href="#general_en">EN</a></li>
                                <li class="inner-tab"><a href="#general_ar">AR</a></li>
                                <li class="inner-tab"><a href="#general_fr">FR</a></li>
                                <li class="inner-tab"><a href="#general_ru">RU</a></li>
                            </ul>
                            <div id="general_en" class="tab active inner-tab-cont">
                                <br/>
                                {{--HEADER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.header') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.header_detail') }}</p>

                                        @php
                                            $header_data =  \App\Models\Setting::where('section', 'header')->where('is_only_english', 'yes')->get();
                                            foreach ($header_data as $data) {
                                                if($data->translate('en')) {
                                                    if($data->type == 'image') {
                                                        $header_image = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'email') {
                                                        $header_email = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'facebook_url') !== false) {
                                                        $header_facebook_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'instagram_url') !== false) {
                                                        $header_instagram_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'snapchat_url') !== false) {
                                                        $header_snapchat_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'youtube_url') !== false) {
                                                        $header_youtube_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'linkedin_url') !== false) {
                                                        $header_linkedin_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'social_link' && strpos($data->translate('en')->name, 'twitter_url') !== false) {
                                                        $header_twitter_url = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'apple_link' && strpos($data->translate('en')->name, 'apple_link') !== false) {
                                                        $header_apple_link = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'apple_image' && strpos($data->translate('en')->name, 'apple_image') !== false) {
                                                        $header_apple_image = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'google_play_link' && strpos($data->translate('en')->name, 'google_play_link') !== false) {
                                                        $header_google_play_link = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'google_play_image' && strpos($data->translate('en')->name, 'google_play_image') !== false) {
                                                        $header_google_play_image = $data->translate('en')->val;
                                                    }
                                                }
                                                $quick_links =  \App\Models\Setting::where('section', 'header')->where('type', 'quick_link')->get();
                                                $sec_one_q_links =  \App\Models\Setting::where('section', 'footer')->where('type', 'sec_one_q_link')->get();
                                                $sec_second_q_links =  \App\Models\Setting::where('section', 'footer')->where('type', 'sec_second_q_link')->get();
                                            }
                                        @endphp
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label class="form-label" for="images"><strong>{{ __('settings.logo') }}</strong></label><span class="text-danger">*</span>
                                                    <input type="file" name="logo_en"  class="form-control logo" placeholder="{{ __('settings.choose_logo') }}">
                                                    <br/>
                                                    @if(isset($header_image) && $header_image != '')
                                                        <img src="{{ url("frontend/image/$header_image") }}" width="150" />
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="email" class="form-label"> <strong>{{ __('settings.email') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="email_en" value="{{ (isset($header_email) && $header_email != '') ? $header_email : '' }}" class="form-control  " id="email" placeholder="{{ __('settings.email') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="facebook_url" class="form-label"> <strong>{{ __('settings.facebook_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="facebook_url_en" value="{{ (isset($header_facebook_url) && $header_facebook_url != '') ? $header_facebook_url : '' }}" class="form-control  " id="facebook_url" placeholder="{{ __('settings.facebook_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="instagram_url" class="form-label"> <strong>{{ __('settings.instagram_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="instagram_url_en" value="{{ (isset($header_instagram_url) && $header_instagram_url != '') ? $header_instagram_url : '' }}" class="form-control  " id="instagram_url" placeholder="{{ __('settings.instagram_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="snapchat_url" class="form-label"> <strong>{{ __('settings.snapchat_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="snapchat_url_en" value="{{ (isset($header_snapchat_url) && $header_snapchat_url != '') ? $header_snapchat_url : '' }}" class="form-control  " id="snapchat_url" placeholder="{{ __('settings.snapchat_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="youtube_url" class="form-label"> <strong>{{ __('settings.youtube_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="youtube_url_en" value="{{ (isset($header_youtube_url) && $header_youtube_url != '') ? $header_youtube_url : '' }}" class="form-control  " id="youtube_url" placeholder="{{ __('settings.youtube_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="linkedin_url" class="form-label"> <strong>{{ __('settings.linkedin_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="linkedin_url_en" value="{{ (isset($header_linkedin_url) && $header_linkedin_url != '') ? $header_linkedin_url : '' }}" class="form-control  " id="linkedin_url" placeholder="{{ __('settings.linkedin_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="twitter_url" class="form-label"> <strong>{{ __('settings.twitter_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="twitter_url_en" value="{{ (isset($header_twitter_url) && $header_twitter_url != '') ? $header_twitter_url : '' }}" class="form-control  " id="twitter_url" placeholder="{{ __('settings.twitter_url') }}">
                                                </div>
                                                <div class="row ">
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label for="apple_link" class="form-label"> <strong>{{ __('settings.apple_link') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                            <input type="text" name="apple_link_en" value="{{ (isset($header_apple_link) && $header_apple_link != '') ? $header_apple_link : '' }}" class="form-control  " id="apple_link" placeholder="{{ __('settings.apple_link') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label class="form-label" for="apple_image"><strong>{{ __('settings.apple_image') }}</strong></label><span class="text-danger">*</span>
                                                            <input type="file" name="apple_image_en"  class="form-control logo" placeholder="{{ __('settings.choose_apple_image') }}"  >
                                                            <br/>
                                                            @if(isset($header_apple_image) && $header_apple_image != '')
                                                                <img src="{{ url("frontend/image/$header_apple_image") }}" width="150" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label for="google_play_link" class="form-label"> <strong>{{ __('settings.google_play_link') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                            <input type="text" name="google_play_link_en" value="{{ (isset($header_google_play_link) && $header_google_play_link != '') ? $header_google_play_link : '' }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.google_play_link') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label class="form-label" for="google_play_image"><strong>{{ __('settings.google_play_image') }}</strong></label><span class="text-danger">*</span>
                                                            <input type="file" name="google_play_image_en"  class="form-control logo" placeholder="{{ __('settings.choose_google_play_image') }}"  >
                                                            <br/>
                                                            @if(isset($header_google_play_image) && $header_google_play_image != '')
                                                                <img src="{{ url("frontend/image/$header_google_play_image") }}" width="150" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.quick_link') }}</p>
                                                <input type="hidden" name="delete_quick_link_id" class="delete_quick_link_id" value="">
                                                <div class="quick_links_block ">
                                                    @if(count($quick_links) > 0)
                                                        @foreach($quick_links as $index=>$quick_link)
                                                            @if($quick_link->translate('en'))
                                                                <input type="hidden" name="quick_link_id_en[{{$index}}]" class="quick_link_id" value="{{ ($quick_link != NULL) ? $quick_link->id : ''}}">
                                                                <div class="row quick_links_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_quick_link_en[{{$index}}]" value="{{ $quick_link->translate('en')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_quick_link_en[{{$index}}]" value="{{ $quick_link->translate('en')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $quick_link->id }}" data-deleteid="delete_quick_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn quick_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_quick_link" data-name="name_quick_link_en" data-val="val_quick_link_en" data-locale="en" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- FOOTER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.footer') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.footer_detail') }}</p>

                                        @php
                                            $footer_data =  \App\Models\Setting::where('section', 'footer')->where('is_only_english', 'yes')->get();
                                            foreach ($footer_data as $data) {
                                            if($data->translate('en')) {
                                                if($data->type == 'image') {
                                                    $footer_image = $data->translate('en')->val;
                                                }
                                                if($data->type == 'email') {
                                                    $footer_email = $data->translate('en')->val;
                                                }
                                                if($data->type == 'phone_no') {
                                                    $footer_phone_no = $data->translate('en')->val;
                                                }
                                                if($data->type == 'map' && strpos($data->translate('en')->name, 'embeded_map_url') !== false) {
                                                    $footer_embeded_map_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'facebook_url') !== false) {
                                                    $footer_facebook_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'instagram_url') !== false) {
                                                    $footer_instagram_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'snapchat_url') !== false) {
                                                    $footer_snapchat_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'youtube_url') !== false) {
                                                    $footer_youtube_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'linkedin_url') !== false) {
                                                    $footer_linkedin_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'social_link' && strpos($data->translate('en')->name, 'twitter_url') !== false) {
                                                    $footer_twitter_url = $data->translate('en')->val;
                                                }
                                                if($data->type == 'apple_link' && strpos($data->translate('en')->name, 'apple_link') !== false) {
                                                    $footer_apple_link = $data->translate('en')->val;
                                                }
                                                if($data->type == 'apple_image' && strpos($data->translate('en')->name, 'apple_image') !== false) {
                                                    $footer_apple_image = $data->translate('en')->val;
                                                }
                                                if($data->type == 'google_play_link' && strpos($data->translate('en')->name, 'google_play_link') !== false) {
                                                    $footer_google_play_link = $data->translate('en')->val;
                                                }
                                                if($data->type == 'google_play_image' && strpos($data->translate('en')->name, 'google_play_image') !== false) {
                                                    $footer_google_play_image = $data->translate('en')->val;
                                                }
    }
                                            }
                                            $footer_data_all_lang =  \App\Models\Setting::where('section', 'footer')->where('is_only_english', 'no')->get();
                                            foreach ($footer_data_all_lang as $data) {
                                                if($data->translate('en')) {
                                                    if($data->type == 'address' && strpos($data->translate('en')->name, 'address') !== false) {
                                                        $footer_address = $data;
                                                    }
                                                }
                                            }
                                        @endphp
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label class="form-label" for="images"><strong>{{ __('settings.logo') }}</strong></label><span class="text-danger">*</span>
                                                    <input type="file" name="logo_footer_en"  class="form-control logo" placeholder="{{ __('settings.choose_logo') }}"  >
                                                    <br/>
                                                    @if(isset($footer_image) && $footer_image != '')
                                                        <img src="{{ url("frontend/image/$footer_image") }}" width="150" />
                                                    @endif
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="email" class="form-label"> <strong>{{ __('settings.email') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="email_footer_en" value="{{ (isset($footer_email) && $footer_email != '') ? $footer_email : '' }}" class="form-control  " id="email" placeholder="{{ __('settings.email') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="phone_no" class="form-label"> <strong>{{ __('settings.phone_no') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="phone_no_footer_en" value="{{ (isset($footer_phone_no) && $footer_phone_no != '') ? $footer_phone_no : '' }}" class="form-control  " id="phone_no" placeholder="{{ __('settings.phone_no') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_footer_en" value="{{ (isset($footer_address) && $footer_address->translate('en')) ? $footer_address->translate('en')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}<">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="embeded_map_url_footer_en" class="form-label"> <strong>{{ __('settings.embededmap_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="embeded_map_url_footer_en" value="{{ (isset($footer_embeded_map_url) && $footer_embeded_map_url != '') ? $footer_embeded_map_url : '' }}" class="form-control  " id="embeded_map_url" placeholder="{{ __('settings.embededmap_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="facebook_url" class="form-label"> <strong>{{ __('settings.facebook_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="facebook_url_footer_en" value="{{ (isset($header_facebook_url) && $header_facebook_url != '') ? $header_facebook_url : '' }}" class="form-control  " id="facebook_url" placeholder="{{ __('settings.facebook_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="instagram_url" class="form-label"> <strong>{{ __('settings.instagram_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="instagram_url_footer_en" value="{{ (isset($footer_instagram_url) && $footer_instagram_url != '') ? $footer_instagram_url : '' }}" class="form-control  " id="instagram_url" placeholder="{{ __('settings.instagram_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="snapchat_url" class="form-label"> <strong>{{ __('settings.snapchat_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="snapchat_url_footer_en" value="{{ (isset($footer_snapchat_url) && $footer_snapchat_url != '') ? $footer_snapchat_url : '' }}" class="form-control  " id="snapchat_url" placeholder="{{ __('settings.snapchat_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="youtube_url" class="form-label"> <strong>{{ __('settings.youtube_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="youtube_url_footer_en" value="{{ (isset($footer_youtube_url) && $footer_youtube_url != '') ? $footer_youtube_url : '' }}" class="form-control  " id="youtube_url" placeholder="{{ __('settings.youtube_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="linkedin_url" class="form-label"> <strong>{{ __('settings.linkedin_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="linkedin_url_footer_en" value="{{ (isset($footer_linkedin_url) && $footer_linkedin_url != '') ? $footer_linkedin_url : '' }}" class="form-control  " id="linkedin_url" placeholder="{{ __('settings.linkedin_url') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="twitter_url" class="form-label"> <strong>{{ __('settings.twitter_url') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="twitter_url_footer_en" value="{{ (isset($footer_twitter_url) && $footer_twitter_url != '') ? $footer_twitter_url : '' }}" class="form-control  " id="twitter_url" placeholder="{{ __('settings.twitter_url') }}">
                                                </div>
                                                <div class="row ">
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label for="apple_link" class="form-label"> <strong>{{ __('settings.apple_link') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                            <input type="text" name="apple_link_footer_en" value="{{ (isset($footer_apple_link) && $footer_apple_link != '') ? $footer_apple_link : '' }}" class="form-control  " id="apple_link" placeholder="{{ __('settings.apple_link') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label class="form-label" for="apple_image"><strong>{{ __('settings.apple_image') }}</strong></label><span class="text-danger">*</span>
                                                            <input type="file" name="apple_image_footer_en"  class="form-control logo" placeholder="{{ __('settings.choose_apple_image') }}"  >
                                                            <br/>
                                                            @if(isset($footer_apple_image) && $footer_apple_image != '')
                                                                <img src="{{ url("frontend/image/$footer_apple_image") }}" width="150" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label for="google_play_link" class="form-label"> <strong>{{ __('settings.google_play_link') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                            <input type="text" name="google_play_link_footer_en" value="{{ (isset($footer_google_play_link) && $footer_google_play_link != '') ? $footer_google_play_link : '' }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.google_play_link') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-6 col-sm-12 ">
                                                        <div class="form-group mb-3 ">
                                                            <label class="form-label" for="google_play_image"><strong>{{ __('settings.google_play_image') }}</strong></label><span class="text-danger">*</span>
                                                            <input type="file" name="google_play_image_footer_en"  class="form-control logo" placeholder="{{ __('settings.choose_google_play_image') }}"  >
                                                            <br/>
                                                            @if(isset($footer_google_play_image) && $footer_google_play_image != '')
                                                                <img src="{{ url("frontend/image/$footer_google_play_image") }}" width="150" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.first_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_one_q_link_id" class="delete_sec_one_q_link_id" value="">
                                                <div class="sec_one_q_link_block ">
                                                    @if(count($sec_one_q_links) > 0)
                                                        @foreach($sec_one_q_links as $index=>$sec_one_q_link)
                                                            @if($sec_one_q_link->translate('en'))
                                                                <input type="hidden" name="sec_one_q_link_id_en[{{$index}}]" class="sec_one_q_link_id_en" value="{{ ($sec_one_q_link != NULL) ? $sec_one_q_link->id : ''}}">
                                                                <div class="row sec_one_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_one_q_link_en[{{$index}}]" value="{{ $sec_one_q_link->translate('en')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_one_q_link_en[{{$index}}]" value="{{ $sec_one_q_link->translate('en')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_one_q_link->id }}" data-deleteid="delete_sec_one_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_one_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_one_q_link" data-name="name_sec_one_q_link_en" data-val="val_sec_one_q_link_en" data-locale="en" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.second_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_second_q_link_id" class="delete_sec_second_q_link_id" value="">
                                                <div class="sec_second_q_link_block ">
                                                    @if(count($sec_second_q_links) > 0)
                                                        @foreach($sec_second_q_links as $index=>$sec_second_q_link)
                                                            @if($sec_second_q_link->translate('en'))
                                                                <input type="hidden" name="sec_second_q_link_id_en[{{$index}}]" class="sec_second_q_link_id_en" value="{{ ($sec_second_q_link != NULL) ? $sec_second_q_link->id : ''}}">
                                                                <div class="row sec_second_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_second_q_link_en[{{$index}}]" value="{{ $sec_second_q_link->translate('en')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_second_q_link_en[{{$index}}]" value="{{ $sec_second_q_link->translate('en')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_second_q_link->id }}" data-deleteid="delete_sec_second_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_second_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_second_q_link" data-name="name_sec_second_q_link_en" data-val="val_sec_second_q_link_en" data-locale="en" id="add_sec_second_q_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTACT US--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.contact_us') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.contact_detail') }}.</p>

                                        @php
                                            $contact_data =  \App\Models\Setting::where('section', 'contact_us')->where('is_only_english', 'yes')->get();
                                            foreach ($contact_data as $data) {
                                                if($data->translate('en')){
                                                    if($data->type == 'email') {
                                                        $contact_email = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'phone_no') {
                                                        $contact_phone_no = $data->translate('en')->val;
                                                    }
                                                    if($data->type == 'map') {
                                                        $contact_embeded_map_url = $data->translate('en')->val;
                                                    }
                                                }
                                            }
                                            $contact_data_all_lang =  \App\Models\Setting::where('section', 'contact_us')->where('is_only_english', 'no')->get();
                                            foreach ($contact_data_all_lang as $data) {
                                                if($data->type == 'address'  && $data->translate('en') && strpos($data->translate('en')->name, 'address') !== false) {
                                                    $contact_address = $data;
                                                }
                                            }
                                            $whatsapp_number_all_lang =  \App\Models\Setting::where('section', 'whatsapp_section')->where('is_only_english', 'no')->get();
                                            foreach ($whatsapp_number_all_lang as $data) {
                                                if($data->type == 'whatsapp_number'  && $data->translate('en') && strpos($data->translate('en')->name, 'whatsapp_number') !== false) {
                                                    $whatsapp_no = $data;

                                                }
                                            }
                                            $custom_css =  \App\Models\Setting::where('section', 'custom_code_section')->where('is_only_english', 'yes')->get();
                                                if($data->type == 'whatsapp_number'  && $data->translate('en') && strpos($data->translate('en')->name, 'custom_css') !== false) {
                                                    $custom_css = $data;

                                                }
                                        @endphp

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> ({{ __('settings.address1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_contact_en" value="{{ (isset($contact_address) && $contact_address->translate('en')) ? $contact_address->translate('en')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">

                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="phone_no" class="form-label"> <strong>{{ __('settings.phone_number') }}</strong> ({{ __('settings.phone_number1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="phone_no_contact_en" value="{{ (isset($contact_phone_no) && $contact_phone_no != '') ? $contact_phone_no : '' }}" class="form-control  " id="phone_no" placeholder="{{ __('settings.phone_number') }}">

                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="embeded_map_url" class="form-label"> <strong>{{ __('settings.map') }}</strong> ({{ __('settings.embeded_map_url') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="embeded_map_url_contact_en" value="{{ (isset($contact_embeded_map_url) && $contact_embeded_map_url != '') ? $contact_embeded_map_url : '' }}" class="form-control  " id="embeded_map_url" placeholder="{{ __('settings.map') }}">

                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="admin_email" class="form-label"> <strong>{{ __('settings.admin_email') }}</strong> ({{ __('settings.admin_email1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="email" name="email_contact_en" value="{{ (isset($contact_email) && $contact_email != '') ? $contact_email : '' }}" class="form-control  " id="admin_email" placeholder="{{ __('settings.admin_email') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 {{-- Whatsapp Number--}}
                                 <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fa-brands fa-whatsapp wp_icon"></i>
                                        {{ __('settings.whatsapp_chat') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.whatsapp_no') }}.</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="phone_no" class="form-label"> <strong>{{ __('settings.whatsapp_no') }}</strong> ({{ __('settings.whatsapp_no1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="whatsapp_no_whatsapp_section_en" value="{{ (isset($whatsapp_no) && $whatsapp_no->translate('en')) ? $whatsapp_no->translate('en')->val : '' }}" class="form-control  " id="whatsapp_no" placeholder="{{ __('settings.whatsapp_no') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- META DETAIL--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-globe-asia"></i>
                                        {{ __('settings.meta') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.application_meta_data') }}</p>

                                        @php
                                            $meta_name =  \App\Models\Setting::where('section', 'common')->where('type', 'meta_name')->first();
                                            $meta_description =  \App\Models\Setting::where('section', 'common')->where('type', 'meta_desciption')->first();
                                            $meta_keyword =  \App\Models\Setting::where('section', 'common')->where('type', 'meta_keyword')->first();
                                            $feature_image = \App\Models\Setting::where('section', 'common')->where('type', 'feature_image')->first();
                                        @endphp


                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_site_name" class="form-label"> <strong>{{ __('settings.meta_site_name') }}</strong> ({{ __('settings.meta_site_name1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_name_common_en" value="{{ (isset($meta_name) && $meta_name->translate('en')) ? $meta_name->translate('en')->val : '' }}" class="form-control  " id="meta_site_name" placeholder="{{ __('settings.meta_site_name') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_description" class="form-label"> <strong>{{ __('settings.meta_description') }}</strong> ({{ __('settings.meta_description1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_desciption_common_en" value="{{ (isset($meta_description) && $meta_description->translate('en')) ? $meta_description->translate('en')->val : '' }}" class="form-control  " id="meta_description" placeholder="{{ __('settings.meta_description') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_keyword" class="form-label"> <strong>{{ __('settings.meta_keyword') }}</strong> ({{ __('settings.meta_keyword1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_keyword_common_en" value="{{ (isset($meta_keyword) && $meta_keyword->translate('en')) ? $meta_keyword->translate('en')->val : '' }}" class="form-control  " id="meta_keyword" placeholder="{{ __('settings.meta_keyword') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label class="form-label" for="images"><strong>{{ __('settings.feature_img') }}</strong></label><span class="text-danger"></span>
                                                    <input type="file" name="feature_img_common_en"  class="form-control feature_img" placeholder="{{ __('settings.feature_img') }}">
                                                    <br/>
                                                    <input type="hidden" name="delete_feature_image" class="delete_feature_image" value="">
                                                    @php
                                                        $feature_img ='';
                                                        if(!empty($feature_image->val)){
                                                            $feature_img = $feature_image->translate('en')->val;
                                                        }
                                                    @endphp
                                                    @if(isset($feature_img) && $feature_img != '')
                                                    <div class="pip"  id="image_{{ $feature_image->id}}"  style="float: left;position: relative;">
                                                        <img class="imageThumb ml10" src="{{ url("frontend/image/$feature_img") }}" width="150" alt="{{ $feature_image->id }}">
                                                        <br/><span class="remove"   data-id="{{ $feature_image->id }}" data-deleteid="delete_feature_image" data-exist="true" style="position: absolute;right:0px;top:-4px;"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                                                    </div>

                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--Google Analytics--}}
                                @php
                                $google_analytic =  \App\Models\Setting::where('section', 'google_analytics')->where('is_only_english', 'yes')->where('type','google_analytic')->first();
                                @endphp
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-line"></i>
                                        {{ __('settings.analytics') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.application_analytics') }}</p>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="phone_no" class="form-label"> <strong>{{ __('settings.google_analytics') }}</strong> ({{ __('settings.google_analytic') }})</label> <span class="text-danger"> <strong></strong> </span>
                                                    <input type="text" name="google_analytics_section_en" value="{{!empty($google_analytic->val) ? $google_analytic->translate('en')->val : '' }}" class="form-control  " id="google_analytic" placeholder="{{ __('settings.paste_id_google') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{--custom_css--}}
                            @php
                                $custom_css =  \App\Models\Setting::where('section', 'custom_code')->where('is_only_english', 'yes')->where('type','custom_css')->first();
                                $custom_js =  \App\Models\Setting::where('section', 'custom_code')->where('is_only_english', 'yes')->where('type','custom_js')->first();
                            @endphp
                             <div class="card card-accent-primary mb-4">
                                <div class="card-header">
                                    <i class="fa-solid fa-file-code"></i>
                                    {{ __('settings.custom_code') }}
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">{{ __('settings.custom_code_area') }}</p>
                                    <div class="row mb-3">
                                        <p><strong>{{__('article-page.note')}}</strong>{{__('settings.custom_css_note')}} <strong>{{__('settings.style')}}</strong>{{__('settings.custom_css_note1')}}</p>
                                        <div class="col">
                                            <div class="form-group mb-3 ">
                                                <label for="phone_no" class="form-label"> <strong>{{ __('settings.custom_css_code') }}</strong> ({{ __('settings.custom_css_block') }})</label> <span class="text-danger"> <strong></strong> </span>
                                                <textarea type="text" name="custom_css_custom_code_section_en" value="{{!empty($custom_css->val) ? $custom_css->translate('en')->val : '' }}" class="form-control  " id="custom_css" placeholder="{{ __('settings.paste_the_code_in_this_field') }}" style="height: 140px;">{{!empty($custom_css->val) ? $custom_css->translate('en')->val : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <p><strong>{{__('article-page.note')}}</strong>{{__('settings.custom_js_note')}} <strong>{{__('settings.script')}}</strong>{{__('settings.custom_js_note1')}}</p>
                                        <div class="col">
                                            <div class="form-group mb-3 ">
                                                <label for="phone_no" class="form-label"> <strong>{{ __('settings.custom_js_code') }}</strong> ({{ __('settings.custom_js_block') }})</label> <span class="text-danger"> <strong></strong> </span>
                                                <textarea type="text" name="custom_js_custom_code_section_en" value="{{!empty($custom_js->val) ? $custom_js->translate('en')->val : '' }}" class="form-control  " id="custom_js" placeholder="{{ __('settings.paste_the_code_in_this_field') }}" style="height: 140px;">{{!empty($custom_js->val) ? $custom_js->translate('en')->val : '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div id="general_ar" class="tab inner-tab-cont">
                                <br/>
                                {{--HEADER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.header') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.header_detail') }}</p>

                                        <div class="row mb-3">
                                            <hr>
                                            <p class="text-muted">{{ __('settings.quick_link') }}</p>
                                            {{-- <input type="hidden" name="delete_quick_link_id" class="delete_quick_link_id" value="">--}}
                                            <div class="quick_links_block ">
                                                @if(count($quick_links) > 0)
                                                    @foreach($quick_links as $index=>$quick_link)
                                                        @if($quick_link->translate('ar'))
                                                            <input type="hidden" name="quick_link_id_ar[{{$index}}]" class="quick_link_id" value="{{ ($quick_link != NULL) ? $quick_link->id : ''}}">
                                                            <div class="row quick_links_block_in" data-fe_en = "{{$index}}">
                                                                <div class="col-11 col-sm-11  ">
                                                                    <div class="row ">
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="name_quick_link_ar[{{$index}}]" value="{{ $quick_link->translate('ar')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_name') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="val_quick_link_ar[{{$index}}]" value="{{ $quick_link->translate('ar')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_value') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 text-center">
                                                                    <br>
                                                                    @if($index != 0)
                                                                        <i data-id="{{ $quick_link->id }}" data-deleteid="delete_quick_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn quick_link_close_btn"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <br>
                                            <button style="width:auto;" class="btn btn-danger ms-1 add_quick_link" data-name="name_quick_link_ar" data-val="val_quick_link_ar" data-locale="ar" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- FOOTER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.footer') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted"> {{ __('settings.footer_detail') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_footer_ar" value="{{ (isset($footer_address) && $footer_address->translate('ar')) ? $footer_address->translate('ar')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">
                                                </div>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.first_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_one_q_link_id" class="delete_sec_one_q_link_id" value="">
                                                <div class="sec_one_q_link_block ">
                                                    @if(count($sec_one_q_links) > 0)
                                                        @foreach($sec_one_q_links as $index=>$sec_one_q_link)
                                                            @if($sec_one_q_link->translate('ar'))
                                                                <input type="hidden" name="sec_one_q_link_id_ar[{{$index}}]" class="sec_one_q_link_id_ar" value="{{ ($sec_one_q_link != NULL) ? $sec_one_q_link->id : ''}}">
                                                                <div class="row sec_one_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_one_q_link_ar[{{$index}}]" value="{{ $sec_one_q_link->translate('ar')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_one_q_link_ar[{{$index}}]" value="{{ $sec_one_q_link->translate('ar')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_one_q_link->id }}" data-deleteid="delete_sec_one_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_one_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_one_q_link" data-name="name_sec_one_q_link_ar" data-val="val_sec_one_q_link_ar" data-locale="ar" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.second_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_second_q_link_id" class="delete_sec_second_q_link_id" value="">
                                                <div class="sec_second_q_link_block ">
                                                    @if(count($sec_second_q_links) > 0)
                                                        @foreach($sec_second_q_links as $index=>$sec_second_q_link)
                                                            @if($sec_second_q_link->translate('ar'))
                                                                <input type="hidden" name="sec_second_q_link_id_ar[{{$index}}]" class="sec_second_q_link_id_ar" value="{{ ($sec_second_q_link != NULL) ? $sec_second_q_link->id : ''}}">
                                                                <div class="row sec_second_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_second_q_link_ar[{{$index}}]" value="{{ $sec_second_q_link->translate('ar')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_second_q_link_ar[{{$index}}]" value="{{ $sec_second_q_link->translate('ar')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_second_q_link->id }}" data-deleteid="delete_sec_second_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_second_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_second_q_link" data-name="name_sec_second_q_link_ar" data-val="val_sec_second_q_link_ar" data-locale="ar" id="add_sec_second_q_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTACT US--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.contact_us') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.contact_detail') }}.</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> ({{ __('settings.address1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_contact_ar" value="{{ (isset($contact_address) && $contact_address->translate('ar')) ? $contact_address->translate('ar')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               {{-- Whatsapp Number--}}
                               <div class="card card-accent-primary mb-4">
                                <div class="card-header">
                                    <i class="fa-brands fa-whatsapp wp_icon"></i>
                                    {{ __('settings.whatsapp_chat') }}
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">{{ __('settings.whatsapp_no') }}.</p>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-group mb-3 ">
                                                <label for="phone_no" class="form-label"> <strong>{{ __('settings.whatsapp_no') }}</strong> ({{ __('settings.whatsapp_no1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                <input type="text" name="whatsapp_no_whatsapp_section_ar" value="{{ (isset($whatsapp_no) && $whatsapp_no->translate('ar')) ? $whatsapp_no->translate('ar')->val : '' }}" class="form-control  " id="whatsapp_no" placeholder="{{ __('settings.whatsapp_no') }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- META DETAIL--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-globe-asia"></i>
                                        {{ __('settings.meta') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.application_meta_data') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_site_name" class="form-label"> <strong>{{ __('settings.meta_site_name') }}</strong> ({{ __('settings.meta_site_name1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_name_common_ar" value="{{ (isset($meta_name) && $meta_name->translate('ar')) ? $meta_name->translate('ar')->val : '' }}" class="form-control  " id="meta_site_name" placeholder="{{ __('settings.meta_site_name') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_description" class="form-label"> <strong>{{ __('settings.meta_description') }}</strong> ({{ __('settings.meta_description1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_desciption_common_ar" value="{{ (isset($meta_description) && $meta_description->translate('ar')) ? $meta_description->translate('ar')->val : '' }}" class="form-control  " id="meta_description" placeholder="{{ __('settings.meta_description1') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_keyword" class="form-label"> <strong>{{ __('settings.meta_keyword1') }}</strong> ({{ __('settings.meta_keyword') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_keyword_common_ar" value="{{ (isset($meta_keyword) && $meta_keyword->translate('ar')) ? $meta_keyword->translate('ar')->val : '' }}" class="form-control  " id="meta_keyword" placeholder="{{ __('settings.meta_keyword') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="general_fr" class="tab inner-tab-cont">
                                <br/>
                                {{--HEADER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.header') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.header_detail') }}</p>

                                        <div class="row mb-3">
                                            <hr>
                                            <p class="text-muted">{{ __('settings.quick_link') }}</p>
                                            {{-- <input type="hidden" name="delete_quick_link_id" class="delete_quick_link_id" value="">--}}
                                            <div class="quick_links_block ">
                                                @if(count($quick_links) > 0)
                                                    @foreach($quick_links as $index=>$quick_link)
                                                        @if($quick_link->translate('fr'))
                                                            <input type="hidden" name="quick_link_id_fr[{{$index}}]" class="quick_link_id" value="{{ ($quick_link != NULL) ? $quick_link->id : ''}}">
                                                            <div class="row quick_links_block_in" data-fe_en = "{{$index}}">
                                                                <div class="col-11 col-sm-11  ">
                                                                    <div class="row ">
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="name_quick_link_fr[{{$index}}]" value="{{ $quick_link->translate('fr')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_name') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="val_quick_link_fr[{{$index}}]" value="{{ $quick_link->translate('fr')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_value') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 text-center">
                                                                    <br>
                                                                    @if($index != 0)
                                                                        <i data-id="{{ $quick_link->id }}" data-deleteid="delete_quick_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn quick_link_close_btn"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <br>
                                            <button style="width:auto;" class="btn btn-danger ms-1 add_quick_link" data-name="name_quick_link_fr" data-val="val_quick_link_fr" data-locale="fr" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- FOOTER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.footer') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted"> {{ __('settings.footer_detail') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_footer_fr" value="{{ (isset($footer_address) && $footer_address->translate('fr')) ? $footer_address->translate('fr')->val : '' }}" class="form-control  " id="address" placeholder="{ __('settings.address') }}">
                                                </div>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.first_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_one_q_link_id" class="delete_sec_one_q_link_id" value="">
                                                <div class="sec_one_q_link_block ">
                                                    @if(count($sec_one_q_links) > 0)
                                                        @foreach($sec_one_q_links as $index=>$sec_one_q_link)
                                                            @if($sec_one_q_link->translate('fr'))
                                                                <input type="hidden" name="sec_one_q_link_id_fr[{{$index}}]" class="sec_one_q_link_id_fr" value="{{ ($sec_one_q_link != NULL) ? $sec_one_q_link->id : ''}}">
                                                                <div class="row sec_one_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_one_q_link_fr[{{$index}}]" value="{{ $sec_one_q_link->translate('fr')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_one_q_link_fr[{{$index}}]" value="{{ $sec_one_q_link->translate('fr')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_one_q_link->id }}" data-deleteid="delete_sec_one_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_one_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_one_q_link" data-name="name_sec_one_q_link_fr" data-val="val_sec_one_q_link_fr" data-locale="fr" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.second_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_second_q_link_id" class="delete_sec_second_q_link_id" value="">
                                                <div class="sec_second_q_link_block ">
                                                    @if(count($sec_second_q_links) > 0)
                                                        @foreach($sec_second_q_links as $index=>$sec_second_q_link)
                                                            @if($sec_second_q_link->translate('fr'))
                                                                <input type="hidden" name="sec_second_q_link_id_fr[{{$index}}]" class="sec_second_q_link_id_fr" value="{{ ($sec_second_q_link != NULL) ? $sec_second_q_link->id : ''}}">
                                                                <div class="row sec_second_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_second_q_link_fr[{{$index}}]" value="{{ $sec_second_q_link->translate('fr')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_second_q_link_fr[{{$index}}]" value="{{ $sec_second_q_link->translate('fr')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_second_q_link->id }}" data-deleteid="delete_sec_second_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_second_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_second_q_link" data-name="name_sec_second_q_link_fr" data-val="val_sec_second_q_link_fr" data-locale="fr" id="add_sec_second_q_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTACT US--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.contact_us') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.contact_detail') }}.</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> ({{ __('settings.address1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_contact_fr" value="{{ (isset($contact_address) && $contact_address->translate('fr')) ? $contact_address->translate('fr')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 {{-- Whatsapp Number--}}
                               <div class="card card-accent-primary mb-4">
                                <div class="card-header">
                                    <i class="fa-brands fa-whatsapp wp_icon"></i>
                                    {{ __('settings.whatsapp_chat') }}
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">{{ __('settings.whatsapp_no') }}.</p>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-group mb-3 ">
                                                <label for="phone_no" class="form-label"> <strong>{{ __('settings.whatsapp_no') }}</strong> ({{ __('settings.whatsapp_no1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                <input type="text" name="whatsapp_no_whatsapp_section_fr" value="{{ (isset($whatsapp_no) && $whatsapp_no->translate('fr')) ? $whatsapp_no->translate('fr')->val : '' }}" class="form-control  " id="whatsapp_no" placeholder="{{ __('settings.whatsapp_no') }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                {{-- META DETAIL--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-globe-asia"></i>
                                        {{ __('settings.meta') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.application_meta_data') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_site_name" class="form-label"> <strong>{{ __('settings.meta_site_name') }}</strong> ({{ __('settings.meta_site_name1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_name_common_fr" value="{{ (isset($meta_name) && $meta_name->translate('fr')) ? $meta_name->translate('fr')->val : '' }}" class="form-control  " id="meta_site_name" placeholder="{{ __('settings.meta_site_name') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_description" class="form-label"> <strong>{{ __('settings.meta_description') }}</strong> ({{ __('settings.meta_description1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_desciption_common_fr" value="{{ (isset($meta_description) && $meta_description->translate('fr')) ? $meta_description->translate('fr')->val : '' }}" class="form-control  " id="meta_description" placeholder="{{ __('settings.meta_description') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_keyword" class="form-label"> <strong>{{ __('settings.meta_keyword') }}</strong> ({{ __('settings.meta_keyword1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_keyword_common_fr" value="{{ (isset($meta_keyword) && $meta_keyword->translate('fr')) ? $meta_keyword->translate('fr')->val : '' }}" class="form-control  " id="meta_keyword" placeholder="{{ __('settings.meta_keyword') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="general_ru" class="tab inner-tab-cont">
                                <br/>
                                {{--HEADER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.header') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.header_detail') }}.</p>

                                        <div class="row mb-3">
                                            <hr>
                                            <p class="text-muted">{{ __('settings.quick_link') }}</p>
                                            {{--                                        <input type="hidden" name="delete_quick_link_id" class="delete_quick_link_id" value="">--}}
                                            <div class="quick_links_block ">
                                                @if(count($quick_links) > 0)
                                                    @foreach($quick_links as $index=>$quick_link)
                                                        @if($quick_link->translate('ru'))
                                                            <input type="hidden" name="quick_link_id_ru[{{$index}}]" class="quick_link_id" value="{{ ($quick_link != NULL) ? $quick_link->id : ''}}">
                                                            <div class="row quick_links_block_in" data-fe_en = "{{$index}}">
                                                                <div class="col-11 col-sm-11  ">
                                                                    <div class="row ">
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="name_quick_link_ru[{{$index}}]" value="{{ $quick_link->translate('ru')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_name') }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6 col-sm-6  ">
                                                                            <div class="form-group mb-3 ">
                                                                                <label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                <input type="text" name="val_quick_link_ru[{{$index}}]" value="{{ $quick_link->translate('ru')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_value') }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-1 text-center">
                                                                    <br>
                                                                    @if($index != 0)
                                                                        <i data-id="{{ $quick_link->id }}" data-deleteid="delete_quick_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn quick_link_close_btn"></i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                            <br>
                                            <button style="width:auto;" class="btn btn-danger ms-1 add_quick_link" data-name="name_quick_link_ru" data-val="val_quick_link_ru" data-locale="ru" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- FOOTER--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.footer') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.footer_detail') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> </label>  <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_footer_ru" value="{{ (isset($footer_address) && $footer_address->translate('ru')) ? $footer_address->translate('ru')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">
                                                </div>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.first_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_one_q_link_id" class="delete_sec_one_q_link_id" value="">
                                                <div class="sec_one_q_link_block ">
                                                    @if(count($sec_one_q_links) > 0)
                                                        @foreach($sec_one_q_links as $index=>$sec_one_q_link)
                                                            @if($sec_one_q_link->translate('ru'))
                                                                <input type="hidden" name="sec_one_q_link_id_ru[{{$index}}]" class="sec_one_q_link_id_ru" value="{{ ($sec_one_q_link != NULL) ? $sec_one_q_link->id : ''}}">
                                                                <div class="row sec_one_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_one_q_link_ru[{{$index}}]" value="{{ $sec_one_q_link->translate('ru')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_one_q_link_ru[{{$index}}]" value="{{ $sec_one_q_link->translate('ru')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_one_q_link->id }}" data-deleteid="delete_sec_one_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_one_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_one_q_link" data-name="name_sec_one_q_link_ru" data-val="val_sec_one_q_link_ru" data-locale="ru" id="add_quick_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                                <hr>
                                                <p class="text-muted">{{ __('settings.second_row_link') }}</p>
                                                <input type="hidden" name="delete_sec_second_q_link_id" class="delete_sec_second_q_link_id" value="">
                                                <div class="sec_second_q_link_block ">
                                                    @if(count($sec_second_q_links) > 0)
                                                        @foreach($sec_second_q_links as $index=>$sec_second_q_link)
                                                            @if($sec_second_q_link->translate('ru'))
                                                                <input type="hidden" name="sec_second_q_link_id_ru[{{$index}}]" class="sec_second_q_link_id_ru" value="{{ ($sec_second_q_link != NULL) ? $sec_second_q_link->id : ''}}">
                                                                <div class="row sec_second_q_link_block_in" data-fe_en = "{{$index}}">
                                                                    <div class="col-11 col-sm-11  ">
                                                                        <div class="row ">
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="name_sec_second_q_link_ru[{{$index}}]" value="{{ $sec_second_q_link->translate('ru')->name }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6 col-sm-6  ">
                                                                                <div class="form-group mb-3 ">
                                                                                    <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>
                                                                                    <input type="text" name="val_sec_second_q_link_ru[{{$index}}]" value="{{ $sec_second_q_link->translate('ru')->val }}" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-center">
                                                                        <br>
                                                                        @if($index != 0)
                                                                            <i data-id="{{ $sec_second_q_link->id }}" data-deleteid="delete_sec_second_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_second_q_link_close_btn"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <br>
                                                <button class="btn btn-danger ms-1 add_sec_second_q_link" data-name="name_sec_second_q_link_ru" data-val="val_sec_second_q_link_ru" data-locale="ru" id="add_sec_second_q_link"><i class="fas fa-list-ul"></i> {{ __('settings.add') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTACT US--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-cube"></i>
                                        {{ __('settings.contact_us') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.contact_detail') }}.</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="address" class="form-label"> <strong>{{ __('settings.address') }}</strong> ({{ __('settings.address1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="address_contact_ru" value="{{ (isset($contact_address) && $contact_address->translate('ru')) ? $contact_address->translate('ru')->val : '' }}" class="form-control  " id="address" placeholder="{{ __('settings.address') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Whatsapp Number--}}
                               <div class="card card-accent-primary mb-4">
                                <div class="card-header">
                                    <i class="fa-brands fa-whatsapp wp_icon"></i>
                                    {{ __('settings.whatsapp_chat') }}
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">{{ __('settings.whatsapp_no') }}.</p>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <div class="form-group mb-3 ">
                                                <label for="phone_no" class="form-label"> <strong>{{ __('settings.whatsapp_no') }}</strong> ({{ __('settings.whatsapp_no1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                <input type="text" name="whatsapp_no_whatsapp_section_ru" value="{{ (isset($whatsapp_no) && $whatsapp_no->translate('ru')) ? $whatsapp_no->translate('ru')->val : '' }}" class="form-control  " id="whatsapp_no" placeholder="{{ __('settings.whatsapp_no') }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                {{-- META DETAIL--}}
                                <div class="card card-accent-primary mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-globe-asia"></i>
                                        {{ __('settings.meta') }}
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted">{{ __('settings.application_meta_data') }}</p>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_site_name" class="form-label"> <strong>{{ __('settings.meta_site_name') }}</strong> ({{ __('settings.meta_site_name1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_name_common_ru" value="{{ (isset($meta_name) && $meta_name->translate('ru')) ? $meta_name->translate('ru')->val : '' }}" class="form-control  " id="meta_site_name" placeholder="{{ __('settings.meta_site_name') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_description" class="form-label"> <strong>{{ __('settings.meta_description') }}</strong> ({{ __('settings.meta_description1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_desciption_common_ru" value="{{ (isset($meta_description) && $meta_description->translate('ru')) ? $meta_description->translate('ru')->val : '' }}" class="form-control  " id="meta_description" placeholder="{{ __('settings.meta_description') }}">
                                                </div>
                                                <div class="form-group mb-3 ">
                                                    <label for="meta_keyword" class="form-label"> <strong>{{ __('settings.meta_keyword') }}</strong> ({{ __('settings.meta_keyword1') }})</label> <span class="text-danger"> <strong>*</strong> </span>
                                                    <input type="text" name="meta_keyword_common_ru" value="{{ (isset($meta_keyword) && $meta_keyword->translate('ru')) ? $meta_keyword->translate('ru')->val : '' }}" class="form-control  " id="meta_keyword" placeholder="{{ __('settings.meta_keyword') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row m-b-md">
                                <div class="col-md-12">
                                    <button class="btn-primary btn">
                                        <i class='fas fa-save'></i> @lang('Save')
                                    </button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="module">

        $(document).ready(function(){

            $(".tabs_c li a").click(function(e){
                e.preventDefault();
            });


            $(".remove").click(function(){
            if($(this).data('exist') == true) {
                var id = $(this).data('id');
                var delete_class = $(this).data('deleteid');
                var array_delete_item = [];
                if($('.'+delete_class).val().length > 0) {
                    array_delete_item.push($('.'+delete_class).val());
                    array_delete_item.push(id);
                    $('.'+delete_class).val(array_delete_item);
                }
                else {
                    array_delete_item.push(id);
                    $('.'+delete_class).val(array_delete_item);
                }
            }
            $(this).parent(".pip").remove();
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

            //add quicklink block
            $(".add_quick_link").click(function(ev) {
                ev.preventDefault();
                var i;
                if ($(this).siblings(".quick_links_block").find('div').hasClass('quick_links_block_in')){
                    i = $(this).siblings(".quick_links_block").find('.quick_links_block_in').last().data('fe_en') + 1;
                }
                else {
                    i = 0;
                }

                var add_item_heml = '<div class="row quick_links_block_in" data-fe_en = "' + i + '">'+
                    '<div class="col-11 col-sm-11  ">'+
                    '<div class="row ">'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    '<label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    '<input type="text" name="'+ $(this).data('name') + '[' + i + ']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_name') }}">'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    '<label for="google_play_link" class="form-label"> <strong>{{ __('settings.quick_link_value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    '<input type="text" name="'+ $(this).data('val') + '[' + i + ']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.quick_link_value') }}">'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-1 text-center">'+
                    '<br>'+
                    '<i data-deleteid="delete_quick_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn quick_link_close_btn"></i>'+
                    '</div>'+
                    '</div>';
                $(this).siblings(".quick_links_block").append(add_item_heml);
            });

            //add footer first
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            //
            // row link block
            $(".add_sec_one_q_link").click(function(ev) {
                ev.preventDefault();
                var i;
                if ($(this).siblings(".sec_one_q_link_block").find('div').hasClass('sec_one_q_link_block_in')){
                    i = $(this).siblings(".sec_one_q_link_block").find('.sec_one_q_link_block_in').last().data('fe_en') + 1;
                }
                else {
                    i = 0;
                }

                var add_item_heml = '<div class="row sec_one_q_link_block_in" data-fe_en = "' + i +'">'+
                    '<div class="col-11 col-sm-11  ">'+
                    '<div class="row ">'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    '<label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    '<input type="text" name="name_sec_one_q_link_en[' + i +']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    '<label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    '<input type="text" name="val_sec_one_q_link_en[' + i +']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    ' </div>'+
                    '<div class="col-1 text-center">'+
                    '<br>'+
                    '<i data-deleteid="delete_sec_one_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_one_q_link_close_btn"></i>'+
                    ' </div>'+
                    '</div>';
                $(this).siblings(".sec_one_q_link_block").append(add_item_heml);
            });

            //add footer second row link block
            $(".add_sec_second_q_link").click(function(ev) {
                ev.preventDefault();
                var i;
                if ($(this).siblings(".sec_second_q_link_block").find('div').hasClass('sec_second_q_link_block_in')){
                    i = $(this).siblings(".sec_second_q_link_block").find('.sec_second_q_link_block_in').last().data('fe_en') + 1;
                }
                else {
                    i = 0;
                }

                var add_item_heml = '<div class="row sec_second_q_link_block_in" data-fe_en = "' + i +'">'+
                    '<div class="col-11 col-sm-11  ">'+
                    '<div class="row ">'+
                    '<div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    '<label for="google_play_link" class="form-label"> <strong>{{ __('settings.name') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    ' <input type="text" name="name_sec_second_q_link_en[' + i +']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.name') }}">'+
                    '</div>'+
                    '</div>'+
                    ' <div class="col-6 col-sm-6  ">'+
                    '<div class="form-group mb-3 ">'+
                    ' <label for="google_play_link" class="form-label"> <strong>{{ __('settings.value') }}</strong> </label> <span class="text-danger"> <strong>*</strong> </span>'+
                    ' <input type="text" name="val_sec_second_q_link_en[' + i +']" value="" class="form-control  " id="google_play_link" placeholder="{{ __('settings.value') }}">'+
                    '</div>'+
                    '</div>'+
                    ' </div>'+
                    '</div>'+
                    '<div class="col-1 text-center">'+
                    ' <br>'+
                    '<i data-deleteid="delete_sec_second_q_link_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn sec_second_q_link_close_btn"></i>'+
                    ' </div>'+
                    ' </div>';
                $(this).siblings(".sec_second_q_link_block").append(add_item_heml);
            });

            // ajaxform submit
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

        });


        //delete block
        $(document).on("click", ".close_btn", function(event){
            event.preventDefault();
            var this_ele = $(this);

            swal({
                    title: '',
                    text: '{{ __('settings.delete_block_msg') }}',
                    type: 'warning',
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: false,
                    confirmButtonColor: '#7367f0',
                    cancelButtonColor: '#ea5455',
                    cancelButtonText: '{{ __('settings.no') }}',
                    confirmButtonText: '{{ __('settings.yes') }}',
                },
                function () {
                    if(this_ele.data('exist') == true) {
                        var id = this_ele.data('id');
                        var delete_class = this_ele.data('deleteid');
                        var array_delete_item = [];
                        if($('.'+delete_class).val().length > 0) {
                            array_delete_item.push($('.'+delete_class).val());
                            array_delete_item.push(id);
                            $('.'+delete_class).val(array_delete_item);
                        }
                        else {
                            array_delete_item.push(id);
                            $('.'+delete_class).val(array_delete_item);
                        }
                    }
                    this_ele.parent().parent().remove();
                    swal.close();
                });
        });
    </script>
@endsection

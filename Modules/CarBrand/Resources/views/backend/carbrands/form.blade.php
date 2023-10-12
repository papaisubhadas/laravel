<style>
    .ml10 {
        margin-left: 10px;
    }

    .tabs_c {
        width: 100%;
        height: auto;
        margin: 0 auto;
    }

    /* tab list item */
    .tabs_c .tabs_c-list {
        list-style: none;
        margin: 0px;
        padding: 0px;
    }

    .tabs_c .tabs_c-list li {
        width: auto;
        float: left;
        margin: 0px;
        margin-right: 2px;
        padding: 10px 20px;
        text-align: center;
        /*background-color: #aaa;*/
        border-radius: 3px;
    }

    .tabs_c .tabs_c-list li {
        color: #000 !important;
        background-color: transparent !important;
        border-bottom: 1px solid #ccc !important;
    }

    .tabs_c .tabs_c-list li.active {
        color: #fff !important;
        /*background-color: #aaa !important;*/
        border-radius: 3px;
        border: 1px solid #ccc !important;
        border-bottom: none !important;
    }

    .tabs_c .tabs_c-list li:hover {
        cursor: pointer;
    }

    .tabs_c .tabs_c-list li a {
        text-decoration: none;
        color: #000;
    }

    .tabs_c .tabs_c-list li.active a {
        color: white;
    }

    /* Tab content section */
    .tabs_c .tab {
        display: none;
        width: 96%;
        height: auto;
        border-radius: 3px;
        background-color: #fff;
        /*color:darkslategray;*/
        clear: both;
    }

    .tabs_c .tab h3 {
        border-bottom: 3px solid cornflowerblue;
        letter-spacing: 1px;
        font-weight: normal;
        padding: 5px;
    }

    .tabs_c .tab p {
        line-height: 20px;
        letter-spacing: 1px;
    }

    /* When active state */
    .tabs_c .active {
        display: block !important;
    }

    .tabs_c .tabs-list li.active {
        background-color: lavender !important;
        color: black !important;
    }

    .tabs_c .active a {
        color: black !important;
    }

    .close_btn {
        font-size: 20px;
        font-weight: bold;
    }

    /* media query */
    @media screen and (max-width: 360px) {
        .tabs_c {
            margin: 0;
            width: 96%;
        }

        .tabs_c .tabs_c-list li {
            width: 80px;
        }
    }
</style>

{{--New Design--}}
<div class="row mb-3">
    <div class="tabs_c tabs_c2">
        <ul class="tabs_c-list">
            <li class="active outer-tab"><a href="#general">{{ __('car-brand.general') }}</a></li>
            <li class="outer-tab"><a href="#seo_section">{{ __('car-brand.seo_section') }}</a></li>
            <li class="outer-tab faq-section" style="display:none"><a href="#faq_section">{{ __('common.faq_section') }}</a></li>
        </ul>

    <div id="general" class="tab active outer-tab-cont">
        <br/>
        <div class="row mb-3">
            <p><strong>{{ __('car-brand.note') }} :</strong> {{ __('car-brand.cb_p1') }}
                <strong>{{ __('car-brand.title') }}</strong> {{ __('car-brand.and') }}
                <strong>{{ __('car-brand.description') }}</strong> {{ __('car-brand.cb_p2') }}</p>
            <div class="tabs_c tabs_c1">
                <ul class="tabs_c-list">
                    <li class="active inner-tab"><a href="#general_en">EN</a></li>
                    <li class="inner-tab"><a href="#general_ar">AR</a></li>
                    <li class="inner-tab"><a href="#general_fr">FR</a></li>
                    <li class="inner-tab"><a href="#general_ru">RU</a></li>
                </ul>
                @php

                    $title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->title : '';
                    $title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->title : '';
                    $title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->title : '';
                    $title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->title : '';

                    $custom_title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->custom_title : '';
                    $custom_title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->custom_title : '';
                    $custom_title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->custom_title : '';
                    $custom_title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->custom_title : '';

                    $description_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->description : '';
                    $description_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->description : '';
                    $description_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->description : '';
                    $description_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->description : '';

                @endphp
                <div id="general_en" class="tab active inner-tab-cont">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'title_en';
                                $field_lable = __('car-brand.title');
                                $field_placeholder = __('car-brand.title');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($title_en) }}
                                @if ($errors->has('title_en'))
                                    <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'custom_title_en';
                                $field_lable = __('car-brand.custom_title');
                                $field_placeholder = __('car-brand.custom_title');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($custom_title_en) }}
                                @if ($errors->has('custom_title_en'))
                                    <span class="text-danger">{{ $errors->first('custom_title_en') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'slug';
                                $field_lable = __('car-brand.slug');
                                $field_placeholder = __('car-brand.slug');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'status';
                                $field_lable = __('car-brand.status');
                                $field_placeholder = __('car-brand.select_option');
                                $required = "required";
                                $select_options = [
                                    'active' => __('car-brand.active'),
                                    'inactive' => __('car-brand.inactive')
                                ];
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_en';
                                $field_lable = __('car-brand.description');
                                $field_placeholder = __('car-brand.description');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('content form-control')->attributes(["$required"])->value($description_en) }}
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                @if(isset($image) || !empty($image))
                                    <img src="{{ url("frontend/image/$image") }}" width="100"/>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'image';
                                $field_lable = __('car-brand.image');
                                $field_placeholder = __('car-brand.image');
                                $required = "required";
                                ?>
                                <input id="image" name="image" multiple="" type="file" class="form-control"
                                       placeholder="Choose Image">
                                @if ($errors->has('image'))
                                    <br> <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                <div id="general_ar" class="tab inner-tab-cont">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'title_ar';
                                $field_lable = __('car-brand.title');
                                $field_placeholder = __('car-brand.title');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($title_ar) }}
                                {{--                                    @if ($errors->has('title_ar'))--}}
                                {{--                                        <span class="text-danger">{{ $errors->first('title_ar') }}</span>--}}
                                {{--                                    @endif--}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                        </div>
                        <div class="col-12 col-sm-4">

                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <?php
                            $field_name = 'custom_title_ar';
                            $field_lable = __('car-brand.custom_title');
                            $field_placeholder = __('car-brand.custom_title');
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($custom_title_ar) }}
                            @if ($errors->has('custom_title_ar'))
                                <span class="text-danger">{{ $errors->first('custom_title_ar') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_ar';
                                $field_lable = __('car-brand.description');
                                $field_placeholder = __('car-brand.description');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('content form-control')->attributes(["$required"])->value($description_ar) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="general_fr" class="tab inner-tab-cont">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'title_fr';
                                $field_lable = __('car-brand.title');
                                $field_placeholder = __('car-brand.title');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($title_fr) }}
                                {{--                                    @if ($errors->has('title_ar'))--}}
                                {{--                                        <span class="text-danger">{{ $errors->first('title_ar') }}</span>--}}
                                {{--                                    @endif--}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                        </div>
                        <div class="col-12 col-sm-4">

                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <?php
                            $field_name = 'custom_title_fr';
                            $field_lable = __('car-brand.custom_title');
                            $field_placeholder = __('car-brand.custom_title');
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($custom_title_fr) }}
                            @if ($errors->has('custom_title_fr'))
                                <span class="text-danger">{{ $errors->first('custom_title_fr') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_fr';
                                $field_lable = __('car-brand.description');
                                $field_placeholder = __('car-brand.description');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('content form-control')->attributes(["$required"])->value($description_fr) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="general_ru" class="tab inner-tab-cont">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'title_ru';
                                $field_lable = __('car-brand.title');
                                $field_placeholder = __('car-brand.title');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($title_ru) }}
                                {{--                                    @if ($errors->has('title_ar'))--}}
                                {{--                                        <span class="text-danger">{{ $errors->first('title_ar') }}</span>--}}
                                {{--                                    @endif--}}
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                        </div>
                        <div class="col-12 col-sm-4">

                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <?php
                            $field_name = 'custom_title_ru';
                            $field_lable = __('car-brand.custom_title');
                            $field_placeholder = __('car-brand.custom_title');
                            $required = "required";
                            ?>
                            {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"])->value($custom_title_ru) }}
                            @if ($errors->has('custom_title_ru'))
                                <span class="text-danger">{{ $errors->first('custom_title_ru') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_ru';
                                $field_lable = __('car-brand.description');
                                $field_placeholder = __('car-brand.description');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('content form-control')->attributes(["$required"])->value($description_ru) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="seo_section" class="tab outer-tab-cont">
        <br>
        <div class="row mb-3">
            <div class="tabs_c tabs_c1">
                <ul class="tabs_c-list">
                    <li class="active inner-tab"><a href="#seo_section_en">EN</a></li>
                    <li class="inner-tab"><a href="#seo_section_ar">AR</a></li>
                    <li class="inner-tab"><a href="#seo_section_fr">FR</a></li>
                    <li class="inner-tab"><a href="#seo_section_ru">RU</a></li>
                </ul>
                @php
                    $meta_title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_title : '';
                    $meta_title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_title : '';
                    $meta_title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_title : '';
                    $meta_title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_title : '';

                    $meta_description_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_description : '';
                    $meta_description_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_description : '';
                    $meta_description_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_description : '';
                    $meta_description_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_description : '';

                    $meta_keyword_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_keyword : '';
                    $meta_keyword_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_keyword : '';
                    $meta_keyword_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_keyword : '';
                    $meta_keyword_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_keyword : '';

                    // feature image
                    $feature_image_en = (isset($$module_name_singular) && $$module_name_singular) ? $$module_name_singular->feature_image : '';
                    $custom_url_slug = (isset($$module_name_singular)) ? $$module_name_singular->custom_url_slug : '';
                @endphp
                <div id="seo_section_en" class="tab active inner-tab-cont">
                    <br>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_title">{{ __('car-brand.meta_title') }}</label>
                                <input class="form-control" type="text" name="meta_title_en" id="meta_keyword"
                                       placeholder="{{ __('car-brand.meta_title') }}" value="{{$meta_title_en}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_keyword">{{ __('car-brand.meta_keywords') }}</label>
                                <input class="form-control" type="text" name="meta_keyword_en" id="meta_keyword_en"
                                       placeholder="{{ __('car-brand.meta_keywords') }}" value="{{$meta_keyword_en}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="meta_description">{{ __('car-brand.meta_description') }}</label>
                                <textarea class="form-control" type="text" name="meta_description_en"
                                          id="meta_description_en"
                                          placeholder="{{ __('car-brand.meta_description') }}">{{$meta_description_en}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="meta_image">{{ __('car.feature_image') }}</label>
                            <input class="form-control" type="file" name="meta_image_en" id="meta_image_en" placeholder="{{ __('car.feature_image') }}" value="{{$feature_image_en}}">
                            @if(file_exists(public_path('frontend/Feature/CarBrand/'.$feature_image_en)))
                            <div class="image-thumbnain-wrapper">
                                @if(!empty($feature_image_en))<img class="imageThumb ml10 " src="{{ url("frontend/Feature/CarBrand/".$feature_image_en) }}" width="130" alt="1029">
                                    <a class="btn btn-danger" id="feature-image-delete">

                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    <br>
                </div>
                <div id="seo_section_ar" class="tab inner-tab-cont">
                    <br>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_title">{{ __('car-brand.meta_title') }}</label>
                                <input class="form-control" type="text" name="meta_title_ar" id="meta_keyword"
                                       placeholder="{{ __('car-brand.meta_title') }}" value="{{$meta_title_ar}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_keyword">{{ __('car-brand.meta_keywords') }}</label>
                                <input class="form-control" type="text" name="meta_keyword_ar" id="meta_keyword_ar"
                                       placeholder="{{ __('car-brand.meta_keywords') }}" value="{{$meta_keyword_ar}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="meta_description">{{ __('car-brand.meta_description') }}</label>
                                <textarea class="form-control" type="text" name="meta_description_ar"
                                          id="meta_description_ar"
                                          placeholder="{{ __('car-brand.meta_description') }}">{{$meta_description_ar}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="seo_section_fr" class="tab inner-tab-cont">
                    <br>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_title">{{ __('car-brand.meta_title') }}</label>
                                <input class="form-control" type="text" name="meta_title_fr" id="meta_keyword_fr"
                                       placeholder="{{ __('car-brand.meta_title') }}" value="{{$meta_title_fr}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_keyword">{{ __('car-brand.meta_keywords') }}</label>
                                <input class="form-control" type="text" name="meta_keyword_fr" id="meta_keyword_fr"
                                       placeholder="{{ __('car-brand.meta_keywords') }}" value="{{$meta_keyword_fr}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="meta_description">{{ __('car-brand.meta_description') }}</label>
                                <textarea class="form-control" type="text" name="meta_description_fr"
                                          id="meta_description_fr"
                                          placeholder="{{ __('car-brand.meta_description') }}n">{{$meta_description_fr}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="seo_section_ru" class="tab inner-tab-cont">
                    <br>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_title">{{ __('car-brand.meta_title') }}</label>
                                <input class="form-control" type="text" name="meta_title_ru" id="meta_keyword_ru"
                                       placeholder="{{ __('car-brand.meta_title') }}" value="{{$meta_title_ru}}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_keyword">{{ __('car-brand.meta_keywords') }}</label>
                                <input class="form-control" type="text" name="meta_keyword_ru" id="meta_keyword_ru"
                                       placeholder="{{ __('car-brand.meta_keywords') }}" value="{{$meta_keyword_ru}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="meta_description">{{ __('car-brand.meta_description') }}</label>
                                <textarea class="form-control" type="text" name="meta_description_ru"
                                          id="meta_description_ru"
                                          placeholder="{{ __('car-brand.meta_description') }}n">{{$meta_description_ru}}</textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div id="faq_section" class="tab outer-tab-cont">
        <br>
        <div class="row mb-3">
            <div class="tabs_c tabs_c1">
                <ul class="tabs_c-list">
                    <li class="active inner-tab"><a href="#faq_section_en">EN</a></li>
                    <li class="inner-tab"><a href="#faq_section_ar">AR</a></li>
                    <li class="inner-tab"><a href="#faq_section_fr">FR</a></li>
                    <li class="inner-tab"><a href="#faq_section_ru">RU</a></li>
                </ul>

                <div id="faq_section_en" class="tab active inner-tab-cont">
                    <br>
                    <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
                    @php
                        $faq_qa_details = (isset($faq) && !empty($faq)) ? $faq : [];
                        // dd($faq_qa_details);
                    @endphp
                    <div class="car_add_block">
                        <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                        @php
                            $flag=false;
                        @endphp
                        @if(count($faq_en) > 0)
                            @foreach($faq_en as $index=>$faq_qa_detail)
                                    @php
                                        $flag=true;
                                    @endphp
                                    <input type="hidden" name="faq_qa_details_id_en[{{$index}}]" class="faq_qa_details_id"
                                           value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->faq_qa_detail_id : ''}}">
                                    <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                        <div class="col-11 col-sm-11 ">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                               value="{{$faq_qa_detail->question}}" type="text"
                                                               name="question_en[{{$index}}]" id="question"
                                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                               value="{{$faq_qa_detail->answer}}" type="text"
                                                               name="answer_en[{{$index}}]" id="answer"
                                                               placeholder="{{ __('faq.faq_content.create.answer') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <br>
                                            @if($index != 0)
                                                <i data-id="{{ $faq_qa_detail->faq_qa_detail_id }}" data-deleteid="delete_faq_qa_details_id"
                                                   data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                            @endif
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                        @if(count($faq_en) <= 0 ||  $flag == false)
                            <div class="row mb-3 car_add_block_in" data-fe_en="0">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="question_en[0]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="answer_en[0]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    {{--<i class="nav-icon fa-regular fa fa-times close_btn"></i>--}}
                                </div>
                            </div>
                        @endif

                    </div>
                    <br>
                    <button class="btn btn-danger ms-1  add_car_add_dtl" data-key="question" data-value="answer"
                            data-locale="en"><i class="fas fa-list-ul"></i> {{ __('faq.faq_content.create.add') }}</button>
                    <br>
                </div>
                <div id="faq_section_ar" class="tab inner-tab-cont">
                    <br>
                    <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
                    <div class="car_add_block">
                        <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                        @php
                            $flag=false;
                        @endphp
                        @if(count($faq_ar) > 0)
                            @foreach($faq_ar as $index=>$faq_qa_detail)
                                    @php
                                        $flag=true;
                                    @endphp
                                    <input type="hidden" name="faq_qa_details_id_ar[{{$index}}]" class="faq_qa_details_id"
                                        value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->faq_qa_detail_id : ''}}">
                                    <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                        <div class="col-11 col-sm-11 ">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                            value="{{$faq_qa_detail->question}}" type="text"
                                                            name="question_ar[{{$index}}]" id="question"
                                                            placeholder="{{ __('faq.faq_content.create.question') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                            value="{{$faq_qa_detail->answer}}" type="text"
                                                            name="answer_ar[{{$index}}]" id="answer"
                                                            placeholder="{{ __('faq.faq_content.create.answer') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <br>
                                            @if($index != 0)
                                                <i data-id="{{ $faq_qa_detail->faq_qa_detail_id }}" data-deleteid="delete_faq_qa_details_id"
                                                data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                            @endif
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                        @if(count($faq_ar) <= 0 ||  $flag == false)
                            <div class="row mb-3 car_add_block_in" data-fe_en="0">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="question_ar[0]" id="question"
                                                    placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="answer_ar[0]" id="answer"
                                                    placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    {{--<i class="nav-icon fa-regular fa fa-times close_btn"></i>--}}
                                </div>
                            </div>
                        @endif

                    </div>
                    <br>
                    <button class="btn btn-danger ms-1  add_car_add_dtl" data-key="question" data-value="answer"
                            data-locale="ar"><i class="fas fa-list-ul"></i> {{ __('faq.faq_content.create.add') }}</button>
                </div>
                <div id="faq_section_fr" class="tab inner-tab-cont">
                    <br>
                    <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
                    <div class="car_add_block">
                        <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                        @php
                            $flag=false;
                        @endphp
                        @if(count($faq_fr) > 0)
                            @foreach($faq_fr as $index=>$faq_qa_detail)
                                    @php
                                        $flag=true;
                                    @endphp
                                    <input type="hidden" name="faq_qa_details_id_fr[{{$index}}]" class="faq_qa_details_id"
                                           value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->faq_qa_detail_id : ''}}">
                                    <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                        <div class="col-11 col-sm-11 ">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                               value="{{$faq_qa_detail->question}}" type="text"
                                                               name="question_fr[{{$index}}]" id="question"
                                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                               value="{{$faq_qa_detail->answer}}" type="text"
                                                               name="answer_fr[{{$index}}]" id="answer"
                                                               placeholder="{{ __('faq.faq_content.create.answer') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-center">
                                            <br>
                                            @if($index != 0)
                                                <i data-id="{{ $faq_qa_detail->faq_qa_detail_id }}" data-deleteid="delete_faq_qa_details_id"
                                                   data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                            @endif
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                        @if(count($faq_fr) <= 0 ||  $flag == false)
                            <div class="row mb-3 car_add_block_in" data-fe_en="0">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="question_fr[0]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger"></span>
                                                <input class="form-control" type="text" name="answer_fr[0]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    {{--<i class="nav-icon fa-regular fa fa-times close_btn"></i>--}}
                                </div>
                            </div>
                        @endif

                    </div>
                    <br>
                    <button class="btn btn-danger ms-1  add_car_add_dtl" data-key="question" data-value="answer"
                            data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('faq.faq_content.create.add') }}</button>
                    <br>
                </div>
                <div id="faq_section_ru" class="tab inner-tab-cont">
                    <br>
                    <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
                    <div class="car_add_block">
                        <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                        @php
                            $flag=false;
                        @endphp
                        @if(count($faq_ru) > 0)
                            @foreach($faq_ru as $index=>$faq_qa_detail)
                                    @php
                                        $flag=true;
                                    @endphp
                                    <input type="hidden" name="faq_qa_details_id_ru[{{$index}}]" class="faq_qa_details_id"
                                        value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->faq_qa_detail_id : ''}}">
                                    <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                        <div class="col-11 col-sm-11 ">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                            value="{{$faq_qa_detail->question}}" type="text"
                                                            name="question_ru[{{$index}}]" id="question"
                                                            placeholder="{{ __('faq.faq_content.create.question') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                            class="text-danger"></span>
                                                        <input class="form-control"
                                                            value="{{$faq_qa_detail->answer}}" type="text"
                                                            name="answer_ru[{{$index}}]" id="answer"
                                                            placeholder="{{ __('faq.faq_content.create.answer') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $faq_qa_detail->faq_qa_detail_id }}" data-deleteid="delete_faq_qa_details_id"
                                                    data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(count($faq_ru) <= 0 ||  $flag == false)
                                            <div class="row mb-3 car_add_block_in" data-fe_en="0">
                                                <div class="col-11 col-sm-11 ">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 ">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                                    class="text-danger"></span>
                                                                <input class="form-control" type="text" name="question_ru[0]"
                                                                    id="question"
                                                                    placeholder="{{ __('faq.faq_content.create.question') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                                    class="text-danger"></span>
                                                                <input class="form-control" type="text" name="answer_ru[0]"
                                                                    id="answer"
                                                                    placeholder="{{ __('faq.faq_content.create.answer') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 text-center">
                                                    <br>
                                                    {{--<i class="nav-icon fa-regular fa fa-times close_btn"></i>--}}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <br>
                                    <button class="btn btn-danger ms-1  add_car_add_dtl" data-key="question" data-value="answer"
                                            data-locale="ru"><i class="fas fa-list-ul"></i> {{ __('faq.faq_content.create.add') }}
                                    </button>


                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="module">

    //tab
    $(document).ready(function () {

        $(".tabs_c li a").click(function (e) {
            e.preventDefault();
        });

        $(".tabs_c1>ul>li").click(function () {
            var $this = $(this);
            var tabid = $this.find("a").attr("href");
            $this.siblings("li").removeClass("active");
            $this.parents(".tabs_c1").find(">div.tab").removeClass("active");
            $(tabid).addClass('active');
            $this.addClass("active"); //  adding active class to clicked tab

        });

        $(".tabs_c2>ul>li").click(function () {
            var $this = $(this);
            var tabid = $this.find("a").attr("href");
            $this.siblings("li").removeClass("active");
            $this.parents(".tabs_c2").find(">div.tab").removeClass("active");
            $(tabid).addClass('active');
            $this.addClass("active"); //  adding active class to clicked tab
        });


    });
    $(document).on("click", ".close_btn", function (event) {
        event.preventDefault();
        var this_ele = $(this);

        swal({
            title: '',
            text: 'Are you sure you want to delete this?',
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
            this_ele.parent().parent().remove();
            swal.close();
        });
    });

//delete block
$(document).on("click", ".close_btn", function (event) {
    event.preventDefault();
    var this_ele = $(this);

    swal({
            title: '',
            text: 'Are you sure you want to delete this?',
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

            if (this_ele.data('exist') == true) {
                var id = this_ele.data('id');
                var delete_class = this_ele.data('deleteid');
                var array_delete_item = [];
                if ($('.' + delete_class).val().length > 0) {
                    array_delete_item.push($('.' + delete_class).val());
                    array_delete_item.push(id);
                    $('.' + delete_class).val(array_delete_item);
                } else {
                    array_delete_item.push(id);
                    $('.' + delete_class).val(array_delete_item);
                }
            }
            this_ele.parent().parent().remove();

            swal.close();
        });
});


</script>
@if(isset($carbrand))
    <script>
        $(document).ready(function () {
            $(document).on("click", "#feature-image-delete", function() {
                swal({
                    title: '',
                    text: '{{ __('car-brand.feature_image_delete') }}',
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
                    var id ="{{$$module_name_singular->id}}";
                    $.ajax({
                        type: "get",
                        url: "{{ route('backend.carbrands.delete',$$module_name_singular->id) }}",
                        success: function (response) {
                            $('.image-thumbnain-wrapper').remove();
                              swal.close();
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
@if(isset($carbrand))
    <script>
        $(document).ready(function () {
            $(document).on("click", "#delete-details", function() {
                swal({
                    title: '',
                    text: '{{ __('car-brand.delete_permanently') }}',
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
                            url: "{{ route('backend.carbrands.delete_details',$$module_name_singular->id) }}",
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




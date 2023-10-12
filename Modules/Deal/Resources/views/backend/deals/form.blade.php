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
</style>

{{--New Design--}}

<div class="row mb-3">
    <p><strong>{{__('deal.note')}}</strong> {{__('deal.You_must_enter')}} <strong>{{__('deal.title')}}</strong> {{__('deal.and')}} <strong>{{__('deal.description')}}</strong> {{__('deal.submit_text')}}</p>
    <div class="tabs_c tabs_c2">
        <ul class="tabs_c-list">
            <li class="active outer-tab"><a href="#general">{{ __('deal.general') }}</a></li>
            <li class="outer-tab"><a href="#seo_section">{{ __('deal.seo_section') }}</a></li>
            <li class="outer-tab faq-section" style="display:none;"><a href="#faq_section">{{ __('common.faq_section') }}</a></li>
        </ul>
        <div id="general" class="tab active outer-tab-cont">
                <br/>
            {{-- <ul class="tabs_c-list">
                <li class="active"><a href="#general_en">EN</a></li>
                <li class=""><a href="#general_ar">AR</a></li>
                <li class=""><a href="#general_fr">FR</a></li>
                <li class=""><a href="#general_ru">RU</a></li>
            </ul> --}}
            <div class="tabs_c tabs_c1">
                <ul class="tabs_c-list">
                    <li class="active inner-tab"><a href="#general_en">EN</a></li>
                    <li class="inner-tab"><a href="#general_ar">AR</a></li>
                    <li class="inner-tab"><a href="#general_fr">FR</a></li>
                    <li class="inner-tab"><a href="#general_ru">RU</a></li>
                </ul>
                @php

                    $deal_name_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->deal_name : '';
                    $deal_name_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->deal_name : '';
                    $deal_name_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->deal_name : '';
                    $deal_name_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->deal_name : '';

                    $image_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->image : '';
                    $image_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->image : '';
                    $image_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->image : '';
                    $image_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->image : '';

                    $deal_desc_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->description : '';
                    $deal_desc_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->description : '';
                    $deal_desc_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->description : '';
                    $deal_desc_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->description : '';
                @endphp
                <div id="general_en" class="tab active">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'deal_name_en';
                                $field_lable = __('deal.deals.create.deal_name');
                                $field_placeholder = __('deal.deals.create.deal_name');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($deal_name_en) }}

                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'status';
                                $field_lable = __('deal.deals.create.status');
                                $field_placeholder = "-- Select an option --";
                                $required = "required";
                                $select_options = [
                                    'active'=>'Active',
                                    'inactive'=>'In Active'
                                ];
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'deal_type';
                                $field_lable = __('deal.deals.create.deal_type');
                                $field_placeholder = "-- Select Deal Type --";
                                $required = "required";
                                $select_options = [
                                    'daily'=>'Daily',
                                    'monthly'=>'Monthly',
                                ];
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'discount';
                                $field_lable = __('deal.deals.create.discount');
                                $field_placeholder = $field_lable;
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                @if(isset($image_en) && !empty($image_en))
                                    <img src="{{ url("frontend/deals/$image_en") }}" height="150" width="200" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'image_en';
                                $field_lable = __('deal.deals.create.deal_image');
                                $field_placeholder = __('deal.deals.create.deal_image');
                                $required = (isset($image_en) && !empty($image_en)) ? "":"required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}

                                <input id="image_en" name="image_en" multiple="" type="file" class="form-control" placeholder="Choose Image">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_en';
                                $field_lable = __('deal.deals.create.deal_desc');
                                $field_placeholder = $field_lable;
                                $required = "";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($deal_desc_en) }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" style="overflow: auto;">
                        <table cellpadding="10">
                            @foreach($cars as $car)
                                <tr>
                                    <td><input {{ isset($deal) && $car->name ? 'checked' : null }} data-id="{{ $car->id }}" type="checkbox" class="car-enable"></td>
                                    <td>{{ $car->custom_title }}</td>
                                    <td><input value="{{ isset($deal) && $car->name ? $car->name : null }}" {{ isset($deal) && $car->name ? '' : 'disabled' }} data-id="{{ $car->id }}" name="cars[{{ $car->id }}]" type="text" class="car-amount form-control" placeholder="Amount"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div id="general_ar" class="tab ">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'deal_name_ar';
                                $field_lable = __('deal.deals.create.deal_name');
                                $field_placeholder = __('deal.deals.create.deal_name');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($deal_name_ar) }}

                            </div>
                        </div>

                        <div class="col-12 col-sm-4">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                @if(isset($image_ar) && !empty($image_ar))
                                    <img src="{{ url("frontend/deals/$image_ar") }}" height="150" width="200" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'image_ar';
                                $field_lable = __('deal.deals.create.deal_image');
                                $field_placeholder = __('deal.deals.create.deal_image');
                                $required = (isset($image_ar) && !empty($image_ar)) ? "":"required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                <input id="image_ar" name="image_ar" multiple="" type="file" class="form-control" placeholder="Choose Image">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_ar';
                                $field_lable = __('deal.deals.create.deal_desc');
                                $field_placeholder = $field_lable;
                                $required = "";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($deal_desc_ar) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="general_fr" class="tab ">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'deal_name_fr';
                                $field_lable = __('deal.deals.create.deal_name');
                                $field_placeholder = __('deal.deals.create.deal_name');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($deal_name_fr) }}

                            </div>
                        </div>

                        <div class="col-12 col-sm-4">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                @if(isset($image_fr) && !empty($image_fr))
                                    <img src="{{ url("frontend/deals/$image_fr") }}" height="150" width="200" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'image_fr';
                                $field_lable = __('deal.deals.create.deal_image');
                                $field_placeholder = __('deal.deals.create.deal_image');
                                $required = (isset($image_ar) && !empty($image_ar)) ? "":"required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}

                                <input id="image_fr" name="image_fr" multiple="" type="file" class="form-control" placeholder="Choose Image">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_fr';
                                $field_lable = __('deal.deals.create.deal_desc');
                                $field_placeholder = $field_lable;
                                $required = "";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($deal_desc_fr) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="general_ru" class="tab ">
                    <br/>

                    <div class="row mb-3">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <?php
                                $field_name = 'deal_name_ru';
                                $field_lable = __('deal.deals.create.deal_name');
                                $field_placeholder = __('deal.deals.create.deal_name');
                                $required = "required";
                                ?>
                                {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($deal_name_ru) }}

                            </div>
                        </div>

                        <div class="col-12 col-sm-4">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                @if(isset($image_ru) && !empty($image_ru))
                                    <img src="{{ url("frontend/deals/$image_ru") }}" height="150" width="200" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'image_ru';
                                $field_lable = __('deal.deals.create.deal_image');
                                $field_placeholder = __('deal.deals.create.deal_image');
                                $required = (isset($image_ru) && !empty($image_ru)) ? "":"required";
                                ?>
                                {{ html()->label( $field_lable,  $field_lable)->class('form-label') }} {!! fielf_required($required) !!}

                                <input id="image_ru" name="image_ru" multiple="" type="file" class="form-control" placeholder="Choose Image">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">
                                <?php
                                $field_name = 'description_ru';
                                $field_lable = __('deal.deals.create.deal_desc');
                                $field_placeholder = $field_lable;
                                $required = "";
                                ?>
                                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($deal_desc_ru) }}
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
                        $feature_image_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->feature_image : '';
                        $custom_url_slug = (isset($$module_name_singular)) ? $$module_name_singular->custom_url_slug : '';
                    @endphp
                    <div id="seo_section_en" class="tab active inner-tab-cont">
                        <br>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_title">{{ __('deal.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_en" id="meta_keyword"
                                           placeholder="{{ __('deal.meta_title') }}" value="{{$meta_title_en}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('deal.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_en" id="meta_keyword_en"
                                           placeholder="{{ __('deal.meta_keywords') }}" value="{{$meta_keyword_en}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="meta_description">{{ __('deal.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_en"
                                              id="meta_description_en"
                                              placeholder="{{ __('deal.meta_description') }}">{{$meta_description_en}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="meta_image">{{ __('car.feature_image') }}</label>
                                <input class="form-control" type="file" name="meta_image_en" id="meta_image_en" placeholder="{{ __('car.feature_image') }}" value="{{$feature_image_en}}">
                                <div class="image-thumbnain-wrapper">
                                    @if(!empty($feature_image_en) && file_exists(public_path("frontend/Feature/Deal/".$feature_image_en)))
                                        <img class="imageThumb ml10 " src="{{ url("frontend/Feature/Deal/".$feature_image_en) }}" width="130" alt="1029">
                                        <a class="btn btn-danger" id="feature-image-delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div id="seo_section_ar" class="tab inner-tab-cont">
                        <br>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_title">{{ __('deal.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_ar" id="meta_keyword"
                                           placeholder="{{ __('deal.meta_title') }}" value="{{$meta_title_ar}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('deal.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_ar" id="meta_keyword_ar"
                                           placeholder="{{ __('deal.meta_keywords') }}" value="{{$meta_keyword_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="meta_description">{{ __('deal.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_ar"
                                              id="meta_description_ar"
                                              placeholder="{{ __('deal.meta_description') }}">{{$meta_description_ar}}</textarea>
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
                                    <label class="form-label" for="meta_title">{{ __('deal.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_fr" id="meta_keyword_fr"
                                           placeholder="{{ __('deal.meta_title') }}" value="{{$meta_title_fr}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('deal.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_fr" id="meta_keyword_fr"
                                           placeholder="{{ __('deal.meta_keywords') }}" value="{{$meta_keyword_fr}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="meta_description">{{ __('deal.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_fr"
                                              id="meta_description_fr"
                                              placeholder="{{ __('deal.meta_description') }}n">{{$meta_description_fr}}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div id="seo_section_ru" class="tab inner-tab-cont">
                        <br>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_title">{{ __('deal.meta_title') }}</label>
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

<x-library.select2 />
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script type="module">

    //tab
    $(document).ready(function(){

        $(".tabs_c li a").click(function(e){
            e.preventDefault();
        });

        $(".tabs_c1 ul li").click(function(){

            var tabid = $(this).find("a").attr("href");
            //$(".tabs_c li,.tabs_c div.tab").removeClass("active");   // removing active class from tab
            $(this).siblings(".tabs_c1 li").removeClass("active");
            // $(this).parents(".tabs_c").find("div.tab").css("background-color", "red");
            $(this).parents(".tabs_c1").find("div.tab").removeClass("active");
            //$(this).parents(".tabs_c").find(".tab").hide();   // hiding open tab
            $(tabid).addClass('active');
            //$(tabid).show();    // show tab
            $(this).addClass("active"); //  adding active class to clicked tab

        });

        $('.car-enable').on('click', function () {
            let id = $(this).attr('data-id')
            let enabled = $(this).is(":checked")
            $('.car-amount[data-id="' + id + '"]').attr('disabled', !enabled)
            //$('.car-amount[data-id="' + id + '"]').val(null)
        })

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


</script>
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


</script>
<script>
    $(document).ready(function () {
        $(document).on("click", "#feature-image-delete", function() {
            if (confirm('Are you sure you want to delete this record?')) {
                var id ="{{(isset($$module_name_singular->id) ? $$module_name_singular->id : '')}}";
                $.ajax({
                    type: "get",
                    url: "{{ route('backend.deals.delete',(isset($$module_name_singular->id) ? $$module_name_singular->id : '')) }}",
                    success: function (response) {
                        $('.image-thumbnain-wrapper').remove();
                        swal.close();
                    },
                    error: function(res){
                        console.log(res);

                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $('.content').summernote({
            height: 300,

        });
    });
</script>

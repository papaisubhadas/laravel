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

{{--New Design--}}
<div class="row mb-3">
    <div class="tabs_c tabs_c2">
        <ul class="tabs_c-list">
            <li class="active outer-tab"><a href="#general">{{ __('car.general') }}</a></li>
            <li class="outer-tab"><a href="#additional_detail">{{ __('car.additional_detai') }}</a></li>
            <li class="outer-tab"><a href="#seo_section">{{ __('car.seo_ection') }}</a></li>
            <li class="outer-tab faq-section" style="display:none;"><a href="#faq_section">{{ __('common.faq_section') }}</a></li>
        </ul>

        <div id="general" class="tab active outer-tab-cont">
            <br/>
            <div class="row mb-3">
                <div class="tabs_c tabs_c1">
                    <ul class="tabs_c-list">
                        <li class="active inner-tab"><a href="#general_en">EN</a></li>
                        <li class="inner-tab"><a href="#general_ar">AR</a></li>
                        <li class="inner-tab"><a href="#general_fr">FR</a></li>
                        <li class="inner-tab"><a href="#general_ru">RU</a></li>
                    </ul>
                    @php

                        $name_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->name : '';
                        $name_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->name : '';
                        $name_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->name : '';
                        $name_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->name : '';

                        $car_custom_title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->custom_title : '';
                        $car_custom_title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->custom_title : '';
                        $car_custom_title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->custom_title : '';
                        $car_custom_title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->custom_title : '';

                        $description_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->description : '';
                        $description_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->description : '';
                        $description_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->description : '';
                        $description_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->description : '';

                        $delivery_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->delivery : '';
                        $delivery_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->delivery : '';
                        $delivery_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->delivery : '';
                        $delivery_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->delivery : '';

                        $insurance_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->insurance : '';
                        $insurance_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->insurance : '';
                        $insurance_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->insurance : '';
                        $insurance_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->insurance : '';

                        $supplier_note_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->supplier_note : '';
                        $supplier_note_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->supplier_note : '';
                        $supplier_note_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->supplier_note : '';
                        $supplier_note_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->supplier_note : '';

                        $slug = (isset($$module_name_singular)) ? $$module_name_singular->slug : '';
                    @endphp
                    <div id="general_en" class="tab active inner-tab-cont">
                        <br/>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('car.car_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="name_en" id="name" placeholder="{{ __('car.car_title') }}" value="{{$name_en}}">
                                </div>
                            </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label class="form-label" for="car_custom_title">{{ __('car.car_custom_title') }}</label> <span class="text-danger">*</span>
                                <input class="form-control" type="text" name="car_custom_title_en" id="car_custom_title_en" placeholder="{{ __('car.car_custom_title') }}" value="{{$car_custom_title_en}}">
                            </div>
                        </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="form-label" for="slug">{{ __('car.slug') }}</label> <span class="text-danger">*</span>
                                <input class="form-control" type="text" name="slug" id="slug" placeholder="{{ __('car.slug') }}" value="{{$slug}}">
                                 </div>
                            </div>

                    </div>
                        {{-- <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('car.car_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="name_en" id="name" placeholder="{{ __('car.car_title') }}" value="{{$name_en}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="car_custom_title">{{ __('car.car_custom_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="car_custom_title_en" id="car_custom_title_en" placeholder="{{ __('car.car_custom_title') }}" value="{{$car_custom_title_en}}">
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">{{ __('car.car_description') }}</label>
                                    <textarea class="form-control content" name="description_en" id="description" placeholder="{{ __('car.car_description') }}">{{$description_en}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="supplier_note">{{ __('car.vat') }}</label>
                                    <textarea class="form-control" name="supplier_note_en" id="supplier_note" placeholder="{{ __('car.vat') }}" >{{$supplier_note_en}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="delivery">{{ __('car.delivery_charge') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" value="{{$delivery_en}}" type="text" name="delivery_en" id="delivery" placeholder="{{ __('car.delivery_charge') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="insurance">{{ __('car.insurance') }}</label><span class="text-danger">*</span>
                                    <input class="form-control" value="{{$insurance_en}}"  type="text" name="insurance_en" id="insurance" placeholder="{{ __('car.insurance') }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'car_brand_id';
                                    $field_lable = __('car.car_brand');
                                    $field_placeholder = "-- Select car brand --";
                                    $required = "";
                                    $car_brand_options = $car_brands;
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }}<span class="text-danger">*</span>
                                    <select class="form-control select2" name="car_brand_id" id="car_brand_id">
                                        <option value="">{{ __('car.select_car_brand') }}</option>
                                        @foreach($car_brand_options as $key=>$car_brand_option)
                                            @if($car_brand_option->translate('en'))
                                                <option value="{{$car_brand_option->id}}" {{ (isset($$module_name_singular) && $$module_name_singular->car_brand_id == $car_brand_option->id) ? 'Selected' : '' }}>{{$car_brand_option->translate(\Illuminate\Support\Facades\App::currentLocale()) ? $car_brand_option->translate(\Illuminate\Support\Facades\App::currentLocale())->title : $car_brand_option->translate('en')->title}}     </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'car_type_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = "-- Select car type --";
                                    $required = "";
                                    $car_type_options = $car_types;
                                    ?>
                                    <label class="form-label" for="car_type_id">{{ __('car.car_type') }}</label><span class="text-danger">*</span>
                                    @php
                                        if(isset($$module_name_singular) && $$module_name_singular->car_has_car_types){
                                            $car_has_car_types = $$module_name_singular->car_has_car_types->pluck('car_type_id')->toArray();
                                        }
                                    @endphp
                                    @if(isset($car_types) && !empty($car_types))
                                        <div class="form-check">
                                            @foreach ($car_types as $car_type)
                                                @if($car_type->translate('en'))
                                                    <label class="form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="car_type_id[]" value="{{$car_type->id}}" {{ (isset($car_has_car_types) && count($car_has_car_types) > 0 && in_array($car_type->id, $car_has_car_types)) ? 'checked' : ''}}> {{$car_type->translate(\Illuminate\Support\Facades\App::currentLocale()) ? $car_type->translate(\Illuminate\Support\Facades\App::currentLocale())->title : $car_type->translate('en')->title}}
                                                    </label>
                                                    <br/>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                    {{-- <select class="form-control select2" name="car_type_id" id="car_type_id">
                                         <option value="">{{ __('car.select_car_type') }}</option>
                                         @foreach($car_types as $key=>$car_type)
                                             <option value="{{$car_type->id}}" {{ (isset($$module_name_singular) && $$module_name_singular->car_type_id == $car_type->id) ? 'Selected' : '' }}>{{($car_type->translate(\Illuminate\Support\Facades\App::currentLocale())) ? $car_type->translate(\Illuminate\Support\Facades\App::currentLocale())->title : $car_type->translate('en')->title}}     </option>
                                         @endforeach
                                     </select>--}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="row mb-3">
                            <div class="col-12  col-sm-6">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'car_model_year';
                                    $field_lable =  __('car.car_model_year') ;
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->car_model_year : ''}}" type="text" name="car_model_year" id="car_model_year" placeholder="{{ __('car.car_model_year') }}">
                                </div>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-12  col-sm-6">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'Security Deposit';
                                    $field_lable = __('car.security_deposit');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control"  value="{{ (isset($$module_name_singular)) ? $$module_name_singular->deposit : ''}}" type="text" name="deposit" id="deposit" placeholder="{{ __('car.security_deposit') }}">
                                </div>
                            </div>
                            <div class="col-12  col-sm-6">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'min_age';
                                    $field_lable = __('car.min_age');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->min_age : ''}}" type="text" name="min_age" id="min_age" placeholder="{{ __('car.min_age') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12  col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'daily_price';
                                    $field_lable = __('car.daily_price');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->daily_price : ''}}" type="text" name="daily_price" id="daily_price" placeholder="{{ __('car.daily_price') }}">
                                </div>
                            </div>
                            <div class="col-12  col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'weekly_price';
                                    $field_lable = __('car.weekly_price');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->weekly_price : ''}}" type="text" name="weekly_price" id="weekly_price" placeholder="{{__('car.weekly_price')}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'monthly_price';
                                    $field_lable = __('car.monthly_price');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->monthly_price : ''}}" type="text" name="monthly_price" id="monthly_price" placeholder="{{ __('car.monthly_price') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12  col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'daily_mileage_limit';
                                    $field_lable = __('car.daily_ileage_limit');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->daily_mileage_limit : ''}}" type="text" name="daily_mileage_limit" id="daily_mileage_limit" placeholder="{{ __('car.daily_ileage_limit') }}">
                                </div>
                            </div>
                            <div class="col-12  col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'weekly_mileage_limit';
                                    $field_lable = __('car.weekly_mileage_limit');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->weekly_mileage_limit : ''}}" type="text" name="weekly_mileage_limit" id="weekly_mileage_limit" placeholder="{{__('car.weekly_mileage_limit')}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'monthly_mileage_limit';
                                    $field_lable = __('car.monthly_mileagelimit');
                                    $field_placeholder = $field_lable;
                                    $required = "";
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <input class="form-control" value="{{ (isset($$module_name_singular)) ? $$module_name_singular->monthly_mileage_limit : ''}}" type="text" name="monthly_mileage_limit" id="monthly_mileage_limit" placeholder="{{ __('car.monthly_mileagelimit') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'is_available';
                                    $field_lable = __('car.is_available');
                                    $field_placeholder = "-- Select is available --";
                                    $required = "";
                                    $select_options = [
                                        'yes'=>'Yes',
                                        'no'=>'No'
                                    ];
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <select class="form-control select2" name="is_available" id="is_available">
                                        <option value=""> {{  __('car.select_available') }}</option>
                                        @foreach($select_options as $key=>$select_option)
                                            <option value="{{$key}}" {{ (isset($$module_name_singular) && $$module_name_singular->is_available == $key) ? 'Selected' : '' }}>{{$select_option}}     </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <?php
                                    $field_name = 'status';
                                    $field_lable = __('car.status');
                                    $field_placeholder = "-- Select status --";
                                    $required = "";
                                    $select_options = [
                                        'active'=>'Active',
                                        'inactive'=>'Inactive'
                                    ];
                                    ?>
                                    {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}<span class="text-danger">*</span>
                                    <select class="form-control select2" name="status" id="status">
                                        <option value=""> {{__('car.select_status')}}</option>
                                        @foreach($select_options as $key=>$select_option)
                                            <option value="{{$key}}" {{ (isset($$module_name_singular) && $$module_name_singular->status == $key) ? 'Selected' : '' }}>{{$select_option}}     </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>{{ __('car.car_image') }}</h4>
                        @php
                            $car_images = (isset($$module_name_singular) && !empty($$module_name_singular->car_images)) ? $$module_name_singular->car_images : [];
                        @endphp
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="delete_car_images" class="delete_car_images" value="">
                                    <label class="form-label" for="images">{{ __('car.images') }}</label><span class="text-danger">*</span>
                                    <input type="file" name="images[]"  class="form-control images" multiple="multiple" placeholder="{{ __('car.choose_images') }}"  >
                                    <br/>
                                    <div class="col-md-12">
                                        <div class="mt-1 text-center images-preview-div1">
                                            <div class="images-preview-div">

                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($car_images))
                                        <br/>
                                        <p style="font-weight: bold; margin-bottom: 10px; color: red;">Note : You can reorder image after image has been updated sucessfully.</p>
                                    {{--<br/>--}}
                                        <div class="gallery" id="image-list-sports" style="height: 140px;">
                                            <h2 style="width: 100%; padding: 7px 13px; background-color: #ccc;font-size: 15px; border-radius: 10px;">{{ __('car.reorder_image') }}</h2>
                                            @if(!empty($car_images))
                                                @foreach($car_images as $car_image)
                                                    <div class="pip"  id="image_{{ $car_image->id}}"  style="float: left;position: relative;">
                                                        <img class="imageThumb ml10" src="{{ url("frontend/image/".$car_image->image) }}" width="130" alt="{{ $car_image->id }}">
                                                        <br/><span class="remove"   data-id="{{ $car_image->id }}" data-deleteid="delete_car_images" data-exist="true" style="position: absolute;right: 5px;top: 4px;"><i class="fa fa-window-close" aria-hidden="true"></i></span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <br/>
                                        {{--                                        <button class="btn btn-success" type="button" id="submit-sports"><i class="fas fa-save"></i> Reorder</button>--}}
                                    @endif
                                </div>
                                <input type="hidden" name="image_reoder" class="image_reoder">
                            </div>
                        </div>
                    </div>
                    <div id="general_ar" class="tab inner-tab-cont">
                        <br/>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('car.car_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="name_ar" id="name_ar" placeholder="{{ __('car.car_title') }}" value="{{$name_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="car_custom_title">{{ __('car.car_custom_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="car_custom_title_ar" id="car_custom_title_ar" placeholder="{{ __('car.car_custom_title') }}" value="{{$car_custom_title_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">{{ __('car.car_description') }}</label>
                                    <textarea class="form-control content" name="description_ar" id="description_ar" placeholder="{{ __('car.car_description') }}">{{$description_ar}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="supplier_note">{{ __('car.vat') }}</label>
                                    <textarea class="form-control" name="supplier_note_ar" id="supplier_note_ar" placeholder="{{ __('car.vat') }}" >{{$supplier_note_ar}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="delivery">{{ __('car.delivery_charge') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" value="{{$delivery_ar}}" type="text" name="delivery_ar" id="delivery_ar" placeholder="{{ __('car.delivery_charge') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="insurance">{{ __('car.insurance') }}</label><span class="text-danger">*</span>
                                    <input class="form-control" value="{{$insurance_ar}}"  type="text" name="insurance_ar" id="insurance_ar" placeholder="{{ __('car.insurance') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="general_fr" class="tab inner-tab-cont">
                        <br/>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('car.car_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="name_fr" id="name_fr" placeholder="{{ __('car.car_title') }}" value="{{$name_fr}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="car_custom_title">{{ __('car.car_custom_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="car_custom_title_fr" id="car_custom_title_fr" placeholder="{{ __('car.car_custom_title') }}" value="{{$car_custom_title_fr}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">{{ __('car.car_description') }}</label>
                                    <textarea class="form-control content" name="description_fr" id="description_fr" placeholder="{{ __('car.car_description') }}">{{$description_fr}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="supplier_note">{{ __('car.vat') }}</label>
                                    <textarea class="form-control" name="supplier_note_fr" id="supplier_note_fr" placeholder="{{ __('car.vat') }}" >{{$supplier_note_fr}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="delivery">{{ __('car.delivery_charge') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" value="{{$delivery_fr}}" type="text" name="delivery_fr" id="delivery_fr" placeholder="{{ __('car.delivery_charge') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="insurance">{{ __('car.insurance') }}</label><span class="text-danger">*</span>
                                    <input class="form-control" value="{{$insurance_fr}}"  type="text" name="insurance_fr" id="insurance_fr" placeholder="{{ __('car.insurance') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="general_ru" class="tab inner-tab-cont">
                        <br/>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('car.car_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="name_ru" id="name_ru" placeholder="{{ __('car.car_title') }}" value="{{$name_ru}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="car_custom_title">{{ __('car.car_custom_title') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="car_custom_title_ru" id="car_custom_title_ru" placeholder="{{ __('car.car_custom_title') }}" value="{{$car_custom_title_ru}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">{{ __('car.car_description') }}</label>
                                    <textarea class="form-control content" name="description_ru" id="description_ru" placeholder="{{ __('car.car_description') }}">{{$description_ru}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="supplier_note">{{ __('car.vat') }}</label>
                                    <textarea class="form-control" name="supplier_note_ru" id="supplier_note_ru" placeholder="{{ __('car.vat') }}" >{{$supplier_note_ru}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="delivery">{{ __('car.delivery_charge') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" value="{{$delivery_ru}}" type="text" name="delivery_ru" id="delivery_ru" placeholder="{{ __('car.delivery_charge') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label" for="insurance">{{ __('car.insurance') }}</label><span class="text-danger">*</span>
                                    <input class="form-control" value="{{$insurance_ru}}"  type="text" name="insurance_ru" id="insurance_ru" placeholder="{{ __('car.insurance') }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div id="additional_detail" class="tab outer-tab-cont">
            <br>
            <div class="row mb-3">
                <div class="tabs_c tabs_c1">
                    <ul class="tabs_c-list">
                        <li class="active inner-tab"><a href="#additional_data_en">EN</a></li>
                        <li class="inner-tab"><a href="#additional_data_ar">AR</a></li>
                        <li class="inner-tab"><a href="#additional_data_fr">FR</a></li>
                        <li class="inner-tab"><a href="#additional_data_ru">RU</a></li>
                    </ul>
                    @php
                        $car_features = (isset($$module_name_singular) && !empty($$module_name_singular->car_features)) ? $$module_name_singular->car_features : [];
                    @endphp
                    <div id="additional_data_en" class="tab active inner-tab-cont">
                        <br>
                        <h4>{{ __('car.car_feature') }}</h4>
                        <div class="feature_block">
                            <input type="hidden" name="delete_car_feature_id" class="delete_car_feature_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_features) > 0)
                                @foreach($car_features as $index=>$car_feature)
                                    @if($car_feature->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_feature_id_en[{{$index}}]" class="car_feature_id" value="{{ ($car_feature != NULL) ? $car_feature->id : ''}}">
                                        <div class="row mb-3 feature_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11  ">
                                                <div class="row">
                                                    <div class="col-6 col-sm-6  ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_feature->icon_html}}" type="text" name="feature_icon_html[{{$index}}]" id="feature_title" placeholder="{{ __('car.icon_html') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-6  ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_feature->translate('en')->feature_title}}" type="text" name="feature_title_en[{{$index}}]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_feature->id }}" data-deleteid="delete_car_feature_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn car_feature_close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_features) <= 0 || $flag == false)
                                <div class="row mb-3 feature_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11  ">
                                        <div class="row">
                                            <div class="col-6 col-sm-6  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="" type="text" name="feature_icon_html[0]" id="feature_title" placeholder="{{ __('car.icon_html') }}">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="" type="text" name="feature_title_en[0]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
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
                            {{--<div class="alert alert-info" role="alert">
                                <div class="alert-body">
                                    Note: we need to add html only. if it is font awesome icon it will be like this <?php echo html_entity_decode('<i class="/fa fa-users"/></i>'); ?> or
                                    it is image then it will be like this <code><img src="https://friends-car-rental.demo.vpninfotech.in/frontend/image/car_1.png" alt=""></code>.
                                </div>
                            </div>--}}
                        </div>
                        <br>
                        <button class="btn btn-danger ms-1 add_feature" data-icon="feature_icon_html" data-name="feature_title" data-locale="en" id="add_feature"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_delivery') }}</h4>
                        @php
                            $car_delivery_pick_up_services = (isset($$module_name_singular) && !empty($$module_name_singular->car_delivery_pick_up_services)) ? $$module_name_singular->car_delivery_pick_up_services : [];
                        @endphp
                        <div class="service_block">
                            <input type="hidden" name="delete_car_delivery_pick_up_service_id" class="delete_car_delivery_pick_up_service_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_delivery_pick_up_services) > 0)
                                @foreach($car_delivery_pick_up_services as $index=>$car_delivery_pick_up_service)
                                    @if($car_delivery_pick_up_service->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_delivery_pick_up_service_id_en[{{$index}}]" class="car_delivery_pick_up_service_id" value="{{ ($car_delivery_pick_up_service != NULL) ? $car_delivery_pick_up_service->id : ''}}">
                                        <div class="row mb-3 service_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 n">
                                                <div class="form-group">
                                                    <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_delivery_pick_up_service->translate('en')->service_title}}" type="text" name="service_title_en[{{$index}}]" id="service_title" placeholder="{{ __('car.service_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_delivery_pick_up_service->id }}" data-deleteid="delete_car_delivery_pick_up_service_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_delivery_pick_up_services) <= 0 ||  $flag == false)
                                <div class="row mb-3 service_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 n">
                                        <div class="form-group">
                                            <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="service_title_en[0]" id="service_title" placeholder="{{ __('car.service_title') }}">
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
                        <button class="btn btn-danger ms-1 add_service" data-name="service_title" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rent') }}</h4>
                        @php
                            $car_rent_details = (isset($$module_name_singular) && !empty($$module_name_singular->car_rent_details)) ? $$module_name_singular->car_rent_details : [];
                        @endphp

                        <div class="rent_detail_block">
                            <input type="hidden" name="delete_car_rent_detail_id" class="delete_car_rent_detail_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rent_details) > 0)
                                @foreach($car_rent_details as $index=>$car_rent_detail)
                                    @if($car_rent_detail->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rent_detail_id_en[{{$index}}]" class="car_rent_detail_id" value="{{ ($car_rent_detail != NULL) ? $car_rent_detail->id : ''}}">
                                        <div class="row mb-3 rent_dtl_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="form-group">
                                                    <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_rent_detail->translate('en')->rent_detail_text}}" type="text" name="rent_detail_en[{{$index}}]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rent_detail->id }}" data-deleteid="delete_car_rent_detail_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rent_details) <= 0 ||  $flag == false)
                                <div class="row mb-3 rent_dtl_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11">
                                        <div class="form-group">
                                            <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="rent_detail_en[0]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
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
                        <button class="btn btn-danger ms-1 add_rent_dtl" data-name="rent_detail" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_specification') }}</h4>
                        @php
                            $car_specifications = (isset($$module_name_singular) && !empty($$module_name_singular->car_specifications)) ? $$module_name_singular->car_specifications : [];
                        @endphp
                        <div class="car_spec_block">
                            <input type="hidden" name="delete_car_specification_id" class="delete_car_specification_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_specifications) > 0)
                                @foreach($car_specifications as $index=>$car_specification)
                                    @if($car_specification->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_specification_id_en[{{$index}}]" class="car_specification_id" value="{{ ($car_specification != NULL) ? $car_specification->id : ''}}">
                                        <div class="row mb-3 car_spec_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="row">
                                                    <div class="col-6 col-sm-6  ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_specification->icon_html}}" type="text" name="specification_icon_html[{{$index}}]" id="feature_title" placeholder="{{ __('car.icon_html') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-6  ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_specification->translate('en')->specification_title}}" type="text" name="specification_title_en[{{$index}}]" id="specification_title" placeholder="{{ __('car.specification_title') }}e">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_specification->id }}" data-deleteid="delete_car_specification_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_specifications) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_spec_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-6 col-sm-6  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.icon_html') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="" type="text" name="specification_icon_html[0]" id="feature_title" placeholder="{{ __('car.icon_html') }}">
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="specification_title_en[0]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
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
                        <button class="btn btn-danger ms-1 add_car_spec_dtl" data-icon="specification_icon_html" data-name="specification_title" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>


                        <hr>
                        <h4>{{ __('car.car_rental_include') }}</h4>
                        @php
                            $car_rental_includes = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_includes)) ? $$module_name_singular->car_rental_includes : [];
                        @endphp
                        <div class="car_rent_in_block">
                            <input type="hidden" name="delete_car_rental_include_id" class="delete_car_rental_include_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_includes) > 0)
                                @foreach($car_rental_includes as $index=>$car_rental_include)
                                    @if($car_rental_include->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_include_id_en[{{$index}}]" class="car_rental_include_id" value="{{ ($car_rental_include != NULL) ? $car_rental_include->id : ''}}">
                                        <div class="row mb-3 car_rent_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('en')->key}}" type="text" name="rent_key_en[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 " >
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('en')->value}}" type="text" name="rent_value_en[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_include->id }}" data-deleteid="delete_car_rental_include_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_includes) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_rent_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_key_en[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 " >
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_value_en[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1 add_car_rent_in_dtl" data-key="rent_key"  data-value="rent_value" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_requirement') }}</h4>
                        @php
                            $car_rental_requirements = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_requirements)) ? $$module_name_singular->car_rental_requirements : [];
                        @endphp

                        <div class="car_ren_req_in_block">
                            <input type="hidden" name="delete_car_rental_requirement_id" class="delete_car_rental_requirement_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_requirements) > 0)
                                @foreach($car_rental_requirements as $index=>$car_rental_requirement)
                                    @if($car_rental_requirement->translate('en'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_requirement_id_en[{{$index}}]" class="car_rental_requirement_id" value="{{ ($car_rental_requirement != NULL) ? $car_rental_requirement->id : ''}}">
                                        <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('en')->key}}"type="text" name="rent_req_key_en[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('en')->value}}"type="text" name="rent_req_value_en[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_requirement->id }}" data-deleteid="delete_car_rental_requirement_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_requirements) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_key_en[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_value_en[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1  add_car_rent_req_in_dtl" data-key="rent_req_key"  data-value="rent_req_value" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>
                        <br>
                    </div>
                    <div id="additional_data_ar" class="tab inner-tab-cont">
                        <br>
                        <h4>{{ __('car.car_feature') }}</h4>
                        <div class="feature_block">
                            <input type="hidden" name="delete_car_feature_id" class="delete_car_feature_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_features) > 0)
                                @foreach($car_features as $index=>$car_feature)
                                    @if($car_feature->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_feature_id_ar[{{$index}}]" class="car_feature_id" value="{{ ($car_feature != NULL) ? $car_feature->id : ''}}">
                                        <div class="row mb-3 feature_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_feature->translate('ar')->feature_title}}" type="text" name="feature_title_ar[{{$index}}]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_feature->id }}" data-deleteid="delete_car_feature_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn car_feature_close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_features) <= 0 ||  $flag == false)
                                <div class="row mb-3 feature_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11  ">
                                        <div class="form-group">
                                            <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" value ="" type="text" name="feature_title_ar[0]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
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
                        <button class="btn btn-danger ms-1 add_feature" data-name="feature_title" data-locale="ar" id="add_feature"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_delivery') }}</h4>
                        @php
                            $car_delivery_pick_up_services = (isset($$module_name_singular) && !empty($$module_name_singular->car_delivery_pick_up_services)) ? $$module_name_singular->car_delivery_pick_up_services : [];
                        @endphp
                        <div class="service_block">
                            <input type="hidden" name="delete_car_delivery_pick_up_service_id" class="delete_car_delivery_pick_up_service_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_delivery_pick_up_services) > 0)
                                @foreach($car_delivery_pick_up_services as $index=>$car_delivery_pick_up_service)
                                    @if($car_delivery_pick_up_service->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_delivery_pick_up_service_id_ar[{{$index}}]" class="car_delivery_pick_up_service_id" value="{{ ($car_delivery_pick_up_service != NULL) ? $car_delivery_pick_up_service->id : ''}}">
                                        <div class="row mb-3 service_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 n">
                                                <div class="form-group">
                                                    <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_delivery_pick_up_service->translate('ar')->service_title}}" type="text" name="service_title_ar[{{$index}}]" id="service_title" placeholder="{{ __('car.service_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_delivery_pick_up_service->id }}" data-deleteid="delete_car_delivery_pick_up_service_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_delivery_pick_up_services) <= 0 ||  $flag == false)
                                <div class="row mb-3 service_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 n">
                                        <div class="form-group">
                                            <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="service_title_ar[0]" id="service_title" placeholder="{{ __('car.service_title') }}">
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
                        <button class="btn btn-danger ms-1 add_service" data-name="service_title" data-locale="ar"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rent') }}</h4>
                        @php
                            $car_rent_details = (isset($$module_name_singular) && !empty($$module_name_singular->car_rent_details)) ? $$module_name_singular->car_rent_details : [];
                        @endphp

                        <div class="rent_detail_block">
                            <input type="hidden" name="delete_car_rent_detail_id" class="delete_car_rent_detail_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rent_details) > 0)
                                @foreach($car_rent_details as $index=>$car_rent_detail)
                                    @if($car_rent_detail->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rent_detail_id_ar[{{$index}}]" class="car_rent_detail_id" value="{{ ($car_rent_detail != NULL) ? $car_rent_detail->id : ''}}">
                                        <div class="row mb-3 rent_dtl_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="form-group">
                                                    <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_rent_detail->translate('ar')->rent_detail_text}}" type="text" name="rent_detail_ar[{{$index}}]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rent_detail->id }}" data-deleteid="delete_car_rent_detail_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rent_details) <= 0 ||  $flag == false)
                                <div class="row mb-3 rent_dtl_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11">
                                        <div class="form-group">
                                            <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="rent_detail_ar[0]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
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
                        <button class="btn btn-danger ms-1 add_rent_dtl" data-name="rent_detail" data-locale="ar"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_specification') }}</h4>
                        @php
                            $car_specifications = (isset($$module_name_singular) && !empty($$module_name_singular->car_specifications)) ? $$module_name_singular->car_specifications : [];
                        @endphp
                        <div class="car_spec_block">
                            <input type="hidden" name="delete_car_specification_id" class="delete_car_specification_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_specifications) > 0)
                                @foreach($car_specifications as $index=>$car_specification)
                                    @if($car_specification->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_specification_id_ar[{{$index}}]" class="car_specification_id" value="{{ ($car_specification != NULL) ? $car_specification->id : ''}}">
                                        <div class="row mb-3 car_spec_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_specification->translate('ar')->specification_title}}" type="text" name="specification_title_ar[{{$index}}]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_specification->id }}" data-deleteid="delete_car_specification_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_specifications) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_spec_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="form-group">
                                            <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="specification_title_ar[0]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
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
                        <button class="btn btn-danger ms-1 add_car_spec_dtl" data-name="specification_title" data-locale="ar"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_include') }}</h4>
                        @php
                            $car_rental_includes = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_includes)) ? $$module_name_singular->car_rental_includes : [];
                        @endphp
                        <div class="car_rent_in_block">
                            <input type="hidden" name="delete_car_rental_include_id" class="delete_car_rental_include_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_includes) > 0)
                                @foreach($car_rental_includes as $index=>$car_rental_include)
                                    @if($car_rental_include->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_include_id_ar[{{$index}}]" class="car_rental_include_id" value="{{ ($car_rental_include != NULL) ? $car_rental_include->id : ''}}">
                                        <div class="row mb-3 car_rent_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('ar')->key}}" type="text" name="rent_key_ar[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 " >
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('ar')->value}}" type="text" name="rent_value_ar[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_include->id }}" data-deleteid="delete_car_rental_include_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_includes) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_rent_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_key_ar[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 " >
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_value_ar[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1 add_car_rent_in_dtl" data-key="rent_key"  data-value="rent_value" data-locale="ar"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_requirement') }}</h4>
                        @php
                            $car_rental_requirements = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_requirements)) ? $$module_name_singular->car_rental_requirements : [];
                        @endphp

                        <div class="car_ren_req_in_block">
                            <input type="hidden" name="delete_car_rental_requirement_id" class="delete_car_rental_requirement_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_requirements) > 0)
                                @foreach($car_rental_requirements as $index=>$car_rental_requirement)
                                    @if($car_rental_requirement->translate('ar'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_requirement_id_ar[{{$index}}]" class="car_rental_requirement_id" value="{{ ($car_rental_requirement != NULL) ? $car_rental_requirement->id : ''}}">
                                        <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('ar')->key}}" type="text" name="rent_req_key_ar[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('ar')->value}}" type="text" name="rent_req_value_ar[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_requirement->id }}" data-deleteid="delete_car_rental_requirement_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_requirements) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_key_ar[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_value_ar[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1  add_car_rent_req_in_dtl" data-key="rent_req_key"  data-value="rent_req_value" data-locale="en"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>
                        <br>
                    </div>
                    <div id="additional_data_fr" class="tab inner-tab-cont">
                        <br>
                        <h4>{{ __('car.car_feature') }}</h4>
                        <div class="feature_block">
                            <input type="hidden" name="delete_car_feature_id" class="delete_car_feature_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_features) > 0)
                                @foreach($car_features as $index=>$car_feature)
                                    @if($car_feature->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_feature_id_fr[{{$index}}]" class="car_feature_id" value="{{ ($car_feature != NULL) ? $car_feature->id : ''}}">
                                        <div class="row mb-3 feature_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_feature->translate('fr')->feature_title}}" type="text" name="feature_title_fr[{{$index}}]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_feature->id }}" data-deleteid="delete_car_feature_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn car_feature_close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_features) <= 0 ||  $flag == false)
                                <div class="row mb-3 feature_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11  ">
                                        <div class="form-group">
                                            <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" value ="" type="text" name="feature_title_fr[0]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
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
                        <button class="btn btn-danger ms-1 add_feature" data-name="feature_title" data-locale="fr" id="add_feature"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_delivery') }}</h4>
                        @php
                            $car_delivery_pick_up_services = (isset($$module_name_singular) && !empty($$module_name_singular->car_delivery_pick_up_services)) ? $$module_name_singular->car_delivery_pick_up_services : [];
                        @endphp
                        <div class="service_block">
                            <input type="hidden" name="delete_car_delivery_pick_up_service_id" class="delete_car_delivery_pick_up_service_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_delivery_pick_up_services) > 0)
                                @foreach($car_delivery_pick_up_services as $index=>$car_delivery_pick_up_service)
                                    @if($car_delivery_pick_up_service->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_delivery_pick_up_service_id_fr[{{$index}}]" class="car_delivery_pick_up_service_id" value="{{ ($car_delivery_pick_up_service != NULL) ? $car_delivery_pick_up_service->id : ''}}">
                                        <div class="row mb-3 service_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 n">
                                                <div class="form-group">
                                                    <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_delivery_pick_up_service->translate('fr')->service_title}}" type="text" name="service_title_fr[{{$index}}]" id="service_title" placeholder="{{ __('car.service_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_delivery_pick_up_service->id }}" data-deleteid="delete_car_delivery_pick_up_service_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_delivery_pick_up_services) <= 0 ||  $flag == false)
                                <div class="row mb-3 service_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 n">
                                        <div class="form-group">
                                            <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="service_title_fr[0]" id="service_title" placeholder="{{ __('car.service_title') }}">
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
                        <button class="btn btn-danger ms-1 add_service" data-name="service_title" data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rent') }}</h4>
                        @php
                            $car_rent_details = (isset($$module_name_singular) && !empty($$module_name_singular->car_rent_details)) ? $$module_name_singular->car_rent_details : [];
                        @endphp

                        <div class="rent_detail_block">
                            <input type="hidden" name="delete_car_rent_detail_id" class="delete_car_rent_detail_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rent_details) > 0)
                                @foreach($car_rent_details as $index=>$car_rent_detail)
                                    @if($car_rent_detail->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rent_detail_id_fr[{{$index}}]" class="car_rent_detail_id" value="{{ ($car_rent_detail != NULL) ? $car_rent_detail->id : ''}}">
                                        <div class="row mb-3 rent_dtl_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="form-group">
                                                    <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_rent_detail->translate('fr')->rent_detail_text}}" type="text" name="rent_detail_fr[{{$index}}]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rent_detail->id }}" data-deleteid="delete_car_rent_detail_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rent_details) <= 0 ||  $flag == false)
                                <div class="row mb-3 rent_dtl_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11">
                                        <div class="form-group">
                                            <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="rent_detail_fr[0]" id="rent_detail_text" placeholder={{ __('car.rent_detail_ext') }}">
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
                        <button class="btn btn-danger ms-1 add_rent_dtl" data-name="rent_detail" data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_specification') }}</h4>
                        @php
                            $car_specifications = (isset($$module_name_singular) && !empty($$module_name_singular->car_specifications)) ? $$module_name_singular->car_specifications : [];
                        @endphp
                        <div class="car_spec_block">
                            <input type="hidden" name="delete_car_specification_id" class="delete_car_specification_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_specifications) > 0)
                                @foreach($car_specifications as $index=>$car_specification)
                                    @if($car_specification->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_specification_id_fr[{{$index}}]" class="car_specification_id" value="{{ ($car_specification != NULL) ? $car_specification->id : ''}}">
                                        <div class="row mb-3 car_spec_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_specification->translate('fr')->specification_title}}" type="text" name="specification_title_fr[{{$index}}]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_specification->id }}" data-deleteid="delete_car_specification_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_specifications) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_spec_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="form-group">
                                            <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="specification_title_fr[0]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
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
                        <button class="btn btn-danger ms-1 add_car_spec_dtl" data-name="specification_title" data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>
                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_include') }}</h4>
                        @php
                            $car_rental_includes = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_includes)) ? $$module_name_singular->car_rental_includes : [];
                        @endphp
                        <div class="car_rent_in_block">
                            <input type="hidden" name="delete_car_rental_include_id" class="delete_car_rental_include_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_includes) > 0)
                                @foreach($car_rental_includes as $index=>$car_rental_include)
                                    @if($car_rental_include->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_include_id_fr[{{$index}}]" class="car_rental_include_id" value="{{ ($car_rental_include != NULL) ? $car_rental_include->id : ''}}">
                                        <div class="row mb-3 car_rent_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('fr')->key}}" type="text" name="rent_key_fr[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 " >
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('fr')->value}}" type="text" name="rent_value_fr[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_include->id }}" data-deleteid="delete_car_rental_include_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_includes) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_rent_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_key_fr[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 " >
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_value_fr[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1 add_car_rent_in_dtl" data-key="rent_key"  data-value="rent_value" data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_requirement') }}</h4>
                        @php
                            $car_rental_requirements = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_requirements)) ? $$module_name_singular->car_rental_requirements : [];
                        @endphp

                        <div class="car_ren_req_in_block">
                            <input type="hidden" name="delete_car_rental_requirement_id" class="delete_car_rental_requirement_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_requirements) > 0)
                                @foreach($car_rental_requirements as $index=>$car_rental_requirement)
                                    @if($car_rental_requirement->translate('fr'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_requirement_id_fr[{{$index}}]" class="car_rental_requirement_id" value="{{ ($car_rental_requirement != NULL) ? $car_rental_requirement->id : ''}}">
                                        <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('fr')->key}}"type="text" name="rent_req_key_fr[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('fr')->value}}"type="text" name="rent_req_value_fr[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_requirement->id }}" data-deleteid="delete_car_rental_requirement_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_requirements) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_key_fr[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_value_fr[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1  add_car_rent_req_in_dtl" data-key="rent_req_key"  data-value="rent_req_value" data-locale="fr"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>
                        <br>
                    </div>
                    <div id="additional_data_ru" class="tab inner-tab-cont">
                        <br>
                        <h4>{{ __('car.car_feature') }}</h4>
                        <div class="feature_block">
                            <input type="hidden" name="delete_car_feature_id" class="delete_car_feature_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_features) > 0)
                                @foreach($car_features as $index=>$car_feature)
                                    @if($car_feature->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_feature_id_ru[{{$index}}]" class="car_feature_id" value="{{ ($car_feature != NULL) ? $car_feature->id : ''}}">
                                        <div class="row mb-3 feature_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11  ">
                                                <div class="form-group">
                                                    <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_feature->translate('ru')->feature_title}}" type="text" name="feature_title_ru[{{$index}}]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_feature->id }}" data-deleteid="delete_car_feature_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn car_feature_close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_features) <= 0 ||  $flag == false)
                                <div class="row mb-3 feature_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11  ">
                                        <div class="form-group">
                                            <label class="form-label" for="feature_title">{{ __('car.feature_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" value ="" type="text" name="feature_title_ru[0]" id="feature_title" placeholder="{{ __('car.feature_title') }}">
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
                        <button class="btn btn-danger ms-1 add_feature" data-name="feature_title" data-locale="ru" id="add_feature"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_delivery') }}</h4>
                        @php
                            $car_delivery_pick_up_services = (isset($$module_name_singular) && !empty($$module_name_singular->car_delivery_pick_up_services)) ? $$module_name_singular->car_delivery_pick_up_services : [];
                        @endphp
                        <div class="service_block">
                            <input type="hidden" name="delete_car_delivery_pick_up_service_id" class="delete_car_delivery_pick_up_service_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_delivery_pick_up_services) > 0)
                                @foreach($car_delivery_pick_up_services as $index=>$car_delivery_pick_up_service)
                                    @if($car_delivery_pick_up_service->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_delivery_pick_up_service_id_ru[{{$index}}]" class="car_delivery_pick_up_service_id" value="{{ ($car_delivery_pick_up_service != NULL) ? $car_delivery_pick_up_service->id : ''}}">
                                        <div class="row mb-3 service_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 n">
                                                <div class="form-group">
                                                    <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_delivery_pick_up_service->translate('ru')->service_title}}" type="text" name="service_title_ru[{{$index}}]" id="service_title" placeholder="{{ __('car.service_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_delivery_pick_up_service->id }}" data-deleteid="delete_car_delivery_pick_up_service_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_delivery_pick_up_services) <= 0 ||  $flag == false)
                                <div class="row mb-3 service_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 n">
                                        <div class="form-group">
                                            <label class="form-label" for="service_title">{{ __('car.service_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="service_title_ru[0]" id="service_title" placeholder="{{ __('car.service_title') }}">
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
                        <button class="btn btn-danger ms-1 add_service" data-name="service_title" data-locale="ru"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rent') }}</h4>
                        @php
                            $car_rent_details = (isset($$module_name_singular) && !empty($$module_name_singular->car_rent_details)) ? $$module_name_singular->car_rent_details : [];
                        @endphp

                        <div class="rent_detail_block">
                            <input type="hidden" name="delete_car_rent_detail_id" class="delete_car_rent_detail_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rent_details) > 0)
                                @foreach($car_rent_details as $index=>$car_rent_detail)
                                    @if($car_rent_detail->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rent_detail_id_ru[{{$index}}]" class="car_rent_detail_id" value="{{ ($car_rent_detail != NULL) ? $car_rent_detail->id : ''}}">
                                        <div class="row mb-3 rent_dtl_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="form-group">
                                                    <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}<</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_rent_detail->translate('ru')->rent_detail_text}}" type="text" name="rent_detail_ru[{{$index}}]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rent_detail->id }}" data-deleteid="delete_car_rent_detail_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rent_details) <= 0 ||  $flag == false)
                                <div class="row mb-3 rent_dtl_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11">
                                        <div class="form-group">
                                            <label class="form-label" for="rent_detail_text">{{ __('car.rent_detail_ext') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="rent_detail_ru[0]" id="rent_detail_text" placeholder="{{ __('car.rent_detail_ext') }}">
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
                        <button class="btn btn-danger ms-1 add_rent_dtl" data-name="rent_detail" data-locale="ru"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_specification') }}</h4>
                        @php
                            $car_specifications = (isset($$module_name_singular) && !empty($$module_name_singular->car_specifications)) ? $$module_name_singular->car_specifications : [];
                        @endphp
                        <div class="car_spec_block">
                            <input type="hidden" name="delete_car_specification_id" class="delete_car_specification_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_specifications) > 0)
                                @foreach($car_specifications as $index=>$car_specification)
                                    @if($car_specification->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_specification_id_ru[{{$index}}]" class="car_specification_id" value="{{ ($car_specification != NULL) ? $car_specification->id : ''}}">
                                        <div class="row mb-3 car_spec_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" value ="{{$car_specification->translate('ru')->specification_title}}" type="text" name="specification_title_ru[{{$index}}]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_specification->id }}" data-deleteid="delete_car_specification_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_specifications) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_spec_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="form-group">
                                            <label class="form-label" for="specification_title">{{ __('car.specification_title') }}</label><span class="text-danger">*</span>
                                            <input class="form-control" type="text" name="specification_title_ru[0]" id="specification_title" placeholder="{{ __('car.specification_title') }}">
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
                        <button class="btn btn-danger ms-1 add_car_spec_dtl" data-name="specification_title" data-locale="ru"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_include') }}</h4>
                        @php
                            $car_rental_includes = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_includes)) ? $$module_name_singular->car_rental_includes : [];
                        @endphp
                        <div class="car_rent_in_block">
                            <input type="hidden" name="delete_car_rental_include_id" class="delete_car_rental_include_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_includes) > 0)
                                @foreach($car_rental_includes as $index=>$car_rental_include)
                                    @if($car_rental_include->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_include_id_ru[{{$index}}]" class="car_rental_include_id" value="{{ ($car_rental_include != NULL) ? $car_rental_include->id : ''}}">
                                        <div class="row mb-3 car_rent_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11 ">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('ru')->key}}" type="text" name="rent_key_ru[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 " >
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_include->translate('ru')->value}}" type="text" name="rent_value_ru[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_include->id }}" data-deleteid="delete_car_rental_include_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_includes) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_rent_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_key_ru[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 " >
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_value_ru[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1 add_car_rent_in_dtl" data-key="rent_key"  data-value="rent_value" data-locale="ru"><i class="fas fa-list-ul"></i> Add</button>

                        <br>
                        <hr>
                        <h4>{{ __('car.car_rental_requirement') }}</h4>
                        @php
                            $car_rental_requirements = (isset($$module_name_singular) && !empty($$module_name_singular->car_rental_requirements)) ? $$module_name_singular->car_rental_requirements : [];
                        @endphp

                        <div class="car_ren_req_in_block">
                            <input type="hidden" name="delete_car_rental_requirement_id" class="delete_car_rental_requirement_id" value="">
                            @php
                                $flag=false;
                            @endphp
                            @if(count($car_rental_requirements) > 0)
                                @foreach($car_rental_requirements as $index=>$car_rental_requirement)
                                    @if($car_rental_requirement->translate('ru'))
                                        @php
                                            $flag=true;
                                        @endphp
                                        <input type="hidden" name="car_rental_requirement_id_ru[{{$index}}]" class="car_rental_requirement_id" value="{{ ($car_rental_requirement != NULL) ? $car_rental_requirement->id : ''}}">
                                        <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "{{$index}}">
                                            <div class="col-11 col-sm-11">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('ru')->key}}"type="text" name="rent_req_key_ru[{{$index}}]" id="key" placeholder="{{ __('car.key') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6 ">
                                                        <div class="form-group">
                                                            <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                            <input class="form-control" value ="{{$car_rental_requirement->translate('ru')->value}}"type="text" name="rent_req_value_ru[{{$index}}]" id="value" placeholder="{{ __('car.value') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-1 text-center">
                                                <br>
                                                @if($index != 0)
                                                    <i data-id="{{ $car_rental_requirement->id }}" data-deleteid="delete_car_rental_requirement_id" data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @if(count($car_rental_requirements) <= 0 ||  $flag == false)
                                <div class="row mb-3 car_ren_req_in_block_in" data-fe_en = "0">
                                    <div class="col-11 col-sm-11 ">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="key">{{ __('car.key') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_key_ru[0]" id="key" placeholder="{{ __('car.key') }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 ">
                                                <div class="form-group">
                                                    <label class="form-label" for="value">{{ __('car.value') }}</label><span class="text-danger">*</span>
                                                    <input class="form-control" type="text" name="rent_req_value_ru[0]" id="value" placeholder="{{ __('car.value') }}">
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
                        <button class="btn btn-danger ms-1  add_car_rent_req_in_dtl" data-key="rent_req_key"  data-value="rent_req_value" data-locale="ru"><i class="fas fa-list-ul"></i> {{ __('car.add') }}</button>
                        <br>
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
                                    <label class="form-label" for="meta_title">{{ __('car.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_en" id="meta_keyword" placeholder="{{ __('car.meta_title') }}" value="{{$meta_title_en}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('car.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_en" id="meta_keyword_en" placeholder="{{ __('car.meta_keywords') }}" value="{{$meta_keyword_en}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="meta_description">{{ __('car.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_en" id="meta_description_en" placeholder="{{ __('car.meta_description') }}">{{$meta_description_en}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="meta_image">{{ __('car.feature_image') }}</label>
                                <input class="form-control" type="file" name="meta_image_en" id="meta_image_en" placeholder="{{ __('car.feature_image') }}" value="{{$feature_image_en}}">
                                @if(file_exists(public_path('frontend/Feature/Car/'.$feature_image_en)))
                                    <div class="image-thumbnain-wrapper">
                                        @if(!empty($feature_image_en))<img class="imageThumb ml10 " src="{{ url("frontend/Feature/Car/".$feature_image_en) }}" width="130" alt="1029">

                                            <a class="btn btn-danger" id="feature-image-delete">

                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="custom_url_slug">{{ __('car.custom_url_slug') }}</label> <span class="text-danger">*</span>
                                    <input class="form-control" type="text" name="custom_url_slug" id="custom_url_slug" placeholder="{{ __('car.custom_url_slug') }}" value="{{$custom_url_slug}}">
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
                                    <label class="form-label" for="meta_title">{{ __('car.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_ar" id="meta_keyword" placeholder="{{ __('car.meta_title') }}" value="{{$meta_title_ar}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('car.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_ar" id="meta_keyword_ar" placeholder="{{ __('car.meta_keywords') }}" value="{{$meta_keyword_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="meta_description">{{ __('car.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_ar" id="meta_description_ar" placeholder="{{ __('car.meta_description') }}">{{$meta_description_ar}}</textarea>
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
                                    <label class="form-label" for="meta_title">{{ __('car.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_fr" id="meta_keyword_fr" placeholder="{{ __('car.meta_title') }}" value="{{$meta_title_fr}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('car.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_fr" id="meta_keyword_fr" placeholder="{{ __('car.meta_keywords') }}" value="{{$meta_keyword_fr}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="meta_description">{{ __('car.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_fr" id="meta_description_fr" placeholder="{{ __('car.meta_description') }}n">{{$meta_description_fr}}</textarea>
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
                                    <label class="form-label" for="meta_title">{{ __('car.meta_title') }}</label>
                                    <input class="form-control" type="text" name="meta_title_ru" id="meta_keyword_ru" placeholder="{{ __('car.meta_title') }}" value="{{$meta_title_ru}}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="meta_keyword">{{ __('car.meta_keywords') }}</label>
                                    <input class="form-control" type="text" name="meta_keyword_ru" id="meta_keyword_ru" placeholder="{{ __('car.meta_keywords') }}" value="{{$meta_keyword_ru}}">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="meta_description">{{ __('car.meta_description') }}</label>
                                    <textarea class="form-control" type="text" name="meta_description_ru" id="meta_description_ru" placeholder="{{ __('car.meta_description') }}n">{{$meta_description_ru}}</textarea>
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
<x-library.select2/>
<script type="module">


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
@if(isset($car))
    <script>
        $(document).ready(function () {
            $(document).on("click", "#feature-image-delete", function() {
                swal({
                    title: '',
                    text: '{{ __("car.feature_image_delete") }}',
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
                    $.ajax({
                        type: "get",
                        url: "{{ route('backend.cars.delete',$$module_name_singular->id) }}",
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
@if(isset($car))
    <script>
        $(document).ready(function () {
            $(document).on("click", "#delete-details", function() {
                swal({
                    title: '',
                    text: '{{ __("car.delete_permanently") }}',
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
                            url: "{{ route('backend.cars.delete_details',$$module_name_singular->id) }}",
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


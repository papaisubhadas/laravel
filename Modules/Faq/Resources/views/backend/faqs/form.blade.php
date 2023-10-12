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
    <p><strong>{{__('faq.note')}}</strong> {{__('faq.You_must_enter')}}
        <strong>{{__('faq.title')}} </strong> {{__('faq.and')}}
        <strong>{{__('faq.description')}}</strong> {{__('faq.submit_text')}}</p>
    <div class="tabs_c tabs_c1">
        <ul class="tabs_c-list">
            <li class="active"><a href="#general_en">EN</a></li>
            <li class=""><a href="#general_ar">AR</a></li>
            <li class=""><a href="#general_fr">FR</a></li>
            <li class=""><a href="#general_ru">RU</a></li>
        </ul>
        @php

            @endphp
        <div id="general_en" class="tab active">
            <br/>

            <div class="row mb-3">
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'name';
                        $field_lable = __('faq.faq_content.create.name');
                        $field_placeholder = __('faq.faq_content.create.name');
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_lable)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'slug';
                        $field_lable = __('faq.faq_content.create.slug');
                        $field_placeholder = __('faq.faq_content.create.slug');
                        $required = "";
                        ?>
                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'status';
                        $field_lable = __('faq.faq_content.create.status');
                        $field_placeholder = "-- Select an option --";
                        $required = "required";
                        $select_options = [
                            'active' => 'Active',
                            'inactive' => 'In Active'
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
                <div class="col-12 col-sm-4 d-none">
                    <div class="form-group">
                        <?php
                        $field_name = 'type';
                        $field_lable = __('faq.faq_content.create.type');
                        $field_placeholder = "-- Select an option --";
                        $required = "required";
                        $select_options = [
                            'car' => 'Car',
                            'car-type'=>'Car Type',
                            'car-brand' => 'Car Brand',
                            'deal'=>'Deal',
                            'faq'=>'Faq',
                            'contact-us'=>'Contact Us'
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
            </div>

            <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
            @php
                $faq_qa_details = (isset($faq_data) && !empty($faq_data->faq_qa_details)) ? $faq_data->faq_qa_details : [];
            @endphp
            <div class="car_add_block">
                <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                @php
                    $flag=false;
                @endphp
                @if(count($faq_qa_details) > 0)
                    @foreach($faq_qa_details as $index=>$faq_qa_detail)
                        @if($faq_qa_detail->translate('en'))
                            @php
                                $flag=true;
                            @endphp
                            <input type="hidden" name="faq_qa_details_id_en[{{$index}}]" class="faq_qa_details_id"
                                   value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->id : ''}}">
                            <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('en')->question}}" type="text"
                                                       name="question_en[{{$index}}]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('en')->answer}}" type="text"
                                                       name="answer_en[{{$index}}]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    @if($index != 0)
                                        <i data-id="{{ $faq_qa_detail->id }}" data-deleteid="delete_faq_qa_details_id"
                                           data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if(count($faq_qa_details) <= 0 ||  $flag == false)
                    <div class="row mb-3 car_add_block_in" data-fe_en="0">
                        <div class="col-11 col-sm-11 ">
                            <div class="row">
                                <div class="col-12 col-sm-6 ">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                            class="text-danger">*</span>
                                        <input class="form-control" type="text" name="question_en[0]" id="question"
                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                            class="text-danger">*</span>
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


        </div>
        <div id="general_ar" class="tab ">
            <br/>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">

                </div>
            </div>

            <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
            @php
                $faq_qa_details = (isset($$module_name_singular) && !empty($$module_name_singular->faq_qa_details)) ? $$module_name_singular->faq_qa_details : [];
            @endphp
            <div class="car_add_block">
                <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                @php
                    $flag=false;
                @endphp
                @if(count($faq_qa_details) > 0)
                    @foreach($faq_qa_details as $index=>$faq_qa_detail)
                        @if($faq_qa_detail->translate('ar'))
                            @php
                                $flag=true;
                            @endphp
                            <input type="hidden" name="faq_qa_details_id_ar[{{$index}}]" class="faq_qa_details_id"
                                   value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->id : ''}}">
                            <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('ar')->question}}" type="text"
                                                       name="question_ar[{{$index}}]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('ar')->answer}}" type="text"
                                                       name="answer_ar[{{$index}}]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    @if($index != 0)
                                        <i data-id="{{ $faq_qa_detail->id }}" data-deleteid="delete_faq_qa_details_id"
                                           data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if(count($faq_qa_details) <= 0 ||  $flag == false)
                    <div class="row mb-3 car_add_block_in" data-fe_en="0">
                        <div class="col-11 col-sm-11 ">
                            <div class="row">
                                <div class="col-12 col-sm-6 ">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                            class="text-danger">*</span>
                                        <input class="form-control" type="text" name="question_ar[0]" id="question"
                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                            class="text-danger">*</span>
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
        <div id="general_fr" class="tab ">
            <br/>
            <div class="row mb-3">
                <div class="col-12 col-sm-4">

                </div>
            </div>

            <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
            @php
                $faq_qa_details = (isset($$module_name_singular) && !empty($$module_name_singular->faq_qa_details)) ? $$module_name_singular->faq_qa_details : [];
            @endphp
            <div class="car_add_block">
                <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                @php
                    $flag=false;
                @endphp
                @if(count($faq_qa_details) > 0)
                    @foreach($faq_qa_details as $index=>$faq_qa_detail)
                        @if($faq_qa_detail->translate('fr'))
                            @php
                                $flag=true;
                            @endphp
                            <input type="hidden" name="faq_qa_details_id_fr[{{$index}}]" class="faq_qa_details_id"
                                   value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->id : ''}}">
                            <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('fr')->question}}" type="text"
                                                       name="question_fr[{{$index}}]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('fr')->answer}}" type="text"
                                                       name="answer_fr[{{$index}}]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 text-center">
                                    <br>
                                    @if($index != 0)
                                        <i data-id="{{ $faq_qa_detail->id }}" data-deleteid="delete_faq_qa_details_id"
                                           data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                @if(count($faq_qa_details) <= 0 ||  $flag == false)
                    <div class="row mb-3 car_add_block_in" data-fe_en="0">
                        <div class="col-11 col-sm-11 ">
                            <div class="row">
                                <div class="col-12 col-sm-6 ">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                            class="text-danger">*</span>
                                        <input class="form-control" type="text" name="question_fr[0]" id="question"
                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                            class="text-danger">*</span>
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

        </div>
        <div id="general_ru" class="tab ">
            <br/>
            <div class="row mb-3">

            </div>

            <h4>{{ __('faq.faq_content.create.question_and_answers') }}</h4>
            @php
                $faq_qa_details = (isset($$module_name_singular) && !empty($$module_name_singular->faq_qa_details)) ? $$module_name_singular->faq_qa_details : [];
            @endphp
            <div class="car_add_block">
                <input type="hidden" name="delete_faq_qa_details_id" class="delete_faq_qa_details_id" value="">
                @php
                    $flag=false;
                @endphp
                @if(count($faq_qa_details) > 0)
                    @foreach($faq_qa_details as $index=>$faq_qa_detail)
                        @if($faq_qa_detail->translate('ru'))
                            @php
                                $flag=true;
                            @endphp
                            <input type="hidden" name="faq_qa_details_id_ru[{{$index}}]" class="faq_qa_details_id"
                                   value="{{ ($faq_qa_detail != NULL) ? $faq_qa_detail->id : ''}}">
                            <div class="row mb-3 car_add_block_in" data-fe_en="{{$index}}">
                                <div class="col-11 col-sm-11 ">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 ">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('ru')->question}}" type="text"
                                                       name="question_ru[{{$index}}]" id="question"
                                                       placeholder="{{ __('faq.faq_content.create.question') }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                    class="text-danger">*</span>
                                                <input class="form-control"
                                                       value="{{$faq_qa_detail->translate('ru')->answer}}" type="text"
                                                       name="answer_ru[{{$index}}]" id="answer"
                                                       placeholder="{{ __('faq.faq_content.create.answer') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-1 text-center">
                                        <br>
                                        @if($index != 0)
                                            <i data-id="{{ $faq_qa_detail->id }}" data-deleteid="delete_faq_qa_details_id"
                                               data-exist="true" class="nav-icon fa-regular fa fa-times close_btn"></i>
                                        @endif
                                    </div>
                                </div>@endif
                                @endforeach
                                @endif
                                @if(count($faq_qa_details) <= 0 ||  $flag == false)
                                    <div class="row mb-3 car_add_block_in" data-fe_en="0">
                                        <div class="col-11 col-sm-11 ">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 ">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="question">{{ __('faq.faq_content.create.question') }}</label><span
                                                            class="text-danger">*</span>
                                                        <input class="form-control" type="text" name="question_ru[0]"
                                                               id="question"
                                                               placeholder="{{ __('faq.faq_content.create.question') }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                               for="answer">{{ __('faq.faq_content.create.answer') }}</label><span
                                                            class="text-danger">*</span>
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
        </div>
    </div>

    <x-library.select2/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="module">

        //tab
        $(document).ready(function () {

            $(".tabs_c li a").click(function (e) {
                e.preventDefault();
            });

            $(".tabs_c1 ul li").click(function () {

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

            $(".add_car_add_dtl").click(function (ev) {
                ev.preventDefault();
                var i;
                if ($(this).siblings(".car_add_block").find('div').hasClass('car_add_block_in')) {
                    i = $(this).siblings(".car_add_block").find('.car_add_block_in').last().data('fe_en') + 1;
                } else {
                    i = 0;
                }

                var add_item_heml = '<div class="row mb-3 car_add_block_in" data-fe_en = "' + i + '">' +
                    '<div class="col-11 col-sm-11">' +
                    '<div class="row">' +
                    '<div class="col-12 col-sm-6 ">' +
                    '<div class="form-group">' +
                    '<label class="form-label" for="question">{{ __('faq.faq_content.create.question') }}</label><span class="text-danger">*</span>' +
                    ' <input class="form-control" type="text" name="' + $(this).data('key') + '_' + $(this).data('locale') + '[' + i + '] " id="question" placeholder="{{ __('faq.faq_content.create.question') }}">' +
                    ' </div>' +
                    '</div>' +
                    '<div class="col-12 col-sm-6">' +
                    '<div class="form-group">' +
                    '<label class="form-label" for="answer">{{ __('faq.faq_content.create.answer') }}</label><span class="text-danger">*</span>' +
                    '<input class="form-control" type="text" name="' + $(this).data('value') + '_' + $(this).data('locale') + '[' + i + '] " id="answer" placeholder="{{ __('faq.faq_content.create.answer') }}">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    ' </div>' +
                    '<div class="col-1 text-center">' +
                    '<br>' +
                    '<i class="nav-icon fa-regular fa fa-times close_btn"></i>' +
                    ' </div>' +
                    '</div>';
                $(this).siblings(".car_add_block").append(add_item_heml);
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

            $(document).on("submit", ".ajaxifyForm", function (event) {
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
                    type: "POST",
                    data: formData, //pass the formdata object
                    cache: false,
                    contentType: false, //tell jquery to avoid some checks
                    processData: false,
                    dataType: 'json',
                    // data:/*data*/$(this).serialize() ,
                    success: function (response) {
                        if (response.status == 0) {
                            if (response.errors == 'Please Upload Resume in Profile Page Then Apply For Job') {
                                toastr.error(response.errors, 'Response');
                                setTimeout(function () {
                                    window.location.href = response.redirect
                                }, 2600);
                            } else {
                                var errors = response.errors;
                                var errorsHtml = '';

                                $('.error-msg').append('<p><i class="fas fa-exclamation-triangle"></i> Please fix the following errors &amp; try again!    </p><ul>');
                                $.each(errors, function (key, value) {
                                    if (key.includes('.')) {
                                        var key_val = key.split('.');
                                        key = key_val[0] + '_' + key_val[1];
                                    }
                                    ;
                                    errorsHtml += '<li>' + value + '</li>';
                                });

                                $(window).scrollTop(0);
                                $('.error-msg').append(errorsHtml + '</ul>');
                                $('.error-msg').show();

                                $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                            }
                            return;
                        } else {

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
                    error: function (error) {
                        var errors = error.response.errors;
                        var errorsHtml = '';
                        $.each(errors, function (key, value) {
                            $('.' + key + '_err').text(value);
                        });
                        $(".formSaving").html('<i class="fas fa-sync"></i> Try Again</span>');
                    },
                });

            });

        });


    </script>








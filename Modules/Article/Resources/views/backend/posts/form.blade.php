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
    <p><strong>{{__('article-page.note')}}</strong> {{__('article-page.You_must_enter')}} <strong>{{__('article-page.title')}}</strong> {{__('article-page.and')}} <strong>{{__('article-page.description')}}</strong> {{__('article-page.submit_text')}}</p>
    <div class="tabs_c tabs_c1">
        <ul class="tabs_c-list">
            <li class="active"><a href="#general_en">EN</a></li>
            <li class=""><a href="#general_ar">AR</a></li>
            <li class=""><a href="#general_fr">FR</a></li>
            <li class=""><a href="#general_ru">RU</a></li>
        </ul>
        @php
        // dd($$module_name_singular->meta_title);
            $name_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->name : '';
            $name_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->name : '';
            $name_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->name : '';
            $name_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->name : '';

            // $intro_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->intro : '';
            // $intro_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->intro : '';
            // $intro_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->intro : '';
            // $intro_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->intro : '';

            $content_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->content : '';
            $content_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->content : '';
            $content_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->content : '';
            $content_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->content : '';

            $featured_image_en = (isset($$module_name_singular) && $$module_name_singular) ? $$module_name_singular->translate("en")->featured_image : '';

            $meta_title_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_title : '';
            $meta_title_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_title : '';
            $meta_title_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_title : '';
            $meta_title_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_title : '';
            // dd($meta_title_en);

            $meta_description_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_description : '';
            $meta_description_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_description : '';
            $meta_description_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_description : '';
            $meta_description_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_description : '';

            $meta_keyword_en = (isset($$module_name_singular) && $$module_name_singular->translate('en')) ? $$module_name_singular->translate('en')->meta_keywords : '';
            $meta_keyword_ar = (isset($$module_name_singular) && $$module_name_singular->translate('ar')) ? $$module_name_singular->translate('ar')->meta_keywords : '';
            $meta_keyword_fr = (isset($$module_name_singular) && $$module_name_singular->translate('fr')) ? $$module_name_singular->translate('fr')->meta_keywords : '';
            $meta_keyword_ru = (isset($$module_name_singular) && $$module_name_singular->translate('ru')) ? $$module_name_singular->translate('ru')->meta_keywords : '';
        @endphp
        <div id="general_en" class="tab active">
            <br/>

            <div class="row mb-3">
                <div class="col-5">
                    <div class="form-group">
                        <?php
                        $field_name = 'name_en';
                        $field_lable = __('article-page.post.create.name');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($name_en) }}
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <?php
                        $field_name = 'slug';
                        $field_lable = __('article-page.post.create.slug');
                        $field_placeholder = $field_lable;
                        $required = "";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'created_by_alias';
                        $field_lable = __('article-page.post.create.author_name_alias');
                        $field_placeholder = "Hide Author User's Name and use Alias";
                        $required = "";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'intro_en';
                        $field_lable =__('article-page.post.create.intro');
                        $field_placeholder = $field_lable;
                        // $required = "required";
                        // {!! fielf_required($required) !!}
                        ?>
                        {{ html()->label($field_lable, $field_name) }}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->value($intro_en) }}
                    </div>
                </div>
            </div> --}}

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'content_en';
                        $field_lable = __('article-page.post.create.content');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($content_en) }}
                    </div>
                </div>
            </div>
            @if(isset($featured_image_en) && !empty($featured_image_en) && file_exists(public_path("frontend/posts/$featured_image_en")))
                <div class="image-thumbnain-wrapper">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group">

                                    <img src="{{ url("frontend/posts/$featured_image_en") }}" height="150" width="200" />
                                    <a class="btn btn-danger" id="feature-image-delete">

                                        <i class="fas fa-trash-alt"></i>
                                    </a>


                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'featured_image_en';
                        $field_lable = __('article-page.post.create.featured_image');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        <div class="input-group mb-3">
                            <input id="featured_image_en" name="featured_image_en" multiple="" type="file" class="form-control" placeholder="Choose Image">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'type';
                        $field_lable = __('article-page.post.create.type');
                        $field_placeholder = __("Select an option");
                        $required = "required";
                        $select_options = [
                            'Article' => 'Article',
                            'Feature' => 'Feature',
                            'News' => 'News',
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <?php
                        $field_name = 'is_featured';
                        $field_lable = __('article-page.post.create.is_featured');
                        $field_placeholder = __("Select an option");
                        $required = "required";
                        $select_options = [
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <?php
                        $field_name = 'status';
                        $field_lable = __('article-page.post.create.status');
                        $field_placeholder = __("Select an option");
                        $required = "required";
                        $select_options = [
                            'active' => 'Active',
                            'inactive' => 'In Active',
                        ];
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2') }}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <?php
                        $field_name = 'published_at';
                        $field_lable =  __('article-page.post.create.published_at');
                        $field_placeholder = $field_lable;
                        $required = "";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        <div class="input-group date datetime" id="{{$field_name}}" data-target-input="nearest">
                            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control datetimepicker-input')->attributes(["$required", 'data-target'=>"#$field_name"]) }}
                            <div class="input-group-append" data-target="#{{$field_name}}" data-toggle="datetimepicker">
                                <span class="input-group-text">&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_title_ar">Meta Title</label>
                        <input class="form-control" type="text"  value="{{$meta_title_en}}" name="meta_title_en" id="meta_title_en" placeholder="Meta Title" autocomplete="off" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input class="form-control" type="text"  value="{{$meta_keyword_en}}" name="meta_keywords_en" id="meta_keywords_en" placeholder="Meta Keywords">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input class="form-control" type="text"  value="{{$meta_description_en}}" name="meta_description_en" id="meta_description_ar" placeholder="Meta Description" autocomplete="off">
                    </div>
                </div>
            </div>
            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'meta_og_url';
                        $field_lable = __('article-page.post.create.meta_og_url');
                        $field_placeholder = $field_lable;
                        $required = "";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control') }}
                    </div>
                </div>
            </div> --}}

        </div>
        <div id="general_ar" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-5">
                    <div class="form-group">
                        <?php
                        $field_name = 'name_ar';
                        $field_lable = __('article-page.post.create.name');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($name_ar) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'intro_ar';
                        $field_lable = __('article-page.post.create.intro');
                        $field_placeholder = $field_lable;
                        // $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->value($intro_ar) }}
                    </div>
                </div>
            </div> --}}

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'content_ar';
                        $field_lable = __('article-page.post.create.content');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($content_ar) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        @if(isset($featured_image_ar) && !empty($featured_image_ar))
                            <img src="{{ url("frontend/posts/$featured_image_ar") }}" height="150" width="200" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'featured_image_ar';
                        $field_lable = __('article-page.post.create.featured_image');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        <div class="input-group mb-3">
                            <input id="featured_image_ar" name="featured_image_ar" multiple="" type="file" class="form-control" placeholder="Choose Image">

                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_title_ar">Meta Title</label>
                        <input class="form-control" type="text"  value="{{$meta_title_ar}}" name="meta_title_ar" id="meta_title_ar" placeholder="Meta Title" autocomplete="off" >
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input class="form-control" type="text"  value="{{$meta_keyword_ar}}" name="meta_keywords_ar" id="meta_keywords_ar" placeholder="Meta Keywords">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input class="form-control" type="text"  value="{{$meta_description_ar}}" name="meta_description_ar" id="meta_description_ar" placeholder="Meta Description" autocomplete="off">
                    </div>
                </div>
            </div>


        </div>
        <div id="general_fr" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-5">
                    <div class="form-group">
                        <?php
                        $field_name = 'name_fr';
                        $field_lable = __('article-page.post.create.name');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($name_fr) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'intro_fr';
                        $field_lable = __('article-page.post.create.intro');
                        $field_placeholder = $field_lable;
                        // $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->value($intro_fr) }}
                    </div>
                </div>
            </div> --}}

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'content_fr';
                        $field_lable = __('article-page.post.create.content');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($content_fr) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        @if(isset($featured_image_fr) && !empty($featured_image_fr))
                            <img src="{{ url("frontend/posts/$featured_image_fr") }}" height="150" width="200" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'featured_image_fr';
                        $field_lable = __('article-page.post.create.featured_image');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        <div class="input-group mb-3">
                            <input id="featured_image_fr" name="featured_image_fr" multiple="" type="file" class="form-control" placeholder="Choose Image">

                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_title_ar">Meta Title</label>
                        <input class="form-control" type="text" value="{{$meta_title_fr}}" name="meta_title_fr" id="meta_title_fr" placeholder="Meta Title" autocomplete="off">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input class="form-control" type="text" value="{{$meta_keyword_fr}}" name="meta_keywords_fr" id="meta_keywords_fr" placeholder="Meta Keywords">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input class="form-control" type="text" value="{{$meta_description_fr}}" name="meta_description_fr" id="meta_description_fr" placeholder="Meta Description" autocomplete="off">
                    </div>
                </div>
            </div>

        </div>
        <div id="general_ru" class="tab ">
            <br/>

            <div class="row mb-3">
                <div class="col-5">
                    <div class="form-group">
                        <?php
                        $field_name = 'name_ru';
                        $field_lable = __('article-page.post.create.name');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->value($name_ru) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'intro_ru';
                        $field_lable = __('article-page.post.create.intro');
                        $field_placeholder = $field_lable;
                        // $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->value($intro_ru) }}
                    </div>
                </div>
            </div> --}}

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'content_ru';
                        $field_lable = __('article-page.post.create.content');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control content')->value($content_ru) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        @if(isset($featured_image_ru) && !empty($featured_image_ru))
                            <img src="{{ url("frontend/posts/$featured_image_ru") }}" height="150" width="200" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <?php
                        $field_name = 'featured_image_ru';
                        $field_lable = __('article-page.post.create.featured_image');
                        $field_placeholder = $field_lable;
                        $required = "required";
                        ?>
                        {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                        <div class="input-group mb-3">
                            <input id="featured_image_ru" name="featured_image_ru" multiple="" type="file" class="form-control" placeholder="Choose Image">

                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row mb-3">
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_title_ar">Meta Title</label>
                        <input class="form-control" type="text"  value="{{$meta_title_ru}}" name="meta_title_ru" id="meta_title_ru" placeholder="Meta Title" autocomplete="off">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input class="form-control" type="text"  value="{{$meta_keyword_ru}}" name="meta_keywords_ru" id="meta_keywords_ru" placeholder="Meta Keywords">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input class="form-control" type="text"  value="{{$meta_description_ru}}" name="meta_description_ru" id="meta_description_ru" placeholder="Meta Description" autocomplete="off">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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

    });


</script>



<!-- Select2 Library -->
<x-library.select2 />
<x-library.datetime-picker />

@push('after-styles')
<!-- File Manager -->
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame :after {
        display: none;
    }

    .note-editor .note-toolbar .note-dropdown-menu,
    .note-popover .popover-content .note-dropdown-menu {
        min-width: 180px;
    }
</style>
<style>
    .note-editor .note-toolbar .note-dropdown-menu, .note-popover .popover-content .note-dropdown-menu{
        min-width: 200px !important;
    }
</style>
@endpush

@push ('after-scripts')
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script type="module">
    const FMButton = function(context) {
        const ui = $.summernote.ui;
        const button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'File Manager',
            click: function() {
                window.open('/file-manager/summernote', 'fm', 'width=1000,height=800');
            }
        });
        return button.render();
    };

    $('.content').summernote({
        height: 200,

    });
</script>


<script type="module">
    $(document).ready(function() {
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });



        {{--$('.select2-category').select2({--}}
        {{--    theme: "bootstrap",--}}
        {{--    placeholder: '@lang("Select an option")',--}}
        {{--    minimumInputLength: 2,--}}
        {{--    allowClear: true,--}}
        {{--    ajax: {--}}
        {{--        url: '{{route("backend.categories.index_list")}}',--}}
        {{--        dataType: 'json',--}}
        {{--        data: function(params) {--}}
        {{--            return {--}}
        {{--                q: $.trim(params.term)--}}
        {{--            };--}}
        {{--        },--}}
        {{--        processResults: function(data) {--}}
        {{--            return {--}}
        {{--                results: data--}}
        {{--            };--}}
        {{--        },--}}
        {{--        cache: true--}}
        {{--    }--}}
        {{--});--}}

        $('.select2-tags').select2({
            theme: "bootstrap",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.tags.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });

    // Date Time Picker
    $('.datetime').tempusDominus({
        localization: {
            locale: 'en',
            format: 'yyyy-MM-dd HH:mm:ss'
        }
    });
</script>
@endpush
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@if(isset($post))
<script>
    $(document).ready(function () {
        $(document).on("click", "#feature-image-delete", function() {
            if (confirm('{{ __('article-page.feature_image_delete') }}')) {
                var id ="{{$$module_name_singular->id}}";
                $.ajax({
                    type: "get",
                    url: "{{ route('backend.posts.delete',$$module_name_singular->id) }}",
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
</script>
@endif
@if(isset($post))
    <script>
        $(document).ready(function () {
            $(document).on("click", "#delete-details", function() {
                swal({
                    title: '',
                    text: '{{ __("article-page.delete_permanently") }}',
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
                            url: "{{ route('backend.posts.delete_details',$$module_name_singular->id) }}",
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

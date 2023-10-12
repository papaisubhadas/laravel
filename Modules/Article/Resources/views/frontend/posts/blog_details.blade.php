{{-- {{die($feature_image)}} --}}
@extends('frontend.layouts.app')
@section('title', $meta_title)
@section('meta_title', $$module_name_singular->meta_title)
@section('meta_keywords', $$module_name_singular->meta_keywords)
@section('meta_description', $$module_name_singular->meta_description)

@section('metadata')
    @if(file_exists("frontend/posts/".$feature_image) && !empty($feature_image))
        <meta property="og:image" content="{{  url('frontend/posts/'.$feature_image) }}" />
        <meta name="twitter:image" content="{{  url('frontend/posts/'.$feature_image) }}" />
    @endif
@endsection

@section('styles')
    <style>
        .car_facilities img, .car_facilities i {
            width: 24px;
        }

        @media (max-width: 767px) {
            .border_bottom_fix {
                border-bottom: 1px solid #5F5F5F;
            }

            .xs-pb-2 {
                padding-bottom: 0.5rem !important;
            }

            .xs-pt-2 {
                padding-top: 0.5rem !important;
            }
        }
        .blog_details_top_image {
        width: 100%;
        overflow: hidden;
        display: flex;
        align-content: center;
        justify-content: center;
        }
        .blog_details_top_image img {  width: 100%;  }
    </style>
@stop
@section('content')
<div class="color_hr"></div>
<section class="container">
    <nav class="pt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        {{ Breadcrumbs::render('blog_details',array('title' => $$module_name_singular->name, 'slug' => $$module_name_singular->slug)) }}
    </nav>
</section>
<section class="bg-gray-100 text-gray-600 body-font px-20">
    <div class="container mx-auto flex px-3 px-md-3 py-8 sm:py-16 md:flex-row flex-col items-center">
        <div class="row">
            <div class="col-lg-8">
                <div class="lg:flex-grow sm:w-4/12 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center ">

                    <h1 class="blog_detail_title">{{ $$module_name_singular->name }}</h1><br>
                    <?php $blog=$$module_name_singular; ?>
                    <span>{{ (!empty(blogdetails_article_schema($blog,'b')) ? '' : '') }}<span>

                    {{-- @if($$module_name_singular->intro != "")
                    <h3 class="mb-8 leading-relaxed">
                        {{$$module_name_singular->intro}}
                    </h3>
                    @endif --}}

                    {{-- @include('frontend.includes.messages') --}}
                </div>
                @php
                    $featured_image = $blog->featured_image
                @endphp
                @if(!file_exists(public_path('frontend/posts/' . $blog->translate("en")->featured_image)))
                    @php
                        $featured_image = $blog->translate("en")->featured_image
                    @endphp
                @endif
                <div class="sm:w-8/12">
                    <div class="blog_details_top_image pb-3">

                        <img class="object-cover object-center rounded shadow-md blog_img" alt="{{$$module_name_singular->name}}"  src="{{ asset('frontend/posts/'.$blog->translate("en")->featured_image) }}" onerror="this.src='{{ asset('image-not-found.webp') }}'">

                    </div>
                </div>
                <section class="blog_details">
                    <div class="container mx-auto flex px-0 py-10 md:flex-row flex-col">
                        <div class="row">
                        <div class="flex flex-col lg:flex-grow sm:w-8/12 sm:pr-8">
                            <div class="pb-5 text_justify_fix">
                                <p>
                                    {!!$$module_name_singular->content!!}
                                </p>
                            </div>

                            <hr>

                            <div class="py-5">
                                <div class="flex justify-between font-bold">
                                    <div>
                                        {{__('text.written_by')}}: {{isset($$module_name_singular->created_by_alias)? $$module_name_singular->created_by_alias : $$module_name_singular->created_by_name}}
                                    </div>
                                    <div>

                                        {{__('text.published_at')}}: @if(!empty($$module_name_singular->published_at)){{$$module_name_singular->published_at->isoFormat('llll')}}@endif
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="flex flex-row justify-between content-center items-center py-5">
                                <p>
                                    <span class="font-weight-bold">
                                        @lang('Category'):
                                    </span>

                                    <a href="{{route('frontend.categories.show', [encode_id($$module_name_singular->category_id), $$module_name_singular->slug])}}" class="m-2 p-2 bg-gray-100 rounded border-transparent border hover:border-gray-800 transition ease-out duration-300">{{$$module_name_singular->category_name}}</a>
                                </p>

                                @if (count($$module_name_singular->tags))
                                <p>
                                    <span class="font-weight-bold">
                                        @lang('Tags'):
                                    </span>

                                    @foreach ($$module_name_singular->tags as $tag)
                                    <a href="{{route('frontend.tags.show', [encode_id($tag->id), $tag->slug])}}" class="m-2 p-2 bg-gray-100 rounded border-transparent border hover:border-gray-800 transition ease-out duration-300">{{$tag->name}}</a>
                                    @endforeach
                                </p>
                                @endif
                            </div>

                            <div class="py-5">
                                <div class="flex flex-row justify-around content-center items-center ">
                                    <h6 class="">Share with others</h6>

                                    <div>
                                        @php $title_text = $$module_name_singular->name; @endphp

                                        <button data-title='Share on Twitter' data-placement="top" class="tooltip p-2 m-2 hover:shadow-lg transition ease-out duration-300 border border-gray-400 hover:border-gray-600 hover:bg-gray-100 rounded-sm" data-sharer="twitter" data-via="muktolibrary" data-title="{{$title_text}}" data-hashtags="muktolibrary" data-url="{{url()->full()}}" data-toggle="tooltip" title="Share on Twitter" data-original-title="Share on Twitter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                            </svg>
                                        </button>

                                        <button data-title='Share on Facebook' data-placement="top" class="tooltip p-2 m-2 hover:shadow-lg transition ease-out duration-300 border border-gray-400 hover:border-gray-600 hover:bg-gray-100 rounded-sm" data-sharer="facebook" data-hashtag="muktolibrary" data-url="{{url()->full()}}" data-toggle="tooltip" title="Share on Facebook" data-original-title="Share on Facebook">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="py-5">
                                @include('article::frontend.posts.blocks.comments')
                            </div> --}}
                        </div>
                        <div class="col-md-12 col-12 d-none" >
                                <div class="reply_form">
                                     <h4>{{ __('text.leave_a_reply') }}</h4>
                                     <p>{{__('text.your_email_msg')}} *</p>
                                     <form action="">
                                        <div class="first_field">
                                            <div class="form_field">
                                                <label for="">{{ __('text.name') }} * </label>
                                                <input type="text" name="" id="">
                                            </div>
                                            <div class="form_field email_field" >
                                                <label for="">{{ __('text.email') }} *</label>
                                                <input type="email" name="" id="">
                                            </div>
                                            <div class="form_field">
                                                <label for=""> {{ __('text.website') }} </label>
                                                <input type="text" name="" id="">
                                            </div>
                                        </div>
                                        <div class="form_field">
                                            <label for=""> {{ __('text.comment') }} * </label>
                                            <textarea name="" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="save_details_check">
                                            <input type="checkbox" name="" id="save_details">
                                            <label for="save_details">  {{__('text.conf_msg')}}</label>
                                        </div>
                                        <button class="gold_btn" type="submit" aria-label="{{__('text.post_cmnt')}}">{{__('text.post_cmnt')}}  </button>
                                     </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{-- <div class="flex flex-col sm:w-4/12">
                            <div class="py-5 sm:pt-0">
                                <livewire:recent-posts />
                            </div>
                        </div> --}}

                </section>
            </div>
            <div class="col-lg-4">
                @include('article::frontend.posts.blocks.common_rightside')
            </div>
        </div>
</section>
<script type="application/ld+json">
    @php $blogdetails_article_schema = blogdetails_article_schema($blog) @endphp
    @if(!empty($blogdetails_article_schema))
    "<?php echo $blogdetails_article_schema; ?>";
    @endif
</script>
@stop
@push ("after-scripts")
<script type="module" src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
@endpush

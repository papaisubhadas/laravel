@extends('frontend.layouts.app')

@section('title', 'Friends Car Rental - ' . __('Blogs'))

@section('styles')
    <style>
        .m_blog_fix {
            display: flex;
            align-items: center;
            max-height: 160px;
            overflow: hidden;
            border-radius: 20px 20px 0 0;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            float: none;
        }

        .car_facilities img,
        .car_facilities i {
            width: 24px;
        }

        .blog_imgfixed {
            overflow: hidden;
            display: flex;
            align-items: center;
            max-height: 230px;
            border-radius: 20px 20px 0px 0px;
        }

        .blog_imgfixed .blog_img {
            width: 100%;
        }

        /* .car_type_pagination .pagination {
                    display: flex;
                    justify-content: center;
                    margin: 8px;
                    padding-bottom: 0px;
                } */

        @media (max-width: 1366px) {
            .blog_imgfixed {
                max-height: 200px;
            }
        }

        @media (max-width: 1199px) {
            .blog_imgfixed {
                max-height: 165px;
            }
        }

        @media (max-width: 991px) {
            .blog_imgfixed {
                max-height: 190px;
            }

        }
    </style>
@stop

@section('content')
    <div class="color_hr"></div>
    @if (!empty($$module_name))
        <section class="container">
            <nav class="pt-3"
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                {{ Breadcrumbs::render('blog') }}
            </nav>
        </section>
        <section class="blog_section blog_desktop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="main_title pt-0">{{ __('text.blog') }}</h1>
                        <div class="row">
                            @if (!empty($$module_name))
                                @foreach ($$module_name as $index => $blog)
                                    @php
                                        $featured_image = $blog->featured_image
                                    @endphp
                                    @if(!file_exists(public_path('frontend/posts/' . $blog->translate("en")->featured_image)))
                                        @php
                                            $featured_image = $blog->translate("en")->featured_image
                                        @endphp
                                    @endif

                                    <div class="col-md-6 col-12">
                                        <span>{{ (!empty(blog_article_schema($blog,'b')) ? '' : '') }}</span>
                                        <div class="all_blog">
                                            <a href="{{ route('frontend.posts.blog_details', ['slug' => $blog->slug]) }}">
                                                {{-- <a href="#"> --}}
                                                <div class="blog_imgfixed">
                                                    <img class="blog_img"
                                                        src="{{ asset('frontend/posts/' . $blog->translate("en")->featured_image) }}"
                                                         onerror="this.src='{{ asset('image-not-found.webp') }}'"
                                                        alt="{{ $blog->slug }}">
                                                </div>
                                            </a>

                                            <div class="blog_txt">
                                                <a
                                                    href="{{ route('frontend.posts.blog_details', ['slug' => $blog->slug]) }}">
                                                    <h5>{{ $blog->name }}</h5>
                                                </a>

                                                {{-- <p>{!! \Illuminate\Support\Str::words($blog->content, 50,'...')  !!}</p> --}}
                                                {{-- <ul>
                                                    <img src="frontend/image/blog_date.png" alt="">
                                                    <li>@if (!empty($blog->published_at))
                                                        {{$blog->published_at->isoFormat('llll')}}
                                                        @endif
                                                    </li>
                                                </ul> --}}
                                            </div>
                                            <span>{{ (!empty(blog_article_schema($blog,'b')) ? '' : '') }}</span>

                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @include('article::frontend.posts.blocks.common_rightside')
                    </div>
                </div>
            </div>
        </section>
        <section class="blog_section blog_mobile">
            <div class="container">
                <div class="row">
                    <div class="col-12 dir_ltr">
                        <h1 class="main_title">{{ __('text.blog') }}</h1>
                        <div class="bolg_view owl-carousel">
                            @if (!empty($$module_name))
                                @foreach ($$module_name as $index => $blog)
                                    @php
                                        $featured_image = $blog->featured_image
                                    @endphp
                                    @if(!file_exists(public_path('frontend/posts/' . $blog->translate("en")->featured_image)))
                                        @php
                                            $featured_image = $blog->translate("en")->featured_image
                                        @endphp
                                    @endif
                                    <div class="all_blog">
                                        <a class="m_blog_fix"
                                            href="{{ route('frontend.posts.blog_details', ['slug' => $blog->slug]) }}">
                                            <img class="blog_img"
                                                src="{{ asset('frontend/posts/' . $blog->translate("en")->featured_image) }}"
                                                onerror="this.src='{{ asset('image-not-found.webp') }}'"
                                                alt="{{ $blog->slug }}" alt="">

                                        </a>
                                        <div class="blog_txt">
                                            <a href="{{ route('frontend.posts.blog_details', ['slug' => $blog->slug]) }}">
                                                <h5>{{ $blog->name }}</h5>
                                            </a>
                                            {{-- <p>{!! \Illuminate\Support\Str::words($blog->content, 50,'...')  !!}</p> --}}
                                            {{-- <ul>
                            <img src="assets/image/blog_date.png" alt="">
                            <li>@if (!empty($blog->published_at))
                                {{$blog->published_at->isoFormat('llll')}}
                                @endif</li>
                        </ul> --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        @include('article::frontend.posts.blocks.common_rightside')
                    </div>
                </div>
            </div>
        </section>

        <div class="car_type_pagination d-none d-md-block">
            <div class="container">
                <nav aria-label="...">
                    {!! $$module_name->links('pagination::bootstrap-5') !!}

                </nav>
            </div>
        </div>
    @endif
    <script type="application/ld+json">
        @if(!empty(blog_article_schema($blog)))
        "<?php echo blog_article_schema($blog); ?>";
        @endif
    </script>
@stop


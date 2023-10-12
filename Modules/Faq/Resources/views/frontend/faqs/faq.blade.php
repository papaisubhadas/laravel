@extends('frontend.layouts.app')

@section('title', 'Friends Car Rental - ' . __('FAQs'))

@section('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: none;
        }
        .car_facilities img, .car_facilities i {
            width: 24px;
        }
    </style>
@stop

@section('content')
    <div class="color_hr"></div>
    <div class="container my-3">
        <nav
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item breadcrumb_fix " aria-current="page"><a href="/">{{ __('text.home') }}</a></li>
                <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">{{ __('text.frequently_asked_question') }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <h3 class="faq mt-3 mb-5">
                    {{ __('text.frequently_asked_question') }}
                </h3>
                <div class="accordion accordion-flush mb-5" id="">
                    @foreach($faq_details as $faq_detail)
                    <div class="accordion-item accordion_body_fix my-3">
                            <h4 class="accordion-header" >
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{$faq_detail->id}}" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        {{ $faq_detail->question }}
                                </button>
                            </h4>
                        <div id="flush-collapse{{$faq_detail->id}}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingten" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body pt-0">
                                <div class="py-3 faq_size">
                                    {{ $faq_detail->answer }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="row">
                @if(isset($blogs) && !empty($blogs))
                    @foreach($blogs as $index => $blog)
                    <div class="col-md-4 mt-3 pt-1">
                        <div class="card border-0 my-4" style="background-color: #F9F9F9;">
                            <div class="card-body">
                                @if(!empty($blog->intro))
                                @endif
                                <h6 class=" my-2 reanting-fix">{!! $blog->content !!}</h6>
                                <a href="#" class="read_more_fix card-link text-decoration-none text-uppercase">{{ $blog->published_at }} <i
                                        class="fa-solid fa-arrow-right px-2"></i></a>
                            </div>
                        </div> 
                    </div>
                    @endforeach
                 @endif
        </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        //get country code in hidden input
        $('.phonecode-dropdown').click(function (){
            $('#phone_country_code').val($(this).data('code'));
            $('.active_country').attr('src', $(this).data('image'));
        });
        $('.phonecode-dropdown-in').click(function (){
            $('#phone_country_code_in').val($(this).data('code'));
            $('.active_country_d').attr('src', $(this).data('image'));
            $('#phone_code_spn').text($(this).data('code'));
        });

        $('.car_type_id_input').click(function (){
            $('#car_type_id').val($(this).data('id'));
            $('.car-type').text($(this).data('title'));
        });

    </script>
    <script type="application/ld+json">
            @if(!empty(faq_page_schema()))
            "<?php echo faq_page_schema(); ?>"; 
            @endif
    </script>
@stop



@extends('frontend.layouts.app')
@section('title', '- ' . __('text.home'))

@section('styles')
    <style>
        .success-message {
            margin-top: 23px;
            background-color: #008000!important;
            padding: 13px 40px;
            color: #fff !important;
            font-size: 16px;
            border-radius: 6px;
        }
        .car_item_box {
            overflow: hidden;
        }
        .loader {
            /*position:fixed;*/
            position: relative;
            width: 100%;
            height: 35px;
            width:100%;
            left:0;right:0;top:0;bottom:0;
            background-color: rgba(255,255,255,0.7);
            z-index:9999;
            display:none;
        }
        @-webkit-keyframes spin {
            from {-webkit-transform:rotate(0deg);}
            to {-webkit-transform:rotate(360deg);}
        }
        @keyframes spin {
            from {transform:rotate(0deg);}
            to {transform:rotate(360deg);}
        }
        .loader::after {
            content:'';
            display:block;
            position:absolute;
            left:48%;top:40%;
            width:40px;height:40px;
            border-style:solid;
            border-color:black;
            border-top-color:transparent;
            border-width: 4px;
            border-radius:50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
        .car_facilities img, .car_facilities i {
            width: 24px;
        }
        .iti__country-list {
            max-width: 390px;
        }

        .car_rent_rule .car_rent_rule_txt .car_rent_age .car_rent_age_txt h4{
            line-height: 40px;
            font-weight: 700;
            background: linear-gradient(90deg,#CBAB53 0%,#F8CD59 100%);
            padding: 0px 10px;
            font-size: 20px;
        }

    </style>
@stop

@section('content')
    @include('frontend.pages.home.slider')
    @include('frontend.pages.home.category')

    @if(isset($deal_data))
        @foreach($deal_data as $deal)
            @if($deal->deal_type == 'daily')
                @if(!empty($deal->image) && file_exists(public_path().'/frontend/deals/'.$deal->image))
                <section class="offer_section padding_fix_cars_rental">
                    <div class="container">
                        <section class="new_title">
                            <h2 class="main_title text-center pb-3">{{__('frontend.home.index.daily_car_rental_offers')}}</h2>
                            <p class="pb-3 text-center">{{__('frontend.home.index.enjoy_daily_car')}}</p>
                        </section>
                        <div class="fix_hw">
                              <a href="{{ route('frontend.deals.get_deal_by_type', ['type' => 'daily']) }}" aria-label="get deal by type daily">
                              <!--<img class="de_img lazyload img-fluid" data-original="{{ asset('frontend/deals/'.$deal->image) }}" alt="{{__('frontend.home.index.enjoy_daily_car')}}" loading="lazy" width="100%" height="205">-->
              
<video autoplay loop muted playsinline>
  <source src="https://friendscarrental.com/frontend/deals/daily-car-rental-deals-get-daily-offers-discounts.mp4" type="video/mp4">
  <!-- Add additional source elements for different video formats (e.g., WebM, Ogg) if needed -->
  Your browser does not support the video tag.
</video>

                            </a>
                        </div>
                    </div>
                </section>
                @endif
                @break
            @endif

        @endforeach
    @endif
    @include('frontend.pages.home.car_brand')

    @include('frontend.pages.home.most_rented_cars')

    @include('frontend.pages.models.car_inquiry')
    {{--OFFER SECTION--}}
    @if(isset($deal_data))
        @foreach($deal_data as $deal)
            @if($deal->deal_type == 'monthly')
                @if(!empty($deal->image) && file_exists(public_path().'/frontend/deals/'.$deal->image))
                <section class="offer_section padding_fix_cars_rental">
                    <div class="container">
                        <section class="new_title">
                            <h2 class="main_title text-center pb-3">{{__('frontend.home.index.monthly_car_rental_offers')}}</h2>
                            <p class="pb-3 text-center">{{__('frontend.home.index.discover')}}</p>

                        </section>
                        <div class="fix_hw">
                           <a href="{{ route('frontend.deals.get_deal_by_type', ['type' => 'monthly']) }}" aria-label="get deal by type monthly">
                              <!--<img class="de_img img-fluid lazyload" data-original="{{ asset('frontend/deals/'.$deal->image) }}" alt="{{__('frontend.home.index.enjoy_daily_car')}}" loading="lazy" width="100%" height="205">-->
                        <video autoplay loop muted playsinline>
  <source src="https://friendscarrental.com/frontend/deals/daily-car-rental-deals-get-daily-offers-discounts.mp4" type="video/mp4">
  <!-- Add additional source elements for different video formats (e.g., WebM, Ogg) if needed -->
  Your browser does not support the video tag.
</video>
                            </a>
                        </div>
                    </div>
                </section>
                @endif
                @break
            @endif
        @endforeach
    @endif

    {{--COMPANY SERVICE SECTION--}}
    @if(!empty($cms_section_company_service->page_body))
            {!! $cms_section_company_service->page_body !!}
    @endif

    @include('frontend.pages.home.about_us')
    {{-- <input type="hidden" id="start" value="0">
    <input type="hidden" id="rowperpage" value="{{ $rowperpage }}">
    <input type="hidden" id="totalrecords" value="{{ $totalrecords }}"> --}}
    @include('frontend.pages.home.faq')
    @include('frontend.pages.home.clients_testimonial')
    <!--   {{--CAR RENT RULE SECTION--}}-->
    @if(!empty($cms_section_car_rental_rule->page_body))
       {!! $cms_section_car_rental_rule->page_body !!}
    @endif
    @include('frontend.pages.home.why_choose')
@stop

@section('scripts')
    <script type="application/ld+json">
        {{ home_page_schema() }}
    </script>
    <script>
        $(document).ready( function(event){
            $('.owl-dot').removeAttr('role').attr("aria-label","owl-dot-button");
            $('.owl-prev').removeAttr('role').attr("aria-label","Previous");
            $('.owl-next').removeAttr('role').attr("aria-label","Next");
            $('input[type="range"][name="hours"]').attr('aria-label', 'Select hours');
            $('input[type="range"][name="minutes"]').attr('aria-label', 'Select minutes');
            // $("img.lazy").lazyload({data_attribute: "original"});
        });

        let page = 2;
        var $grid = $('.render-div');

        function getPenPath() {
            return "{{ route('frontend.home') }}?page=" + page;
        }

        if(page){
            $grid.infiniteScroll({
                path: getPenPath,
                history: false,
                responseBody: 'json',
            });
        }

        /* append items on load */
        $grid.on('load.infiniteScroll', function(event, response, path) {
            $(".render-div").append(response.html);
            $("img.lazy").lazyload({data_attribute: "original"});
            page = response.page;
        });
    </script>
@stop



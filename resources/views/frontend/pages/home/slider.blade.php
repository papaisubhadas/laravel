{{--SLIDER--}}

@if(isset($sliders) && !empty($sliders) && count($sliders) >0)
<section>
    <div class="fix_ar_dir">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                @forelse ($sliders as $index => $slider)
                    @if(!empty($slider->image) && file_exists(public_path().'/frontend/sliders/'.$slider->image))
                        <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
                            <img src="{{ asset('frontend/sliders/webp/'.explode('.',$slider->image)[0].'.webp') }}" class="d-block slider-wrapper-image lazy" alt="{{ $slider->image }}" loading="eager" srcset="{{ asset('frontend/sliders/webp/'.explode('.',$slider->image)[0].'.webp') }}, https://friendscarrental.com/frontend/sliders/webp/rent-a-car-in-dubai-1694530277600sa.webp 767w">
                            <div class="carousel-caption">
                                <h1 class="rent_luxury_car">{{ $slider->title }}</h1>
                                <p class="fill_inquiries">{{ $slider->sub_title }}</p>
                                {{--                                    <a href="{{ $slider->call_to_action }}"> <button class="gold_btn btn_fix_book">{{ strtoupper($slider->button_text) }}</button> </a>--}}
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="carousel-item active">
                        <img src="{{ asset('frontend/sliders/grey-banner.jpg') }}" class="d-block lazy w-100 h_450" alt="image" loading="lazy"  loading="eager" width="100%" height="auto">
                        <div class="carousel-caption">
                            <h1 class="rent_luxury_car text-uppercase">TITLE HERE</h1>
                            <p class="fill_inquiries">SUB TITLE HERE</p>
                        </div>
                    </div>
                @endforelse
            </div>
            @if (count($sliders) > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>

</section>

@endif

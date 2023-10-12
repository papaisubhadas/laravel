{{-- CAR BRANDS SECTION --}}
@if (isset($car_brands) && !empty($car_brands))
    <section class="car_brand" style="direction:ltr !important;">
        <div class="container">
            <div class="new_title_h3">
                <h2 class="main_title text-center ">{{ __('frontend.home.index.rent_car_brands') }} </h2>
                <p class="py-3 text-center">{{ __('frontend.home.index.rent_car_brands_text') }}</p>
            </div>
            <div class="car_brand_items owl-carousel">
                @foreach ($car_brands as $index => $car_brand)
                    {{-- @php $car_brand->translation = $car_brand->translations[0]??null; @endphp --}}
                    @if ($car_brand != null)
                        <a style="text-decoration: none;"
                            href="{{ $car_brand->slug != '' ? route('frontend.car_brand_details', ['slug' => $car_brand->slug]) : '' }}">
                            <div class="car_name">
                                @if (!empty($car_brand->image) && file_exists(public_path() . '/frontend/image/' . $car_brand->image))
                                    <img data-original="{{ asset('frontend/image/webp/' .explode('.',$car_brand->image)[0].'.webp') }}" src="{{ asset('frontend/image/compress/' .explode('.',$car_brand->image)[0].'.webp') }}" alt="" loading="lazy"
                                        width="70" height="70" class="car_brand_img lazy">
                                @endif
                                <p>{{ $car_brand->translation->title ?? $car_brand->title }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

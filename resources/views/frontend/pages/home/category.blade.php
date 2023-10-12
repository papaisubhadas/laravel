{{-- LIST CAR CATEGORY --}}
@if (isset($car_types) && !empty($car_types))
    <section class="car_category">
        <div class="container">
            <div class="row">
                @foreach ($car_types as $index => $car_type)
                    @if (!empty($car_type->image) && file_exists(public_path() . '/frontend/image/' . $car_type->image))
                        <div class="col-lg-2 col-md-3 col-6 mt-3">
                            <a class="p-0"
                                href="{{ $car_type->slug != '' ? route('frontend.car_type_details', ['slug' => $car_type->slug]) : '' }}">
                                <div class="car_item_box mt-2">
                                    <div class="car_img">
                                        {{--  <img src="{{ asset('frontend/image/' . $car_type->image) }}"
                                            class="img-fluid lazy" alt=""
                                             width="180" height="180">  --}}
                                        <img src="{{ asset('frontend/image/compress/' . explode('.',$car_type->image)[0].'.webp') }}" data-original="{{ asset('frontend/image/webp/' . explode('.',$car_type->image)[0].'.webp') }}"
                                            class="img-fluid lazy" width="180" height="180" alt="">
                                    </div>
                                    <p>{{ $car_type->translation->title ?? $car_type->title }}</p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif

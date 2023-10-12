<section class="most_rent_car_list blog_page_car_list p-0" style="background-image: none;">
    <div class="container">
        <div class="row render-div align-align-items-center blog_details">
            <h4 class="blog_detail_title text-center pb-3 pt-0 mb-1">{{ __('text.Car_Rental_in_Dubai') }}</h4>

            @if(!isset($most_rented_cars))
                @php $most_rented_cars = getMostRentedCars(request(), getMostRentedCarsLimit()); @endphp
            @endif
            @include('frontend.pages.home.most_rented_cars_data',['columnClass'=>'col-12'])
            {{--  @foreach ($most_rented_cars as $index => $most_rented_car)
            <div class="col-12" style="padding-top: 3px">
                <div class="most_rent_car">
                    <div class="rent_car_img">
                       <a href="{{ route('frontend.car_details', ['slug' => $most_rented_car->slug]) }}">
                           @php
                           $car_offers_var = $most_rented_car->car_offers;
                           $today = date('Y-m-d');
                           $flag = false;
                           if(count($car_offers_var) > 0) {
                               foreach ($car_offers_var  as $car_offer) {
                                   $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active')->count();
                                   if(!empty($car_offer_data)) {
                                       $flag = true;
                                   }
                               }
                           }
                       @endphp
                       @php
                           if(count($most_rented_car->car_images) > 0) {
                               $min = $most_rented_car->car_images->min('position');
                               $car_image_first = $most_rented_car->car_images->where('position', $min)->first();
                               if(!empty($car_image_first)&& !empty($car_image_first->image)){
                                   if(file_exists(public_path().'/frontend/image/'.$car_image_first->image)){
                                       $image_exist=1;
                                   }
                                }
                           }
                       @endphp
                       @if (!empty($image_exist))
                           <img class="img-fluid" src="{{ asset('frontend/image/'.$car_image_first->image)}}" alt="{{ $most_rented_car->title }}">
                           @if (isset($most_rented_car->deals) && count($most_rented_car->deals) > 0)
                               <img class="img-fluid special_offer" src="{{ asset('frontend/image/special_offer_tag.png') }}" alt="">
                           @endif
                           <p class="delivery_txt">{{ __('text.free_delivery') }}</p>
                       @endif
                        </a>
                    </div>
                    <div class="most_rent_car_details">
                        <div class="car_full_details">
                            <div class="brand_name">
                                <a href="{{ route('frontend.car_details', ['slug' => $most_rented_car->slug]) }}" class="text-decoration-none urus_fix">
                                   <h4>{{ ($most_rented_car->translate(App::currentLocale())) ? $most_rented_car->translate(App::currentLocale())->name : '' }}</h4>
                                </a>
                               @php
                                   $car_brand_image = (!empty($most_rented_car->car_brand)) ?$most_rented_car->car_brand->image : '';
                               @endphp
                                @if (file_exists(public_path() . '/frontend/image/' . $car_brand_image))
                                   <img class="img-fluid" src="{{ asset('frontend/image/'. $car_brand_image) }}" alt="">
                                @endif
                            </div>
                            <div class="rent_counts">
                               @php
                                   if(!empty($car_offers_var)) {
                                       $daily_price = floor($most_rented_car->daily_price);
                                       $monthly_price = floor($most_rented_car->monthly_price);
                                       $weekly_price = floor($most_rented_car->weekly_price);
                                       $total_discount_price_daily = 0;
                                       $total_discount_price_monthly = 0;
                                       $total_discount_price_weekly = 0;
                                       foreach ($car_offers_var as $index=>$car_offer) {
                                           $car_offer_data = $car_offer->where('car_offers.offer_start_date', '<', $today)->where('car_offers.offer_end_date', '>', $today)->where('car_offers.status', 'active');
                                           if(!empty($car_offer_data)) {
                                               if($car_offer->offer_type == 'percentage') {
                                                   $discount_price = (float)$daily_price * (float)$car_offer->offer_value / 100;
                                                   $discount_month_price = (float)$monthly_price * (float)$car_offer->offer_value / 100;
                                                   $discount_week_price = (float)$weekly_price * (float)$car_offer->offer_value / 100;
                                               }
                                               else {
                                                   $discount_price = (float)$car_offer->offer_value;
                                                   $discount_month_price = (float)$car_offer->offer_value;
                                                   $discount_week_price = (float)$car_offer->offer_value;

                                               }
                                               $total_discount_price_daily = $total_discount_price_daily + $discount_price;
                                               $total_discount_price_monthly = $total_discount_price_monthly + $discount_month_price;
                                               $total_discount_price_weekly = $total_discount_price_weekly + $discount_week_price;

                                           }
                                       }
                                       $daily_price = $daily_price - $total_discount_price_daily;
                                       $monthly_price = $monthly_price - $total_discount_price_monthly;
                                       $weekly_price = $weekly_price - $total_discount_price_weekly;

                                   }
                               @endphp
                               @if (isset($most_rented_car->deals) && count($most_rented_car->deals) > 0)
                                   @foreach ($most_rented_car->deals as $car_deal_data)
                                       @php $deal_flag = 0 @endphp
                                       @if ($car_deal_data->deal_type == 'daily')
                                           @php $deal_flag = 1 @endphp
                                           <div class="rent_day">
                                               <p> <del> {{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->daily_price * Session::get('conversion_rate')) : floor($most_rented_car->daily_price) }}</del> {!! '&nbsp;' !!}</p>
                                               <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate')) : floor($car_deal_data->pivot->connectedcar_value) }} <p>{{ __('text.day') }}</p> </span>
                                           </div>
                                           @break
                                       @else
                                           @if ($deal_flag == 0)
                                               <div class="rent_day">
                                                   <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->daily_price * Session::get('conversion_rate')) : floor($most_rented_car->daily_price) }} <p>{{ __('text.day') }}</p> </span>
                                               </div>
                                               @break
                                           @endif
                                       @endif
                                   @endforeach
                               @else
                                   <div class="rent_day">
                                       <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->daily_price * Session::get('conversion_rate')) : floor($most_rented_car->daily_price) }} <p>{{ __('text.day') }}</p> </span>
                                   </div>
                               @endif
                               @if (isset($most_rented_car->deals) && count($most_rented_car->deals) > 0)
                                   @php $deal_flag = 0 @endphp
                                   @php $counter = 0 @endphp
                                   @foreach ($most_rented_car->deals as $car_deal_data)
                                       @if ($car_deal_data->deal_type == 'monthly')
                                           @php $deal_flag = 1 @endphp
                                           <div class="rent_day rent_month">

                                               <p> <del> {{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->monthly_price * Session::get('conversion_rate')) : floor($most_rented_car->monthly_price) }}</del> {!! '&nbsp;' !!}</p>
                                               <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($car_deal_data->pivot->connectedcar_value * Session::get('conversion_rate')) : floor($car_deal_data->pivot->connectedcar_value) }} <p>{{ __('text.month') }}</p> </span>

                                           </div>
                                           @break
                                       @else
                                           @php $deal_flag = 0 @endphp
                                       @endif
                                   @endforeach
                                   @if ($deal_flag == 0)
                                       <div class="rent_day rent_month">
                                           <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->monthly_price * Session::get('conversion_rate')) : floor($most_rented_car->monthly_price) }} <p>{{ __('text.month') }}</p> </span>
                                       </div>
                                   @endif
                               @else
                                   <div class="rent_day rent_month">
                                       <span class="fix_font">{{ Session::has('currency') ? Session::get('currency') : 'AED'}} {{ Session::has('conversion_rate') ? floor($most_rented_car->monthly_price * Session::get('conversion_rate')) : floor($most_rented_car->monthly_price) }} <p>{{ __('text.month') }}</p> </span>
                                   </div>
                               @endif
                           </div>
                           <div class="car_facilities fix_li_car_facilities">
                               @if (!empty($most_rented_car->car_specifications) && count($most_rented_car->car_specifications))
                                   <ul>
                                       @foreach ($most_rented_car->car_specifications as $key => $car_specification)
                                           @if ($key <= 2)
                                               <li> {!! $car_specification->icon_html !!} {{ $car_specification->specification_title }}</li>
                                           @endif
                                       @endforeach
                                   </ul>
                               @endif
                           </div>
                           @if (!empty($most_rented_car->car_rent_details))
                               <div class="car_service">
                                   <ul>
                                       @foreach ($most_rented_car->car_rent_details as $car_rent_detail)
                                           @if($car_rent_detail->translate(App::currentLocale()))
                                               <li> <i class="fa-solid fa-circle-check rigth_icon"></i> {{ ($car_rent_detail->translate(App::currentLocale())) ? $car_rent_detail->translate(App::currentLocale())->rent_detail_text : '' }}</li>
                                           @endif
                                       @endforeach
                                   </ul>
                               </div>
                           @endif
                        </div>

                        <div class="contact_info">
                           <a href="tel:{{ (!empty(get_locale_contact_number()) ? get_locale_contact_number() : '') }}" class="call"><img class="img-fluid" src="{{ asset('frontend/image/call_info.png') }}" alt=""></a>
                           <a href="https://wa.me/{{ (!empty(get_locale_whatsapp_number()) ? get_locale_whatsapp_number() : '') }}?text={{__('frontend.home.index.wa_text')}} {{ ($most_rented_car->translate(App::currentLocale())) ? $most_rented_car->translate(App::currentLocale())->name : '' }}"
                              target="_blank"  class="whatsapp"><img class="img-fluid" src="{{ asset('frontend/image/whatsapp.png') }}" alt=""></a>
                           <a href="msg_send" class="msg_send" data-id="{{ $most_rented_car->id }}" data-bs-toggle="modal" data-bs-target="#message_send">{{ __('text.book_now') }}</a>
                       </div>
                    </div>
                </div>
            </div>
            @endforeach --}}
        </div>
    </div>
</section>
@include('frontend.pages.models.car_inquiry')

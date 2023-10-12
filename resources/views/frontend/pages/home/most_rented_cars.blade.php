{{--MOST RENTED CARS SECTION--}}

<section class="most_rent_car_list">
    <div class="container">
        <h3 class="main_title">{{ __('text.most_rented_car_title') }}</h3>
        <div class="row render-div">
            @include('frontend.pages.home.most_rented_cars_data')
        </div>
    </div>
</section>

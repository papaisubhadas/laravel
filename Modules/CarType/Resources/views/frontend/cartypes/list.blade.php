@extends('frontend.layouts.app')

@section('title', 'Friends Car Rental - ' . __('text.car_types'))

@section('content')
        <div class="color_hr"></div>

        <div class="container my-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                {{ Breadcrumbs::render('car_type') }}
            </nav>
        </div>

<h1 class="text-center fw-bold pt-4">{{ __('text.explore_car_by_type') }}</h1>
<section class="car_category">
    <div class="container px-2">
        @if(isset($$module_name) && count($$module_name) > 0)
        <div class="row">
            @foreach($$module_name as $index => $car_type)
            <div class="col-lg-4  col-md-6 col-12 mb-4">
                <a href="{{ route('frontend.car_type_details', ['slug' => $car_type->slug]) }}">
                    <div class="car_item_box">
                        <div class="car_img_new">
                            <img src="{{ asset('frontend/image/'.$car_type->image) }}" class="car_img_fix" alt="{{ ($car_type->translate(App::currentLocale())) ?   $car_type->translate(App::currentLocale())->title : ''}}">
                        </div>
                        <p>{{ ($car_type->translate(App::currentLocale())) ?  $car_type->translate(App::currentLocale())->title : '' }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@if(isset($cms_section) && !empty($cms_section) && isset($cms_section->page_body) && $cms_section->page_body != '')
<div class="container px-3">
    <div class="row justify-content-center bg_color_fix py-3 mb-5">
    {!! $cms_section->page_body !!}
    </div>
</div>
@endif

@stop

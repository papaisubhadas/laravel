@extends('frontend.layouts.app')

@php
$page_title = (!empty($page_contents) ? $page_contents->page_title : 'Friends Car Rental');
$page_slug = \Request::segment(count(\Request::segments()));
@endphp

@section('title', 'Friends Car Rental - ' . $page_title)

@section('styles')
    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            float: none;
        }
        .car_facilities img, .car_facilities i {
            width: 24px;
        }
        .dubai_car_rent .dubai_car_rent_details .car_rent_txt * {
            background-color: #F0F0F0 !important;
        }
    </style>
@stop

@section('content')
    <div class="color_hr"></div>
    <section class="container">
        <nav class="pt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            {{ Breadcrumbs::render('custom_page',array('title' => $page_title, 'slug' => $page_slug)) }}
        </nav>
    </section>
    <div class="container my-5">
        @if(!empty($page_contents))
                {!! $page_contents->page_body !!}
        @endif
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

        var slug = "{{ $page_slug }}";
        if(slug == 'required-documents') {
            $('.container .modal-content .modal-header .btn-close').hide();
        } else if(slug == 'driving-licenses-from-countries-valid-in-uae') {
            $('.container div.row .col-md-3').addClass('col-12').css('width','unset !important');
        }
    </script>
@stop


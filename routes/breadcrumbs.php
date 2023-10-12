<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('text.home'), route('frontend.home'));
});

// Home > [Car Name]
Breadcrumbs::for('car_details_home', function (BreadcrumbTrail $trail, $car) {
    $trail->parent('home');
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > Deal
Breadcrumbs::for('deal', function (BreadcrumbTrail $trail, $deal) {
    $trail->parent('home');
    $trail->push(__('text.deals'), route('frontend.deals.get_deal_by_type', $deal['slug']));
});

// Home > Deal > [Car Name]
Breadcrumbs::for('deal_car', function (BreadcrumbTrail $trail, $deal, $car) {
    $trail->parent('deal',$deal);
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > Car Brand
Breadcrumbs::for('car_brand', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('text.car_brand'), route('frontend.car_brands_list'));
});

// Home > Car Brand > [Car Brand Name]
Breadcrumbs::for('car_brand_detail', function (BreadcrumbTrail $trail, $car_brand) {
    $trail->parent('car_brand');
    $trail->push($car_brand['title'], route('frontend.car_brand_details', $car_brand['slug']));
});

// Home > Car Brand > [Car Brand Name] > [Car Name]
Breadcrumbs::for('brand_car', function (BreadcrumbTrail $trail, $car_brand, $car) {
    $trail->parent('car_brand_detail', $car_brand);
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > Car Brand > [Car Name]
Breadcrumbs::for('no_brand_car', function (BreadcrumbTrail $trail, $car) {
    $trail->parent('car_brand');
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});


// Home > Car Type
Breadcrumbs::for('car_type', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('text.car_types'), route('frontend.car_types_list'));
});

// Home > Car Type > [Car Type Name]
Breadcrumbs::for('car_type_detail', function (BreadcrumbTrail $trail, $car_type) {
    $trail->parent('car_type');
    $trail->push($car_type['title'], route('frontend.car_type_details', $car_type['slug']));
});

// Home > Car Type > [Car Type Name] > [Car Name]
Breadcrumbs::for('type_car', function (BreadcrumbTrail $trail, $car_type, $car) {
    $trail->parent('car_type_detail', $car_type);
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('text.blog'), route('frontend.posts.blogs'));
});

// Home > Blog > [Blog Name]
Breadcrumbs::for('blog_details', function (BreadcrumbTrail $trail, $blog) {
    $trail->parent('blog');
    $slug = $blog['slug'];
    $trail->push($blog['title'], route('frontend.posts.blog_details', ['slug' => $blog['slug']]));
    // $trail->push($blog['title'], url("blogs/$slug"));
});

// Home > Blog > [Car Name]
Breadcrumbs::for('blog_car', function (BreadcrumbTrail $trail, $car) {
    $trail->parent('blog');
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});


// Home > Blog > [Blog Name] > [Car Name]
Breadcrumbs::for('blog_details_car', function (BreadcrumbTrail $trail, $blog, $car) {
    $trail->parent('blog_details',$blog);
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > 404
Breadcrumbs::for('404', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('404', url('/404'));
});

// Home > 404 > [Car Name]
Breadcrumbs::for('404_car', function (BreadcrumbTrail $trail, $car) {
    $trail->parent('404');
    $trail->push($car['title'], route('frontend.car_details', $car['slug']));
});

// Home > [Custom Page]
Breadcrumbs::for('custom_page', function (BreadcrumbTrail $trail, $custom) {
    $trail->parent('home');
    if($custom['title'] != '') {
        $trail->push($custom['title'], route('frontend.pages', $custom['slug']));
    }
});

// Home > Contact Us
Breadcrumbs::for('contact_us', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('text.contactus'), route('frontend.contact-us'));
});
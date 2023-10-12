// >>>>>>>>>>>>>>>>>>>>>>>>>>  car_brand_items slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$('.car_brand_items').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:3,
            nav:true,
            dots: false,
        },
        600:{
            items:3,
            nav:true,
            dots: false,
        },
        1000:{
            items:9,
            nav:true,
            loop:true
        }
    }
})
// >>>>>>>>>>>>>>>>>>>>>>>>>> car_brand_items slider End >>>>>>>>>>>>>>>>>>>>>>>>>>


// >>>>>>>>>>>>>>>>>>>>>>>>>>  car_rental_items slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$('.car_rental_items').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            dots: false,
            nav:true
        },
        600:{
            items:2,
            nav:false,
            dots: false,
        },
        1000:{
            items:3,
            nav:true,
            loop:true,
            dots: false,
        }
    }
})
// >>>>>>>>>>>>>>>>>>>>>>>>>> car_rental_items slider End >>>>>>>>>>>>>>>>>>>>>>>>>>



// >>>>>>>>>>>>>>>>>>>>>>>>>>  tectimonial_slider slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$('.tectimonial_slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: false,
        },
        600:{
            items:2,
            nav:false,
            dots: false,
        },
        1000:{
            items:3,
            nav:true,
            loop:true,
            dots: false,
        }
    }
})
// >>>>>>>>>>>>>>>>>>>>>>>>>> tectimonial_slider slider End >>>>>>>>>>>>>>>>>>>>>>>>>>


// >>>>>>>>>>>>>>>>>>>>>>>>>>  recommended_car_list slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$('.recommended_car_list').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: false,
        },
        600:{
            items:1,
            nav:true,
            dots: false,
        },
        1000:{
            items:1,
            nav:true,
            loop:true,
            dots: false,
        }
    }
})
// >>>>>>>>>>>>>>>>>>>>>>>>>> recommended_car_list slider End >>>>>>>>>>>>>>>>>>>>>>>>>>



// >>>>>>>>>>>>>>>>>>>>>>>>>>  blog mobile view slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$('.bolg_view').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: false,
        },
        600:{
            items:1,
            nav:true,
            dots: false,
        },
        1000:{
            items:1,
            nav:true,
            loop:true,
            dots: false,
        }
    }
})
// >>>>>>>>>>>>>>>>>>>>>>>>>> blog mobile view slider End >>>>>>>>>>>>>>>>>>>>>>>>>>


// >>>>>>>>>>>>>>>>>>>>>>>>>> Date select - flatpiker start >>>>>>>>>>>>>>>>>>>>>>>>>>

$(".flatpickr").flatpickr({
    mode: "range",
    enableTime: true,
    dateFormat: "d-m H:i",
});

// >>>>>>>>>>>>>>>>>>>>>>>>>> Date select - flatpiker End >>>>>>>>>>>>>>>>>>>>>>>>>>


// >>>>>>>>>>>>>>>>>>>>>>>>>> Stiky nav menu start >>>>>>>>>>>>>>>>>>>>>>>>>>
$(document).ready(function() {

    $(window).scroll(function () {
        // console.log($(window).scrollTop())
        if ($(window).scrollTop() > 180) {
            $('#nav_bar').addClass('navbar-fixed');
        }
        if ($(window).scrollTop() < 281) {
            $('#nav_bar').removeClass('navbar-fixed');
        }
    });
});
// >>>>>>>>>>>>>>>>>>>>>>>>>> Stiky nav menu end >>>>>>>>>>>>>>>>>>>>>>>>>>



// >>>>>>>>>>>>>>>>>>>>>>>>>> Car detail page product slider start >>>>>>>>>>>>>>>>>>>>>>>>>>
$ = jQuery;
$( document ).ready(function() {

    $h_slider_options =  {
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 6,
        galleryMargin: 10,
        thumbMargin: 10,
    };

    $v_slider_options = {
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 6,
        galleryMargin: 10,
        thumbMargin: 10,
        vertical: true
    };

    h_slider = $('#lightSlider').lightSlider($h_slider_options);
    v_slider = $('#lightSliderVertical').lightSlider($v_slider_options);

    $selector = '#lightSlider li:not(".clone") a';
    $selector += ',#lightSliderVertical li:not(".clone") a';
    $().fancybox({
        selector : $selector,
        backFocus : false,
        buttons : [
            'slideShow',
            'share',
            'zoom',
            'fullScreen',
            'thumbs',
            'download',
            'close'
        ]
    });
});

// >>>>>>>>>>>>>>>>>>>>>>>>>> Car detail page product slider End >>>>>>>>>>>>>>>>>>>>>>>>>>


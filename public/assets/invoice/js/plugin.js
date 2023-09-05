$(function(){

    'use strict';

    $('.dropdown-toggle').click(function(){
        $(this).toggleClass('active');
    });

    // landing
    $('.carousel').hover(function () {
        $('.prev-icon').css("display","block");
    });
    $('.carousel').mouseleave(function () {
        $('.prev-icon').css("display","none");
    });

    // blogs 

    $(".blogs .owl-carousel").owlCarousel({
        autoplay: false,
        autoplayhoverpause: true,
        autoplaytimeout: 100,
        items: 1,
        nav: true,
        loop: false,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>",],
        responsive: {
            0 : {
                items: 1
            },
            485 : {
                items: 1
            },
            728 : {
                items: 1
            },
            1200 : {
                items: 1
            }
        }
    });

    // video

    $(".video-slider .owl-carousel").owlCarousel({
        autoplay: true,
        autoplayhoverpause: true,
        autoplaytimeout: 100,
        items: 1,
        nav: true,
        loop: true,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>",],
        responsive: {
            0 : {
                items: 1
            },
            485 : {
                items: 1
            },
            728 : {
                items: 1
            },
            1200 : {
                items: 1
            }
        }
    });


        // newest

    $(".newest-blog .owl-carousel").owlCarousel({
        autoplay: true,
        autoplayhoverpause: true,
        autoplaytimeout: 100,
        items: 3,
        nav: false,
        loop: true,
        dots: true,
        responsive: {
            0 : {
                items: 1
            },
            485 : {
                items: 2
            },
            728 : {
                items: 3
            },
            1200 : {
                items: 3
            }
        }
    });

     // platform

     $(".digital-platform .owl-carousel").owlCarousel({
        autoplay: true,
        autoplayhoverpause: true,
        autoplaytimeout: 100,
        items: 3,
        nav: false,
        loop: true,
        dots: true,
        // navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>",],
        responsive: {
            0 : {
                items: 1
            },
            485 : {
                items: 2
            },
            728 : {
                items: 3
            },
            1200 : {
                items: 3
            }
        }
    });

    // blogs page 

    $(".blogs-bage .owl-carousel").owlCarousel({
        autoplay: false,
        autoplayhoverpause: true,
        autoplaytimeout: 100,
        items: 1,
        nav: true,
        loop: false,
        dots: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>",],
        responsive: {
            0 : {
                items: 1
            },
            485 : {
                items: 1
            },
            728 : {
                items: 1
            },
            1200 : {
                items: 1
            }
        }
    });

    // slider pages

    $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.small-slider'
      });
      $('.small-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 2000
      });

      // scroll to top

$(window).scroll(function () {
    if ($(window).scrollTop() >= 300) {
        $('.scroll-top').fadeIn(400);
    }else{
        $('.scroll-top').fadeOut(400);
    }
});
$('.scroll-top').click(function () {
    
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});


});
jQuery(document).ready(function($) {

    $(".img-text-cta a").hover(
        function() {
            $(this).parents('.image-text-50-50-container').addClass("img-zoom");
        },
        function() {
            $(this).parents('.image-text-50-50-container').removeClass("img-zoom");
        }
    );

    $(".ost-card-cta").hover(
        function() {
            $(this).parents('.ost-card').addClass("hovered");
        },
        function() {
            $(this).parents('.ost-card').removeClass("hovered");
        }
    );




    /*==========================*/
    /* Scroll on animate */
    /*==========================*/
    function onScrollInit(items, trigger) {
        items.each(function() {
            var osElement = $(this),
                osAnimationClass = osElement.attr('data-os-animation'),
                osAnimationDelay = osElement.attr('data-os-animation-delay');
            osElement.css({
                '-webkit-animation-delay': osAnimationDelay,
                '-moz-animation-delay': osAnimationDelay,
                'animation-delay': osAnimationDelay
            });
            var osTrigger = (trigger) ? trigger : osElement;
            osTrigger.waypoint(function() {
                osElement.addClass('animated').addClass(osAnimationClass);
            }, {
                triggerOnce: true,
                offset: '90%',
            });
            // osElement.removeClass('fadeInUp');
        });
    }
    onScrollInit($('.os-animation'));
    onScrollInit($('.staggered-animation'), $('.staggered-animation-container'));



    /*==========================*/
    /* masonry */
    /*==========================*/
    if ($('.grid-list').length > 0) {
        $('.grid-list').masonry({
            // options
            itemSelector: '.grid-item',
        });
    };


/*==========================*/ 

/* scroll down */ 

/*==========================*/

if ($('.scroll-down').length > 0) {
$('.scroll-down').click(function(){
   var headerHeight = $('header').outerHeight();
   var scrolltarget = $(this).attr('data-section');
  $('html, body').animate({
        scrollTop: $('#'+scrolltarget).offset().top - headerHeight
    },500);
  return false;
});
};
/*==========================*/
/* Homepage hero sliders */
/*==========================*/
if ($('.hero-slider > div').length > 1) {
    jQuery('.hero-slider').slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay: false,
        autoplaySpeed: 4000,
        speed: 300,
        asNavFor: '.hero-image-slider',
        focusOnSelect: true
    });
    $('.hero-image-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 4000,
        speed: 300,
        arrows: false,
        asNavFor: '.hero-slider'
    });
}
 

    /*==========================*/
    /* expertise  Slider */
    /*==========================*/

    if ($('.expertise-img-slider').length > 0) {

        $('.expertise-img-slider').slick({
            dots: true,
            infinite: true,
            arrows: true,
            autoplay: false,
            autoplaySpeed: 1000,
            speed: 700,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade:true,
            asNavFor: '.expertise-text-slider',
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    dots: false,
                }
            }, ]
        });
        $('.expertise-text-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 1000,
            fade: false,
            speed: 700,
            arrows: false,
            dots: false,
            fade:true,
            asNavFor: '.expertise-img-slider',
            responsive: [{
                breakpoint: 768,
                settings: {
                    fade: false,
                }
            }, ]
        });
    };



    /*==========================*/
    /* testimonial sliders */
    /*==========================*/
    if ($('.testimonial-slider').length > 0) {
        jQuery('.testimonial-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: true,
            centerMode: false,
            fade:true,
            responsive: [{
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                }
            }, ]

        });
    };



    /*==========================*/
    /* es sliders */
    /*==========================*/
    if ($('.es-slider').length > 0) {
        jQuery('.es-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: true,
            centerMode: false,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: true,
                    }
                },
            ]

        });
    }

    /*==========================*/
    /* ost sliders */
    /*==========================*/
    if ($('.ost-slider').length > 0) {
        jQuery('.ost-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            infinite: true,
            centerMode: false,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        dots: false,
                    }
                },
            ]

        });







    }


    /*==========================*/
    /* Partners Slider */
    /*==========================*/
    if ($('.partners-slider').length > 0) {
        jQuery('.partners-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
            infinite: true,
            centerMode: false,
            responsive: [{
                    breakpoint: 5000,
                    settings: "unslick"
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        adaptiveHeight: false,
                        variableWidth: true
                    }
                }
            ]
        });
    }

    /*==========================*/
    /* Page Signpost Slider */
    /*==========================*/
    if ($('.page-signpost-slider').length > 0) {
        jQuery('.page-signpost-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: false,
            infinite: true,
            centerMode: false,
            responsive: [{
                    breakpoint: 5000,
                    settings: "unslick"
                },
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        adaptiveHeight: false,
                        variableWidth: false
                    }
                }
            ]
        });
    }




    /*==========================*/
    /* Header fix */
    /*==========================*/
    var scroll = $(window).scrollTop();



    if (scroll >= 10) {
        $("body").addClass("fixed");
    } else {
        $("body").removeClass("fixed");
    }




});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();


    if (scroll >= 10) {
        $("body").addClass("fixed");
    } else {
        $("body").removeClass("fixed");
    }

});
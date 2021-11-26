gsap.registerPlugin(ScrollTrigger);

const tl = gsap.timeline({
    scrollTrigger: {
        trigger: "#hero",
        start: "top top",
        end: "bottom top",
        scrub: true,
        //markers:true
    }
});

gsap.utils.toArray(".hero-layer").forEach(layer => {
    const depth = layer.dataset.depth;
    const movement = -(layer.offsetHeight * depth)
    tl.to(layer, { y: movement, ease: "none" }, 0)
});

 


gsap.to(".main-hero", {
    scrollTrigger: {
        trigger: ".home-intro-container",
        start: 'top 80%',
        end: '+=150px',
        scrub: true,

        // markers:true
    },
    opacity: 0,
    duration: 1,
    zIndex:-1
});



gsap.utils.toArray('.development-box').forEach(devBox => {

const paraBG = $(devBox).children('.parallax-bg');
gsap.to(paraBG, {
      y:'-200px',
      ease: "none",
      scrollTrigger: {
        trigger: devBox,
        start: "top bottom",
        end: "bottom top", 
        scrub: true,
        //markers:true,
      }
});
   });




gsap.utils.toArray('.inner-hero-img-container').forEach(heroBox => {

const heroBG = $(heroBox).children('.parallax-bg');
gsap.to(heroBG, {
      y:'-200px',
      ease: "none",
      scrollTrigger: {
        trigger: heroBox,
        start: "top bottom",
        end: "bottom top", 
        scrub: true,
        //markers:true,
      }
});
   });


jQuery(document).ready(function($) {


var mq = window.matchMedia( "(max-width: 992px)" );
if (mq.matches) {
var winH = $(window).outerHeight();
var winH2 = winH + 65;
var winH3 = winH + 127;
$('.hero-outer, .hero-layer').height(winH);
$('.hero-grass-dark.hero-layer').height(winH2);
$('.hero-grass-light.hero-layer').height(winH3);
}








    $('.navbar').on('shown.bs.collapse', function() {
        $('body').addClass('nav-open');
    })
    $('.navbar').on('hidden.bs.collapse', function() {
        $('body').removeClass('nav-open');
    })


    if ($('.hero-slider > div').length > 1) {
        jQuery('.hero-slider').slick({
            dots: true,
            infinite: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 300,
            fade: true,
            asNavFor: '.hero-image-slider',
            focusOnSelect: true
        });
        $('.hero-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 4000,
            speed: 1000,
            arrows: false,
            fade: true,
            asNavFor: '.hero-slider'
        });
    }


if($('.dev-img-slider').length > 0){
 $('.dev-img-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows:true,
  fade:false,
  dots: true,
  centerMode: false,
  //asNavFor: '.dev-text-slider'
});
};

if($('.dev-text-slider').length > 0){
$('.dev-text-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  //asNavFor: '.dev-img-slider',
  dots:false,
  arrows:false,
 centerMode: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        centerMode:true,
        variableWidth:true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        centerMode:true,
        variableWidth:true
      }
    }
    
  ]
});
};


$('.dev-text-slide').click(function(){
  var curTab = $(this).attr('data-tab');
  $('.dev-img-slider').hide();
  $(curTab).show();
  $('.dev-img-slider').slick('setPosition');
});

    /*==========================*/
    /* sliders */
    /*==========================*/
    if ($('.simple-slider').length > 0) {
        jQuery('.simple-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            infinite: true,
            centerMode: false,

        });
    }



    /*==========================*/
    /* Mobile Slider */
    /*==========================*/
    if ($('.mobile-slider').length > 0) {
        jQuery('.mobile-slider').slick({
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
                        adaptiveHeight: false
                    }
                }
            ]
        });
    }


    if ($('.mobile-slider2').length > 0) {
        jQuery('.mobile-slider2').slick({
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
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        adaptiveHeight: false
                    }
                }
            ]
        });
    }


    if ($('.contact-member-slider').length > 0) {
        jQuery('.contact-member-slider').slick({
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
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        adaptiveHeight: false
                    }
                }
            ]
        });
    }


 

    /*==========================*/
    /* Testimonial Slider */
    /*==========================*/
    if ($('.member-slider').length > 0) {
        jQuery('.member-slider').slick({
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
                        dots: false,
                        adaptiveHeight: false
                    }
                }
            ]
        });
    }

    /*==========================*/
    /* Testimonial Slider */
    /*==========================*/
    if ($('.testimonial-slider').length > 0) {
        $('.testimonial-slider').slick({
            infinite: true,
            speed: 300,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                    }
                }

            ]
        });
    }


/*==========================*/
/* Image Carousel Slider */
/*==========================*/
  if($('.img-carousel-img-slider').length > 0){
 $('.img-carousel-img-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows:true,
  fade:false,
  dots: true,
  centerMode: false,
  adaptiveHeight:true,
  //asNavFor: '.img-carousel-text-slider'
});
};

if($('.img-carousel-text-slider').length > 0){
$('.img-carousel-text-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  //asNavFor: '.img-carousel-img-slider',
  dots:false,
  arrows:false,
 centerMode: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        centerMode:true,
        variableWidth:true
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        centerMode:true,
        variableWidth:true,
        infinite: false
      }
    }
    
  ]
});
};


$('.img-carousel-text-slide').click(function(){
  var curTab = $(this).attr('data-tab');
  $('.img-carousel-img-slider').hide();
  $(curTab).show();
  $('.img-carousel-img-slider').slick('setPosition');
});



    /*==========================*/
    /* Member popup */
    /*==========================*/

    $('.member-list').magnificPopup({
        type: 'inline',
        delegate: '.member-box',
        showCloseBtn: true,
        midClick: true,
        gallery: { enabled: true },

        zoom: {
            enabled: false,
            duration: 800 // don't foget to change the duration also in CSS
        },
        callbacks: {
            beforeOpen: function() {
                this.st.mainClass = this.st.el.attr('data-effect');
            },
            buildControls: function() {
                // re-appends controls inside the main container
                this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
            },
            open: function() {
                $('body').addClass('popup-open');
            },
            close: function() {
                $('body').removeClass('popup-open');
            },



        }
    });


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
/* Animated Number  */  
/*==========================*/   
 
  $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });
 
      // start all the timers
      $('.timer').each(count);
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    
    
    $('.timer').waypoint(function() {
    $('.timer').not('.animated').each(count);
  $('.timer').addClass('animated');
},{offset: '95%'});


    /*==========================*/
    /* Header fix */
    /*==========================*/
    var scroll = $(window).scrollTop();

    if ($('body').hasClass('home')) {

        if (scroll >= 200) {
            $("body").addClass("fixed");
        } else {
            $("body").removeClass("fixed");
        }
    } else {

        if (scroll >= 10) {
            $("body").addClass("fixed");
        } else {
            $("body").removeClass("fixed");
        }
    }



});


$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if ($('body').hasClass('home')) {

        if (scroll >= 200) {
            $("body").addClass("fixed");
        } else {
            $("body").removeClass("fixed");
        }
    } else {

        if (scroll >= 10) {
            $("body").addClass("fixed");
        } else {
            $("body").removeClass("fixed");
        }
    }

});


function onCatChange(dropdown) {
    switch (dropdown.id) {
        case 'cat':
            pageSlug = "/latest-news/";
            pageSlugCat = "/latest-news/category/";
            break;
        default:
            pageSlug = "/404/";
            pageSlugCat = "/404/";
    }
    //console.log(dropdown.value);
    if (dropdown.options[dropdown.selectedIndex].value != -1) {
        location.href = ajax_object.home_url + pageSlugCat + dropdown.options[dropdown.selectedIndex].value + '/';
    } else {
        location.href = ajax_object.home_url + pageSlug;
    }
    dropdown.closest('.form-group').classList.add("loading");
}

$(function() {

    var dropdownCat = document.getElementById("cat");
    if (typeof(dropdownCat) != 'undefined' && dropdownCat != null) {
        dropdownCat.onchange = function() { onCatChange(dropdownCat) };
    }

});
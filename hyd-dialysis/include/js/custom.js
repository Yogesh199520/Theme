var $ = jQuery.noConflict();
jQuery(document).ready(function($){
// /*==========================*/ 
// /* Faqs accordion */ 
// /*==========================*/
// $(document).ready(function(){
//   $('.faqs-heading').click(function(){
//     if($(this).parent().hasClass('active')){
//       $(this).parent().removeClass('active');
//       $(this).siblings('.faqs-content').slideUp('3000');
      
//       }else{
//       $('li').find('.faqs-content').slideUp('3000')
//       $(this).parent().addClass('active').siblings('li').removeClass('active');
//       $(this).siblings('.faqs-content').slideDown('3000');
    
//     }
//   });
// });

        $(".panel-title").click(function(){
            $(this).parents(".panel").toggleClass("active").siblings().removeClass('active');
         });
/*==========================*/ 
/* sliders */ 
/*==========================*/
if($('.simple-slider').length > 0){
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
if($('.mobile-slider').length > 0){
jQuery('.mobile-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows: false, 
  infinite: true, 
  centerMode: false, 
  responsive: [
    {
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
 

/*==========================*/  
/* Scroll on animate */  
/*==========================*/
function onScrollInit( items, trigger ) {
  items.each( function() {
    var osElement = $(this),
        osAnimationClass = osElement.attr('data-os-animation'),
        osAnimationDelay = osElement.attr('data-os-animation-delay');
        osElement.css({
          '-webkit-animation-delay':  osAnimationDelay,
          '-moz-animation-delay':     osAnimationDelay,
          'animation-delay':          osAnimationDelay
        });
        var osTrigger = ( trigger ) ? trigger : osElement;
        osTrigger.waypoint(function() {
          osElement.addClass('animated').addClass(osAnimationClass);
          },{
              triggerOnce: true,
              offset: '95%',
        });
// osElement.removeClass('fadeInUp');
  });
}
onScrollInit( $('.os-animation') );
onScrollInit( $('.staggered-animation'), $('.staggered-animation-container'));


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


/*==========================*/ 
/* individual-events slider */ 
/*==========================*/
jQuery(document).ready(function($){
    if($('.single-events-slider').length > 0) {
      jQuery('.single-events-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        infinite: true,
        centerMode: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
            }
          },
          {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                arrows: false,
            }
          },
            {
              breakpoint: 580,
              settings: {
                slidesToShow: 1,
                arrows: false,
            }
          }
        ]
    });
  }
});

/*==========================*/
/* patient slider */
/*==========================*/
jQuery(document).ready(function($) {

    if ($('.events-slider').length > 0) {
        jQuery('.events-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            infinite: true,
            centerMode: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 580,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                    }
                }

            ]
        });
    }

});

/*==========================*/  
/* patients  Slider */  
/*==========================*/ 
jQuery('.patient-img-slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 4000,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    asNavFor: '.patient-text-slider',
    focusOnSelect: true,
    responsive: [{
        breakpoint: 1330,
        settings: {
            dots: false
        }
    }]
});
jQuery('.patient-text-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 4000,
    fade: true,
    speed: 300,
    arrows: true,
    dots: true,
    adaptiveHeight: true,
    asNavFor: '.patient-img-slider',
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
        }
    },
    {
        breakpoint: 580,
        settings: {
            slidesToShow: 1,
            arrows: false,
        }
    }

]
});

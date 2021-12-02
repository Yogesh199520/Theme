var $ = jQuery.noConflict();

jQuery(document).ready(function($){

$('.hero-slider').slick({
  dots: false,
  infinite: true,
  arrows:true,
  fade:true,
  autoplay:true,
  autoplaySpeed: 4000,
  speed: 300,
  infinite: true,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
  responsive: [
    
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
      }
    }
  ]
 
});

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
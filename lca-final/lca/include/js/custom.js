var $ = jQuery.noConflict();

jQuery(document).ready(function($){

$('.hero-slider').slick({
  dots: false,
  infinite: true,
  arrows:true,
  fade:true,
  autoplay:false,
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


$('.quote-slider').slick({
  arrows: true,
  speed: 1000,
  infinite:false,
  slidesToShow: 1,
   adaptiveHeight: true
});



/*==========================*/ 
/* Fix on Scroll */ 
/*==========================*/
$('.fix').theiaStickySidebar({
      // Settings
      additionalMarginTop: 80
    });

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
 onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );

 

$('.os-animation').each( function(index, element){
  $(element).waypoint({
      handler: function(){

        var osElementLoad = $(this),
        osAnimationClassLoad = osElementLoad.attr('data-os-animation'); 
          $(element).removeClass(osAnimationClassLoad);
      },offset: '200px'
  });
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


$(document).ready(function(){
  $('#customFileLang').change(function(e){
      var fileName = e.target.files[0].name;
      $('#upload-name').text(fileName);
  });
});
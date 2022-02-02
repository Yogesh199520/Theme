//---- menu

jQuery(function(jQuery) {

jQuery('#menu-open-btn').on('click', function () {

	jQuery('#menu-open').addClass('active');

	jQuery('.collapse.in').toggleClass('in');

	jQuery('a[aria-expanded=true]').attr('aria-expanded', 'false');

});



jQuery('.close-menu').on('click', function () {

	jQuery('#menu-open').removeClass('active');

});

}); 





//---- Mobile Menu
if (jQuery(window).width() < 999) {
jQuery(document).ready(function (e) {
  jQuery(".nav").addClass("main-list"), jQuery("body").addClass("menu-canvas-off"), jQuery("body").prepend('<div class="mobile-menu"></div>'), jQuery(".main-list").clone().appendTo(".mobile-menu"), jQuery(".topbar_left").clone().appendTo(".mobile-menu"), jQuery(".topbar_left"), jQuery(".header .logo_img").clone().appendTo(".mobile-menu"), jQuery(".mobile-menu .logo_img").insertBefore(".mobile-menu .main-list"), jQuery(".mobile-menu ul>li").find("ul").before('<span class="dropdown"><i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></div>'), jQuery(".mobile-menu").prepend('<div class="cross"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span></div>'), jQuery(".header .logo_img").find("ul").before('<span class="dropdown"><i class="fa fa-angle-down"></i><i class="fa fa-angle-right"></i></div>'), jQuery(".mobile-menu").prepend('<div class="cross"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span></div>'), jQuery(".nav")
    .after('<div class="toggle-mobile"><span class="layer one">&nbsp;</span><span class="layer two">&nbsp;</span><span class="layer three">&nbsp;</span></div>'), jQuery(".dropdown").click(function (e) {
      jQuery(this).toggleClass("open"), jQuery(this).next("ul").slideToggle()
    }), jQuery(document).ready(function (e) {
      var n = !0;
      jQuery(".toggle-mobile").click(function () {
        jQuery(".mobile-menu").toggleClass("show-menu"), jQuery(".wrapper").addClass("move-to-right"), jQuery("body").addClass("menu-canvas"), n = !1
      }), jQuery(".mobile-menu").click(function () {
        n = !1
      }), jQuery("html,.mobile-menu>ul li a,.cross,.logo_img a").click(function () {
        n && (jQuery(".mobile-menu").removeClass("show-menu"), jQuery(".wrapper").removeClass("move-to-right"), jQuery("body").removeClass("menu-canvas")), n = !0
      })
    })
}).ready(function (e) {
  var n = !0;
  jQuery(".toggle-mobile").click(function () {
    jQuery(".mobile-menu").toggleClass("show"), jQuery(".site-overlay").toggleClass("overlay-show"), jQuery(".toggle-mobile").toggleClass("open"), n = !1
  }), jQuery(".mobile-menu").click(function () {
    n = !1
  }), jQuery("html,.site-overlay,.mobile-menu li a").click(function () {
    n && (jQuery(".mobile-menu").removeClass("show"), jQuery(".toggle-mobile").removeClass("open"), jQuery(".site-overlay").removeClass("overlay-show")), n = !0
  })

  jQuery(".cross").click(function () {
    jQuery(".mobile-menu").removeClass("show");
  });
});
}




//---- header sticky 

jQuery(function(jQuery) {
jQuery(window).scroll(function() {
var r = jQuery(window).scrollTop();
r >=50 ? jQuery('header').addClass('sticky') : jQuery('header').removeClass('sticky');
});
});



/******** Accordion ********/

jQuery(function() {
  jQuery('.acc__title').click(function(j) {
    
    var dropDown = jQuery(this).closest('.acc__card').find('.acc__panel');
    jQuery(this).closest('.acc').find('.acc__panel').not(dropDown).slideUp();
    
    if (jQuery(this).hasClass('active')) {
      jQuery(this).removeClass('active');
    } else {
      jQuery(this).closest('.acc').find('.acc__title.active').removeClass('active');
      jQuery(this).addClass('active');
    }
    
    dropDown.stop(false, true).slideToggle();
    j.preventDefault();
  });
});



/******** go to top ********/

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});


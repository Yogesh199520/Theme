<?php
/*==============================*/
// @package Orthoguzman
// @author Orthoguzman
/*==============================*/


$footer_logo = get_field('footer_logo','option');
$copyright = get_field('copyright','option');
$office_hour = get_field('office_hour','option');
$map = get_field('map','option');
$heading = get_field('heading','option');
$body_text = get_field('body_text','option');
$send_an_email = get_field('send_an_email','option');
$call_us_right_now = get_field('call_us_right_now','option');
$email = get_field('email','option');
$phone = get_field('phone','option');
$tel = preg_replace('/[^A-Za-z0-9\-]/', '', $phone);
$access_ramp_image = get_field('access_ramp_image','option');
$access_ramp_image_url = $access_ramp_image['url'];
$access_ramp_image_alt = $access_ramp_image['alt'];
?>
 
  <footer class="footer-area">
    <div class="page-bottom-sec">
      <div class="container">
        <div class="row align-items-center">
          <div class="bottom-left-sec">
            <?php 
            if(!empty($heading)): echo '<h2>'.$heading.'</h2>'; endif;
            echo $body_text;
            ?>
          </div>
          <div class="bottom-right-sec">
            <div class="btn-wrapper"> <a class="btn-left" href="mailto:<?php echo $send_an_email; ?>" target="_blank">Send an email</a> <span class="or"> Or </span> <a href="tel:+<?php echo $call_us_right_now; ?>" class="btn-right">Call us right now</a> </div>
          </div>
        </div>
      </div>
    </div>
    <!--close section-->
    <?php if(!empty($map)): echo '<div class="footer-map-sec">'.$map.'</div>'; endif; ?>
  
    <div class="footer-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-4"> 
            <?php if(!empty($footer_logo)): echo '<a href="'.home_url('/').'" class="footer_logo"><img alt="'.get_bloginfo('name').'" src="'.$footer_logo.'" class="ct-image"></a>'; endif; ?>
            
            <div class="footer_detail">
              <p class="phone-footer"><a href="tel:+<?php echo $tel; ?>"><?php echo $phone; ?></a></p>
              <p class="email-footer"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?> </a> </p>
            </div>
          </div>
          <div class="col-4 center">
            <div class="footer-office-hours">
              <h4>Office Hours</h4>
              <?php echo $office_hour; ?>
            </div>
          </div>
          <div class="col-4">
            <div class="footer-social"> 
                <?php 
                while(have_rows('footer_social_links','option')): the_row();
                $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                $url = get_sub_field('url');
                echo '<a href="'.$url.'" target="_blank">'.$icon.'</a>';
                endwhile;
                ?>
            </div>
            <p class="with_us">Connect with us</p>
            <img width="347" height="58" alt="<?php echo $access_ramp_image_alt; ?>" src="<?php echo $access_ramp_image_url; ?>"/></div>
        </div>
        <div class="copyright-sec">
          <p><?php echo do_shortcode($copyright); ?></p>
        </div>
      </div>
    </div>
    <!--close section--> 
  </footer>
  <!--footer--> 
  <a id="button"></a> </div>
<!--wrapper--> 
<script type="text/javascript">
    jQuery(window).load(function(){
      jQuery('.simple_slider .flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
      
  </script> 
<script>
jQuery(function() {
    jQuery("a").on("click", function() {
        
      var $parent = jQuery(this).parent();
        if ($parent.hasClass('active')) {
            $parent.removeClass('active');
        }
        else{$parent.addClass('active');}
      
    });
});
</script> 
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
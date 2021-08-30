<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
/*============================== Content Container Start ==============================*/
if(is_front_page()):
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = $GLOBALS['theme_options']['telephone_strip'];
$email = $GLOBALS['theme_options']['email'];
$address = $GLOBALS['theme_options']['address']; ?>
<div class="bottom-container quote-container" id="contact" style="background-image:url('<?php echo IMG; ?>pattern1.jpg');">
  <div class="container">
    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
      <div class="col-md-12">
        <ul class="quote-list">
          <li>
            <div class="quote-box quote-left">
              <?php echo do_shortcode('[contact-form-7 id="5" title="Contact Form"]'); ?>
            </div>
          </li>
          <li>
            <div class="quote-box quote-right">
            <?php if(!empty($email)): ?>
              <div class="email-box">
                <div class="email-icon">
                  <img src="<?php echo IMG; ?>email.png" alt="email" />
                </div>
                <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
              </div>
          	<?php endif; ?>
          	<?php if(!empty($telephone)): ?>
              <div class="phone-box">
                <div class="phone-icon">
                  <img src="<?php echo IMG; ?>phone.png" alt="phone" />
                </div>
                <a href="tel:<?php echo $telephone_strip; ?>"><?php echo $telephone; ?></a>
              </div>
          	<?php endif; ?>
          	<?php if(!empty($address)): ?>
              <div class="address-box">
                <div class="address-icon">
                  <img src="<?php echo IMG; ?>address.png" alt="address" />
                </div>
                <p><?php echo $address; ?></p>
              </div>
          	<?php endif; ?>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->
<?php endif;
/*============================== Content Container End ==============================*/


$copyright = get_field('copyright','option');
if(!empty($copyright)): ?>

  <div class="scroll-top-arrow show">
    <a href="" class="arrow-up"><i class="fas fa-angle-up"></i></a>
  </div>

<footer>
  <div class="container">
    <div class="row">
      <div class="<?php if(is_front_page()): echo 'col-md-12'; else: echo 'col-md-10 offset-md-1'; endif; ?>">
        <div class="footer-content">
          <div class="copyright">
            <?php echo do_shortcode($copyright); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php endif;
wp_footer();
wp_reset_postdata();
edit_post_link('<i class="fas fa-pencil-alt"></i>','','',null,'edit-post-link'); ?>
<?php if(!is_front_page()){ ?>
<script>
$(document).ready(function(){
  $('body').addClass('fixed');
});
$('.navbar-nav > li > a, .header-btn').not('[title="WORKS"]').each(function(){
  var hrefId = $(this).attr('href');
  hrefId = hrefId.replace("#", "");
  //console.log(hrefId);
  $(this).attr('href','<?php echo home_url('/'); ?>?sec='+hrefId+'');
});
</script>
<?php }
if(isset($_GET['sec'])){ ?>
<script>
$(window).load(function() {
  $('html, body').stop().animate({
    scrollTop: $('#<?php echo $_GET['sec']; ?>').offset().top
  }, 1500);
});
</script>
<?php } ?>
</body>
</html>
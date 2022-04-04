<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/


$logo = get_field('logo','option');
$heading = get_field('heading','option');
$location = get_field('location','option');
$phone = get_field('phone','option');
$email = get_field('email','option');
$sub_heading = get_field('sub_heading','option');
$select_get_started_form = get_field('select_get_started_form','option');
$map_iframe = get_field('map_iframe','option');
$copyright = get_field('copyright','option');
$request_an_appointment_text = get_field('request_an_appointment_text','option');
$request_an_appointment_link = get_field('request_an_appointment_link','option');
?>
<section class="home_sec7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <?php 
                if(!empty($heading)): echo '<h2 class="section-title">'.$heading.'</h2>'; endif; 
                if(!empty($location)): echo '<p class="address3">'.$location.'</p>'; endif;
                if(!empty($phone)): echo '<p class="phone3">Phone : <a href="tel:+1'.$phone.'">'.$phone.'</a></p>'; endif;
                if(!empty($email)): echo '<p class="email3">Email: <a href="mailto:'.$email.'">'.$email.'</a></p>'; endif;
                if(have_rows('social_links','option')):
                ?>
                <ul class="social">
                    <?php 
                    while(have_rows('social_links','option')): the_row();
                    $icon = get_sub_field('icon');
                    $url = get_sub_field('url');
                    echo '<li><a href="'.$url.'" aria-label="linkedin Link" target="_blank" rel="noopener">'.$icon.'</a></li>';
                    endwhile;
                    ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php if(!empty($select_get_started_form)): ?>
            <div class="col-6">
                <div class="formbox">
                    <?php 
                    if(!empty($sub_heading)): echo '<h3>'.$sub_heading.'</h3>'; endif;
                    ?>
                    <div class="gf_browser_chrome gform_wrapper gform_legacy_markup_wrapper" id="gform_wrapper_2">
                        <div id="gf_1" class="gform_anchor" tabindex="-1"></div>
                        <?php echo do_shortcode('[contact-form-7 id="'.$select_get_started_form.'" title="Schedule A Free Consult Today"]'); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(!empty($map_iframe)): ?>
        <div class="home_sec8">
            <?php echo $map_iframe; ?>
        </div>
    <?php 
    endif; 
    ?>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <?php echo '<div class="col-3"><a href="'.home_url('/').'"><img width="100" height="100" src="'.$logo.'" alt="'.get_bloginfo('name').'" /></a></div>'; ?>
            <div class="col-3">
                <?php 
                if(!empty($heading)): echo '<h3>'.get_bloginfo('name').'</h3>'; endif; 
                if(!empty($location)): echo '<p class="address2">'.$location.'</p>'; endif;
                if(!empty($phone)): echo '<p class="phone2">Phone : <a href="tel:+1'.$phone.'">'.$phone.'</a></p>'; endif;
                if(!empty($email)): echo '<p class="email2">Email: <a href="mailto:'.$email.'">'.$email.'</a></p>'; endif;
                ?>
            </div>
            <div class="col-3">
                <h3>Navigate</h3>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'footer',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'footer_menu'
                    ));
                ?>
            </div>
            <?php 
            if(have_rows('social_links','option')):
            ?>
            <div class="col-3">
                <h3>Social</h3>
                <ul class="social">
                    <?php 
                    while(have_rows('social_links','option')): the_row();
                    $icon = get_sub_field('icon');
                    $url = get_sub_field('url');
                    echo '<li><a href="'.$url.'" aria-label="linkedin Link" target="_blank" rel="noopener">'.$icon.'</a></li>';
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>

        <div class="copyright">
            <?php if(!empty($copyright)): echo '<p>'.do_shortcode($copyright).'</p>'; endif; ?>
            <p><a href="<?php echo site_url('/privacy-policy/'); ?>">Privacy Policy</a> | <a href="<?php echo site_url('/terms-and-conditions/'); ?>">Terms and Conditions</a> | <a href="<?php echo site_url('/accessibility-statement/'); ?>">Accessibility Statement</a></p>
        </div>
    </div>
</footer>
</div>
<?php 
if(!empty($request_an_appointment_link)): echo '<a href="'.$request_an_appointment_link.'" class="side_button" target="_blank">'.$request_an_appointment_text.'</a>'; endif; ?>
<a id="button"></a> 
<script>
    jQuery(window).load(function(){
      jQuery('.simple_slider .flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          jQuery('body').removeClass('loading');
        }
      });
    });
  
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

<?php wp_footer(); ?>
</body>
</html>
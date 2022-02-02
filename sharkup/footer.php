<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
if(!is_page(389)):
$footer_text = get_field('footer_text','option');
$address = get_field('address','option');
$phone = get_field('phone','option');
$mobile = get_field('mobile','option');
$email = get_field('email','option');
$alt_phone = preg_replace('/\s+/', '', $phone);
$alt_mobile = preg_replace('/\s+/', '', $mobile);
$copyright = get_field('copyright','option');
?>
<!--============================== Footer Start ==============================-->

<footer id="footer">
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <?php if(!empty($footer_text)): ?>
                <div class="col-lg-5">
                    <div class="footer-box">
                        <h3>Sharkup</h3>
                        <p><?php echo $footer_text; ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-2">
                    <div class="footer-box">
                        <h3>Quick Links</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'footer1',
                            'depth'             => 1,
                            'container'         => false,
                            'menu_class'        => 'footer-nav',
                            'menu_id'           => 'footer-nav1',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ));
                        ?>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer-box">
                        <h3>Explore</h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location'    => 'footer2',
                            'depth'             => 1,
                            'container'         => false,
                            'menu_class'        => 'footer-nav',
                            'menu_id'           => 'footer-nav2',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ));
                        ?>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-box">
                        <?php if(!empty($address)): echo '<h3>Office</h3><p>'.$address.'</p>'; endif;  ?>
                        <ul class="query-list">
                            <?php 
                            if(!empty($phone)): echo '<li>Phone: <a href="tel:'.$alt_phone.'">'.$phone.'</a></li>'; endif; 
                            if(!empty($mobile)): echo '<li>Mobile: <a href="tel:'.$alt_mobile.'">'.$mobile.'</a></li>'; endif; 
                            if(!empty($email)): echo '<li>Email: <a href="mailto:'.$email.'">'.$email.'</a></li>'; endif; 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-lg-flex align-items-lg-center justify-content-lg-between">
                    <?php if(!empty($copyright)): ?>
                    <div class="copyright"><?php echo do_shortcode($copyright); ?></div>
                    <?php endif; ?>
                    <?php if(have_rows('social_links','option')): ?>
                    <ul class="social-links d-flex align-items-center">
                        <?php 
                        while(have_rows('social_links','option')): the_row(); 
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        echo '<li><a href="'.$url.'" rel="nofollow" target="_blank">'.$icon.'</a></li>';
                        endwhile;
                        ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============================== Footer End ==============================-->
<?php
endif;
wp_footer();
edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');

if($_GET['cprofile'] || $_GET['type'] ){
?>
<style>
body { padding-top: 0 !important; }
body .content-container { padding: 0 !important; }
body > *:not(.content-container) { display: none !important; }
.bsui .navbar-light .navbar-nav .nav-link.uwp-account-logout { display: none !important; }
.member-box { background-color: transparent !important; }
</style>
<?php
}
?>
<script>
    jQuery(document).ready(function(){  
        var count = 0;
        jQuery(".add-more").click(function() { 
            count += 1;
            if(count == 1){
                jQuery('#four').removeClass('d-none');
            }else if(count ==2){
                jQuery('#five').removeClass('d-none');
            }else if(count ==3){
                jQuery('#six').removeClass('d-none');
                jQuery(this).remove();
            }
            
            
        });  
    }); 
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
var handler = StripeCheckout.configure({
  key: 'pk_live_51JNjxuH626IfnOJtKeXASZzo4WEXx4TIXHXg2BK3AAabzYUt6tjZmFMRdlFvDmJ3btlbnqd8RCokytF8SGDdUObs00O9jFTN4o',
  image: 'https://sharkup.com/wp-content/uploads/2021/08/logo.png',
  token: function(token) {
    $("#stripeToken").val(token.id);
    $("#stripeEmail").val(token.email);
    $("#amountInCents").val(Math.floor($("#amountInDollars").val() * 100));
    $("#myForm").submit();
  }
});

$('#customButton').on('click', function(e) {
  var amountInCents = Math.floor($("#amountInDollars").val() * 100);
  var displayAmount = parseFloat(Math.floor($("#amountInDollars").val() * 100) / 100).toFixed(2);
  // Open Checkout with further options
  handler.open({
    name: 'Sharkup',
    description: 'Custom amount (AED' + displayAmount + ')',
    amount: amountInCents,
    currency: 'aed'
  });
  e.preventDefault();
});

// Close Checkout on page navigation
$(window).on('popstate', function() {
  handler.close();
});
</script>
</body>
</html>
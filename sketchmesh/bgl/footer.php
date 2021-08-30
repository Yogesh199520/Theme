<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/

if(is_home()){ $pid = get_option('page_for_posts'); }else{ $pid = get_the_ID(); }

$ccta_sub_heading = get_field('ccta_sub_heading','option');
$ccta_heading = get_field('ccta_heading','option');
$ccta_button_text = get_field('ccta_button_text','option');
$ccta_button_link = get_field('ccta_button_link','option');
if(!empty($ccta_sub_heading) || !empty($ccta_heading)):
?>
<div class="contact-cta-container add-bg-graphic more-opacity">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($ccta_sub_heading)): echo '<h6>'.$ccta_sub_heading.'</h6>'; endif; 
                if(!empty($ccta_heading)): echo '<h4>'.$ccta_heading.'</h4>'; endif; 
                if(!empty($ccta_button_text)): echo '<a href="'.$ccta_button_link.'" class="btn btn-primary">'.$ccta_button_text.'</a>'; endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;

$select_cta = get_field('select_cta',$pid);
if(!empty($select_cta)):
?>
<!--============================== Contact CTA Start ==============================-->
<div class="cta-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-content d-flex flex-wrap align-items-stretch mobile-slider pb-0">
                    <?php
                    foreach($select_cta as $scta_id):
                        $cta_icon = wp_get_attachment_image(get_field('cta_icon',$scta_id),'medium');
                        $cta_page_title = get_field('cta_page_title',$scta_id);
                        $cta_short_text = get_field('cta_short_text',$scta_id);
                    ?>
                    <a href="<?php echo get_permalink($scta_id); ?>" class="cta-box d-flex flex-column align-items-center">
                        <?php
                        if(!empty($cta_icon)): echo '<div class="cta-icon d-flex align-items-center">'.$cta_icon.'</div>'; endif;
                        echo '<h4>'.(!empty($cta_page_title)?$cta_page_title:get_the_title($scta_id)).'</h4>';
                        if(!empty($cta_short_text)): echo '<p>'.$cta_short_text.'</p>'; endif;
                        ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Contact CTA End ==============================-->
<?php 
endif;

$footer_logo = get_field('footer_logo','option');
$address 	 = get_field('address','option');
$telephone 	 = get_field('telephone','option');
$tel 		 = str_replace(' ', '', $telephone);
$email 		 = get_field('email','option');
$copyright 	 = get_field('copyright','option');
?>
<!--============================== Footer Start ==============================-->
<footer id="footer">
    <div class="footer-upper">
        <div class="container">
            <div class="row">
            	<?php 
            	if(!empty($footer_logo)): echo '<div class="col-lg-5"><a href="'.home_url('/').'" class="footer-logo"><img src="'.$footer_logo.'" alt="'.get_bloginfo('name').'" /></a></div>'; endif;
            	if(!empty($address) || !empty($telephone) || !empty($email)): 
            	?>
                <div class="col-lg-7">
                    <?php 
                    if(!empty($address)): echo '<div class="footer-query-box"><strong>Address:</strong><address>'.$address.'</address></div>'; endif; 
                    if(!empty($telephone)): echo '<div class="footer-query-box"><strong>Telephone:</strong><a href="tel:'.$tel.'">'.$telephone.'</a></div>'; endif; 
                    if(!empty($email)): echo '<div class="footer-query-box"><strong>Email:</strong><a href="mailto:'.$email.'">'.$email.'</a></div>'; endif; 
                    ?>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-lg-flex align-items-lg-center justify-content-lg-between">
                	<?php if(have_rows('social_link','option')): ?>
                    <ul class="social-links d-flex flex-wrap justify-content-center justify-content-lg-start order-md-2">
                        <?php
                        while(have_rows('social_link','option')): the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        echo '<li><a href="'.$url.'" target="_blank" rel="noopener">'.$icon.'</a></li>';
                        endwhile; 
                        ?>
                    </ul>
                    <?php 
                	endif;
                    wp_nav_menu( array(
                        'theme_location'    => 'footer',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'footer-nav d-flex align-items-center justify-content-center justify-content-lg-start order-md-3',
                        'menu_id'           => 'footer-nav',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
	                if(!empty($copyright)): echo '<div class="copyright order-md-1">'.do_shortcode($copyright).'</div>'; endif; 
	                ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============================== Footer End ==============================-->
<?php
do_action('bvg_edit_page_link');
wp_footer();
?>
</body>
</html>
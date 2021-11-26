<?php
/*==============================*/
// @package Booth Golf and Leisure
// @author Think EQ
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
?>
<?php
$footer_logo = get_field('footer_logo','option');
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ','',$telephone);
$email = $GLOBALS['theme_options']['email'];
$address = $GLOBALS['theme_options']['address'];
$copyright = get_field('copyright','option');
?>
<!--============================== Footer Start ==============================-->
<footer id="footer">
    <div class="footer-upper">
        <div class="container">
            <div class="row">
				<?php if(!empty($footer_logo)): echo '<div class="col-lg-5"><a href="'.home_url('/').'" class="footer-logo"><img src="'.$footer_logo.'" alt="'.get_bloginfo('name').'" /></a></div>'; endif; ?>
				<?php if(!empty($address) || !empty($telephone) || !empty($email)): ?>
                <div class="col-lg-7">
					<?php if(!empty($address)): ?>
                    <div class="footer-query-box">
                        <strong>Address:</strong>
                        <address><?php echo $address; ?></address>
                    </div>
					<?php 
					endif;
					if(!empty($telephone)):
					?>
                    <div class="footer-query-box">
                        <strong>Telephone:</strong>
                        <a href="tel:<?php echo $telephone_strip; ?>"><?php echo $telephone; ?></a>
                    </div>
					<?php 
					endif;
					if(!empty($email)):
					?>
                    <div class="footer-query-box">
                        <strong>Email:</strong>
                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    </div>
					<?php endif; ?>
                </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
	
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-lg-flex align-items-lg-center justify-content-lg-between">
					<?php if(have_rows('social_icons','option')): ?>
                    <ul class="social-links d-flex flex-wrap justify-content-center justify-content-lg-start order-md-2">
						<?php
						while(have_rows('social_icons','option')): the_row();
							$url = get_sub_field('link');
							echo '<li><a href="'.$url.'" aria-label="'.ao_get_domain_name($url).' Link'.'" target="_blank" rel="noopener">'.get_sub_field('icon').'</a></li>';
						endwhile;
						?>
                    </ul>
					<?php 
					endif; ?>
					<?php
                        wp_nav_menu( array(
                            'theme_location'    => 'footer',
                            'depth'             => 1,
                            'container'         => false,
                            'menu_class'        => 'footer-nav d-flex align-items-center justify-content-center justify-content-lg-start order-md-3'
                        ));
                    ?>
					<?php if(!empty($copyright)): echo '<div class="copyright order-md-1">'.do_shortcode($copyright).'</div>'; endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============================== Footer End ==============================-->
<?php
wp_footer();

do_action('ao_edit_page_link');
?>
<script>
function onCatChange(dropdown) {
    switch(dropdown.id){
        case 'cat':
            pageSlug = ajax_object.news_url;
            pageSlugCat = "/news/category/";
            break;
        case 'work_cat':
            pageSlug = ajax_object.home_url+"/our-works/";
            pageSlugCat = "/our-works-category/";
            break;
        default:
            pageSlug = "/404/";
            pageSlugCat = "/404/";
    }
    //console.log(dropdown.value);
    if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
        location.href = ajax_object.home_url+pageSlugCat+dropdown.options[dropdown.selectedIndex].value+'/';
    }else{
        location.href = pageSlug;
    }
    dropdown.closest('.filter-box').classList.add("loading");
}

$(function () {
    
    var dropdownCat = document.getElementById("cat");
    if(typeof(dropdownCat) != 'undefined' && dropdownCat != null){
        dropdownCat.onchange = function(){ onCatChange(dropdownCat) };
    }

    var dropdownWorkCat = document.getElementById("work_cat");
    if(typeof(dropdownWorkCat) != 'undefined' && dropdownWorkCat != null){
        dropdownWorkCat.onchange = function(){ onCatChange(dropdownWorkCat) };
    }

});
</script>
</body>
</html>
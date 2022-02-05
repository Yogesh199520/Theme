<?php
/*==============================*/
// @package WaterFront Law
// @author Think EQ
/*==============================*/

$footer_logo = get_field('footer_logo','option');
$footer_text = get_field('footer_text','option');
$address = $GLOBALS['theme_options']['address'];
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ','',$telephone);
$fax = $GLOBALS['theme_options']['fax'];
$email = $GLOBALS['theme_options']['email'];
$copyright = get_field('copyright','option');
?>
<!--============================== Footer Start ============================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-upper d-flex justify-content-between">
                    <div class="footer-upper-left d-flex align-items-lg-start align-items-center flex-column flex-lg-row">
                        <div class="footer-intro-box">
                            <?php
                            
                            if(!empty($footer_logo)):
                                echo '<a href="'.home_url('/').'" class="footer-logo"><img loading="lazy" src="'.$footer_logo.'" alt="'.get_bloginfo('name').'" /></a>';
                            endif;
                            
                            if(!empty($footer_text)):
                                echo '<p class="footer-text d-none d-lg-block">'.$footer_text.'</p>';
                            endif;
                            
                            ?>
                            <div class="footer-contact-box d-flex d-lg-none ">
                                <?php
                                if(have_rows('social_links','option')):
                                    echo '<div class="footer-social-media">';
                                    while(have_rows('social_links','option')): the_row();
                                        $url = get_sub_field('url');
                                        echo '<a href="'.$url.'" aria-label="'.ao_get_domain_name($url).' Link'.'" target="_blank" rel="noopener">'.get_sub_field('icon').'</a>';
                                    endwhile;
                                    echo '</div>';
                                endif;
                                ?>
                                <ul class="footer-contact">
                                    <?php
                                    if(!empty($address)):
                                        echo '<li><span>'.$address.'</span></li>';
                                    endif;
                                    if(!empty($telephone)):
                                        echo '<li><span>Tel: <a href="tel:'.$telephone_strip.'">'.$telephone.'</a></span></li>';
                                    endif;
                                    if(!empty($fax)):
                                         echo '<li><span>Fax: <strong>'.$fax.'</strong></span></li>';
                                    endif;
                                    if(!empty($email)):
                                        echo '<li><span>Email: <a href="mailto:'.$email.'">'.$email.'</a></span></li>';
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <?php if(have_rows('accreditations_logo','option')): ?>
                        <div class="footer-partner-box d-flex align-items-center">
                            <?php
                            while(have_rows('accreditations_logo','option')): the_row();
                                echo '<div class="footer-partner">'.wp_get_attachment_image( get_sub_field('logo'), 'medium' ).'</div>';
                            endwhile;
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="footer-upper-right">
                        <div class="footer-contact-box d-none d-lg-block">
                            <?php
                            if(have_rows('social_links','option')):
                                echo '<div class="footer-social-media">';
                                while(have_rows('social_links','option')): the_row();
                                    $url = get_sub_field('link');
                                    echo '<a href="'.$url.'" aria-label="'.ao_get_domain_name($url).' Link'.'" target="_blank" rel="noopener">'.get_sub_field('icon').'</a>';
                                endwhile;
                                echo '</div>';
                            endif;
                            ?>
                            <ul class="footer-contact">
                                <?php
                                if(!empty($address)):
                                    echo '<li><span>'.$address.'</span></li>';
                                endif;
                                if(!empty($telephone)):
                                    echo '<li><span>Tel: <a href="tel:'.$telephone_strip.'">'.$telephone.'</a></span></li>';
                                endif;
                                if(!empty($fax)):
                                    echo '<li><span>Fax: <strong>'.$fax.'</strong></span></li>';
                                endif;
                                if(!empty($email)):
                                    echo '<li><span>Email: <a href="mailto:'.$email.'">'.$email.'</a></span></li>';
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-lower d-flex justify-content-between flex-column-reverse flex-lg-row">
                    <?php
                    
                    if(!empty($copyright)):
                        echo '<div class="copyright">'.do_shortcode($copyright).'</div>';
                    endif;
                    
                    if(!empty($footer_text)):
                        echo '<p class="footer-text d-bloack d-lg-none">'.$footer_text.'</p>';
                    endif;
                    
                    wp_nav_menu( array(
                        'theme_location'    => 'footer',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'footer-nav-list d-flex justify-content-center justify-content-lg-end flex-wrap'
                    ));
                    
                    ?>
                </div>
            </div>
        </div>
</footer>
<!--==============================  Footer End ==============================-->
<?php
wp_footer();
do_action('ao_edit_page_link');
?>
<script>
function onCatChange(dropdown) {
    switch(dropdown.id){
        case 'cat':
            pageSlug = ajax_object.news_url;
            pageSlugCat = "/team/category/";
            break;
        case 'team_cat':
            pageSlug = ajax_object.home_url+"/people/";
            pageSlugCat = "/team-category/";
            break;
        default:
            pageSlug = "/404/";
            pageSlugCat = "/404/";
    }
    //console.log(dropdown.value);
    if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
        location.href = ajax_object.home_url+pageSlugCat+dropdown.options[dropdown.selectedIndex].value+'/';
        //console.log(pageSlug);
    }else{
        location.href = pageSlug;
        //console.log(pageSlug);
    }
    dropdown.closest('.team-filter-box').classList.add("loading");
}

$(function () {

    /*==========================*/ 
    /* push menu */ 
    /*==========================*/
    new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
      type : 'cover'
    });

    var dropdownTeamCat = document.getElementById("team_cat");
    if(typeof(dropdownTeamCat) != 'undefined' && dropdownTeamCat != null){
        dropdownTeamCat.onchange = function(){ onCatChange(dropdownTeamCat) };
    }

});
</script>
</body>
</html>
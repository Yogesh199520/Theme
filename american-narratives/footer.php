<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/

$copyright = get_field('copyright','option');
$address = get_field('address','option');
$email = get_field('email','option');
$site_url = get_field('site_url','option');
?>
<div class="bottom-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="bott-list d-md-flex flex-wrap">
                    <?php if(!empty($email)): ?>
                    <li class="bott-list-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="bott-list-box d-flex flex-wrap align-items-center">
                            <div class="bott-img-box border-radius-50 overflow-hidden">
                                <img src="<?php echo IMG.'mail.svg'; ?>" alt="Address Icon" />
                            </div>
                            <div class="bott-text-box">
                                <?php echo $email; ?>
                            </div>
                        </div>
                    </li>
                    <?php
                    endif; 
                    if(!empty($address)):
                    ?>
                    <li class="bott-list-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                        <div class="bott-list-box d-flex flex-wrap align-items-center">
                            <div class="bott-img-box border-radius-50 overflow-hidden">
                                <img src="<?php echo IMG.'guest.svg'; ?>" alt="Email Icon" />
                            </div>
                            <div class="bott-text-box">
                                <?php echo $address; ?>
                            </div>
                        </div>
                    </li>
                    <?php
                    endif;
                    if(!empty($site_url)):
                    ?>
                    <li class="bott-list-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
                        <div class="bott-list-box d-flex flex-wrap align-items-center">
                            <div class="bott-img-box border-radius-50 overflow-hidden">
                                <img src="<?php echo IMG.'web.svg'; ?>" alt="Careermp Icon" />
                            </div>
                            <div class="bott-text-box">
                                <?php echo $site_url; ?>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Footer Start ==============================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-content-box d-md-flex align-items-md-end justify-content-md-between">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'footer_menu',
                            'depth'             => 1,
                            'container'         => false,
                            'menu_class'        => 'footer-nav d-md-flex align-items-center'
                        ) );
                    ?>
                    <div class="footer-left">
                        <?php if(!empty($copyright)): echo '<p class="copyright">'.do_shortcode($copyright).'</p>'; endif; ?>
                    </div>
                    <div class="footer-right">
                        <div class="design-by">
                            <img src="<?php echo IMG.'footer-logo.png'; ?>" alt="Sketchmesh Logo"> Designed by <b><a href="https://sketchmesh.com/" target="_blank" rel="noopener">Sketchmesh</a></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--============================== Footer End ==============================-->
<?php
wp_footer();
edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');
?>
</body>
</html>
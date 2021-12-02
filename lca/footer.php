<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/

$copyright = get_field('copyright','option');
$heading = get_field('heading','option');
$select_form = get_field('select_form','option');
$text = get_field('text','option');
?>
<footer id="footer" class="text-uppercase">
    <?php if(!empty($select_form)): ?>
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="hu-label">Subscribe to our <b>Newsletter</b></div>
                </div>
                <div class="col-md-8">
                    <div class="footer-form-container">
                        <?php echo do_shortcode('[contact-form-7 id="'.$select_form.'" title="Subscribe To Our Newsletter"]'); ?>
                        <p class="agree-text-link text-center">
                            By registering you adhere to our <a href="<?php echo site_url('/privacy-policy/'); ?>">privacy policy</a> and <a href="<?php echo site_url('/terms-of-use/'); ?>">Terms of use</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif;
    if(have_rows('social_icons','option')):
    ?>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="social-links">
                        <?php 
                        while(have_rows('social_icons','option')): the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        echo '<li><a href="'.$url.'" aria-label="linkedin Link" target="_blank" rel="noopener">'.$icon.'</a></li>';
                        endwhile;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-md-flex flex-wrap align-items-md-center justify-content-md-between">
                    <?php if(!empty($copyright)): echo '<div class="copyright text-capitalize">'.do_shortcode($copyright).'</div>'; endif; ?>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'footer',
                            'depth'             => 1,
                            'container'         => false,
                            'menu_class'        => 'footer-nav d-md-flex flex-md-wrap align-items-md-center'
                        ));
                    ?>
                    <div class="design-by">
                        <img src="<?php echo IMG.'footer-logo1.png'; ?>" alt="Sketchmesh" /> Designed by <br />
                        <b><a href="https://www.sketchmesh.com/" target="_blank" rel="noopener">Sketchmesh</a></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
<?php
/*==============================*/
// @package SusanCalman
// @author Thinkeq
/*==============================*/
if(!is_front_page() && !is_home()):
    echo '</main>';
    get_template_part('template-part/social-links');
endif;

$copyrights = get_field('copyrights','option');
?>
<!--============================== Footer Start ==============================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-md-flex flex-md-row-reverse align-items-md-center justify-content-md-between">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'footer_menu',
                        'depth'             => 1,
                        'container'         => false,
                        'menu_class'        => 'footer-nav d-flex align-items-center',
                        'menu_id'           => 'footer-nav',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                ?>
                <?php if(!empty($copyrights)): echo '<div class="copyright">'.do_shortcode($copyrights).'</div>'; endif; ?>
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
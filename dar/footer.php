<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/
$footer_logo = get_field('footer_logo','option');
$copyright = get_field('copyright','option');
$address = get_field('address','option');
$email = get_field('email','option');
?>
</main>    
<!--============================== Main End ==============================-->
<!--============================== Footer Start ==============================-->
<footer id="footer">
    <div class="footer-upper">
        <div class="container">
            <div class="row align-items-md-start">
                <div class="col-md-3">
                  <?php echo '<a class="footer-logo" href="'.home_url('/').'"><img src="'.$footer_logo.'" alt="'.get_bloginfo('name').'"/></a>'; ?> 
                </div>
                <div class="col-md-9">
                    <div class="contact-details white ml-md-auto">
                        <?php if(!empty($email)): ?>
                          <p>
                            <img src="<?php echo IMG.'email.svg'; ?>" alt="email icon" />
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                          </p>
                        <?php 
                        endif;
                        if(!empty($address)): 
                        ?>
                          <p>
                            <img src="<?php echo IMG.'location.svg'; ?>" alt="location icon" />
                            <?php echo strip_tags($address); ?>
                          </p>
                          <p><a href="https://goo.gl/maps/WJSGFccDt6bRWj4E6" class="small" target="_blank">View on map</a></p>
                        <?php 
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($copyright)): ?>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-md-flex align-md-items-center justify-content-md-between">
                    <div class="copyright">
                        <?php echo do_shortcode($copyright); ?>
                    </div>
                    <div class="design-by">
                        <img src="<?php echo IMG.'footer-logo1.png'; ?>" alt=""> Designed by <br><b><a href="https://sketchmesh.com/" target="_blank" rel="noopener">Sketchmesh</a></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</footer>
<!--============================== Footer End ==============================-->
<?php
wp_footer();
if(current_user_can('administrator')) :
edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-oonly">Edit Page</b>','','',null,'edit-post-link');
endif;
?>

</body>
</html>
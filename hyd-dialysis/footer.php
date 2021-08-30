<?php 
$logo = get_field('logo','option');
$copyright = get_field('copyright', 'option');
$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$address = get_field('address', 'option');
$footer_text = get_field('footer_text', 'option');
?>
</main>    
<!--============================== Main End ==============================-->
<!--============================== Footer Start ==============================-->
<?php if(!is_page(26)): ?>
<footer id="footer">
    <div class="footer-upper">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-content-left">
                        <?php echo '<a class="footer-logo" href="'.home_url('/').'"><img src="'.$logo.'" alt="'.get_bloginfo('name').'"/></a>';
                        echo $footer_text;
                        if(!empty($copyright)):
                        ?>
                        <div class="copyright">
                            <?php echo do_shortcode($copyright); ?>
                        </div>
                        <?php 
                        endif; 
                        ?>
                        <div class="design-by">
                            <img src="<?php echo IMG.'sketchmesh-logo.png'; ?>"alt="Sketchmesh Logo"> Designed by <b><a href="https://sketchmesh.com/" target="_blank">Sketchmesh</a></b>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <ul class="footer-right">
                        <?php if(!empty($phone)): ?>
                        <li>
                            <div class="footer-contact">
                                <div class="footer-icon">
                                    <img src="<?php echo IMG.'call.svg'; ?>" alt="Call icon">
                                </div>
                                <p>To book appointments call</p>
                                <span>
                                    <a href="tel:<?php echo str_replace(' ','',$phone); ?>"><?php echo $phone; ?></a>
                                </span>
                            </div>
                        </li>
                        <?php
                        endif;
                        if(!empty($email)):
                        ?> 
                        <li>
                            <div class="footer-contact">
                                <div class="footer-icon">
                                    <img src="<?php echo IMG.'mail.png'; ?>" alt="Email icon">
                                </div>
                                <p>For any assistance mail us </p>
                                <span>
                                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </span>
                            </div>
                        </li>
                        <?php
                        endif;
                        if(!empty($address)):
                        ?> 
                        <li>
                            <div class="footer-contact">
                                <div class="footer-icon">
                                    <img src="<?php echo IMG.'location.svg'; ?>" alt="Address icon">
                                </div>
                                <p>Meet with us </p>
                                <address><?php echo $address; ?></address>
                            </div>
                        </li>
                        <?php 
                        endif; 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-lower d-block d-md-none">
        <div class="container">
            <div class="row justify-content-between">
                <?php
                if(!empty($copyright)):
                ?>
                <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                    <div class="copyright">
                       <?php echo do_shortcode($copyright); ?>
                    </div>
                </div>
                <?php 
                endif; 
                ?>
                <div class="col-md-6 text-center text-md-right">
                    <div class="design-by">
                        <img src="<?php echo IMG.'sketchmesh-logo.png'; ?>" alt="Sketchmesh Logo"> Designed by <b><a href="https://sketchmesh.com/" target="_blank">Sketchmesh</a></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php elseif(is_page(26)): ?>
<footer id="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center">
                <div class="copyright">
                    <?php echo do_shortcode($copyright); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>
<!--============================== Footer End ==============================-->
</main> 
<!--============================== Main End ==============================-->  
<?php
wp_footer();
edit_post_link('<i class="fas fa-pencil-alt"></i><b class="sr-only">Edit Page</b>','','',null,'edit-post-link');
?>
<script>
/*==========================*/ 
/* Redirect to slug */ 
/*==========================*/
jQuery('.mobile-cat').change(function() {
  console.log('value');
  window.location = $(this).val();
});

jQuery(document).ready(function ($) {
  $("#pagination > ul").addClass("page-num type2 d-flex justify-content-end");
  $("#pagination > ul").removeClass("page-numbers");
  //console.log('ok');
});
jQuery(document).ready(function ($) {
  $("#event-pagination > ul").addClass("page-num type2 d-flex justify-content-end");
  $("#event-pagination > ul").removeClass("page-numbers");
  //console.log('ok');
});
jQuery(document).ready(function ($) {
  $(".patients-pagination > ul").addClass("page-num d-flex justify-content-end");
  $(".patients-pagination > ul").removeClass("page-numbers");
  //console.log('ok');
});
</script>
</body>
</html>
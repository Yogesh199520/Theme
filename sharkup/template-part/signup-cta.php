<?php
$sun_sub_heading = get_field('sun_sub_heading','option');
$sun_heading = get_field('sun_heading','option');
$sun_body_text = get_field('sun_body_text','option');
if(!empty($sun_heading) || !empty($sun_body_text)):
?>
<!--============================== CTA Start ==============================-->
<div class="cta-container gradient-bg ">
    <div class="container">
        <div class="row d-lg-flex align-items-lg-center">
            <div class="col-md-4">
                <div class="cta-img-box">
                    <img src="<?php echo IMG; ?>moon.png" alt="moon icon" />
                </div>
            </div>
            <div class="col-md-8">
                <div class="cta-text-box">
                    <?php
                    if(!empty($sun_sub_heading)): echo ' <h6>'.$sun_sub_heading.'</h6>'; endif;
                    if(!empty($sun_heading)): echo '<h4>'.$sun_heading.'</h4>'; endif;
                    if(!empty($sun_body_text)): echo '<p>'.$sun_body_text.'</p>'; endif;
                    ?>
                    <?php echo do_shortcode('[contact-form-7 id="172" title="Newsletter Form"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== CTA End ==============================-->
<?php endif; ?>
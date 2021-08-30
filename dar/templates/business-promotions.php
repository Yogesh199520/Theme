<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Business Promotions */
get_header(); ?>

<!--============================== Content start ==============================-->

<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
$form_heading = get_field('form_heading');
$form_id = get_field('choose_form');
?>
<!--============================== Content start ==============================-->
<div class="content-container business-promotion-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <div class="bp-content">
                    <?php 
                    the_content();
                    if(!empty($form_id)):
                    if(!empty($form_heading)): echo '<p><strong>'.$form_heading.'</strong></p>'; endif; 
                    echo do_shortcode('[contact-form-7 id="'.$form_id .'"]');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
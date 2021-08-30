<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Benefits Child */
get_header(); ?>

<!--============================== Content start ==============================-->

<div class="main-banner-container gradient-bg">
    <div class="container container1">
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
    <div class="container container1">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <div class="bp-content">
                    <?php 
                    the_content();
                    if(!empty($form_id)):
                        if(!empty($form_heading)): echo '<p><strong>'.$form_heading.'</strong></p>'; endif; 
                        echo '<div class="row"><div class="col-lg-6 col-md-8">';
                            echo do_shortcode('[contact-form-7 id="'.$form_id .'"]');
                        echo '</div></div>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
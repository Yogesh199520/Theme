<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header(); 

$image = wp_get_attachment_image(get_field('award_post_image'),'full');
$body_text = get_field('body_text');
?>
<!--============================== Content Start ==============================-->
<div class="content-container events-banner-container gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                 <?php if(!empty($image)): echo '<div class="events-banner os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">'.$image.'</div>'; endif; ?>
                <div class="eb-heading gradient-bg text-center">
                    <h1 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.32s"><?php the_title(); ?></h1>
                </div>
                <?php if(!empty($body_text)): echo '<div class="eb-info os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.34s">'.$body_text.'</div>'; endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<?php get_footer(); ?>
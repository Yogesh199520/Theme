<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header(); 

$image = wp_get_attachment_image(get_field('image'),'full');
$expreince = get_field('expreince');
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
                <?php if(!empty($expreince)): echo '<div class="eb-info os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.34s">'.$expreince.'</div>'; endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<?php get_footer(); ?>
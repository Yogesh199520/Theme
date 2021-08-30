<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header(); ?>

<!--============================== Content Start ==============================-->
<div class="content-container events-banner-container gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
            	 <?php if(has_post_thumbnail()): ?>
                <div class="events-banner os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
                <div class="eb-heading gradient-bg text-center">
                    <h1 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.32s"><?php the_title(); ?></h1>
                </div>
                <div class="eb-info os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.34s">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<?php get_footer(); ?>
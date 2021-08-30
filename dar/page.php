<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  	exit; // Exit if accessed directly
}
get_header();?>
<!--============================== Content Start ==============================-->
<div class="contact-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                	<h1><?php the_title();?></h1>
                </div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<?php get_footer(); ?>

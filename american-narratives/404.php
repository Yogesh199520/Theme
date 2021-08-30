<?php
/**
 * Template Name: 404
 * @package American-narratives - American narative podcast
 * @author SLILEmyPAGE
 */
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
get_header(); ?>
<?php /*=====================  Content Start  =====================*/ ?>
<div class="error-container content-container more-pad text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            	<h1>Sorry! Page not found.</h1>
                <h2><span>404</span></h2>
                <a href="<?php echo home_url('/'); ?>" class="btn btn-default">Return Home</a>
            </div>
        </div>
    </div>
</div>
<?php /*=====================  Content End  =====================*/ ?>
<?php get_footer(); ?>
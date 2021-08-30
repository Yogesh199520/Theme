<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
get_header(); ?>
<?php /*=====================  Content Start  =====================*/ ?>
<div class="error-container content-container more-pad text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
            	<h1>Sorry! Page not found.</h1>
                <h2><span>404</span></h2>
                <a href="<?php echo home_url('/'); ?>" class="btn btn-default">Return Home</a>
            </div>
        </div>
    </div>
</div>
<?php /*=====================  Content End  =====================*/ ?>
<?php get_footer(); ?>
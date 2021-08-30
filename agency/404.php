<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 

?>
<div class="inner-banner" style="background-image: url(<?php echo IMG.'404.gif'; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="content-container">
    <div class="container">
        <div class="">
          <p class="h3 py-2 text-center text-danger">404 <a class="text-info" href="<?php echo esc_url(home_url('/'));?>">Back to homepage</a></p>
        </div>
    </div>
</div>
<?php get_footer(); ?>
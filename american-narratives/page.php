<?php
/*==============================*/
// @package American Narrative
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}
get_header();
?>
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-10 offset-lg-1">
            	<?php while(have_posts()): the_post(); the_content(); endwhile; ?>
            </div> 
        </div>
    </div>
</div>
<?php get_footer(); ?>
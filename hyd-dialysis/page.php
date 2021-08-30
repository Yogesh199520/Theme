<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  	exit; // Exit if accessed directly
}
get_header();
?>
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <div class="heading-2 text-moon-yellow">
                    <h1><?php the_title();?></h1>
                    <?php 
                    while(have_posts()) :the_post();
                        the_content();
                    endwhile;
                    ?>
                    
                    <?php 
                    if(is_page('forums')):
                    the_content();
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
get_footer();
?>
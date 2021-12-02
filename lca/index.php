<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(have_posts()):  while(have_posts()): the_post(); the_content(); endwhile;  endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); 
?>
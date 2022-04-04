<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/

if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

get_template_part('/template-part/inner-banner');
?>

<section class="braces-sec1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(have_posts()):  while(have_posts()): the_post(); the_content(); endwhile;  endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer();
?>
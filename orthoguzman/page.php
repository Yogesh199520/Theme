<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

?>
<section class="banner-sec">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</section>
<section class="contact_sec1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer(); 
?>
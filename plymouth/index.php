<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

?>
<div class="page_banner" style="background-image: url(<?php echo IMG.'invisalign2-PlymouthOrthodontics-h.jpg'; ?>);">
    <div class="page_title_layer">
        <h1><?php the_title(); ?></h1>
    </div>
</div>
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
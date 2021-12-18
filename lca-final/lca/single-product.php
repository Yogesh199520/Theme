<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
get_header();
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container add-dot-list">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <h1><?php the_title(); ?></h1>
                <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php get_footer(); ?>
<?php
/*==============================*/
// @package SketchMesh
// @author SLICEmyPAGE
/*==============================*/
get_header(); $id = get_option('page_for_posts');
if(have_posts()): while(have_posts()): the_post(); ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
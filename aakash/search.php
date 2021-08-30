<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 * The template for displaying search content
 */
get_header(); ?>
<?php // inner container start  ?>
<div class="inner-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <?php if(have_posts()) : ?>
        <h2 class="text-center"><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'slicemytheme' ); ?>: "<?php the_search_query(); ?>"</h2>
        <?php while (have_posts()) : the_post(); ?>
        <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a>
        <a href="<?php the_permalink();?>" class="btn btn-primary btn-xs pull-right">Read More</a></h3>
        <?php endwhile; ?>
      <?php else : ?>
		  <h3 class="text-center">Not Found</h3>
		  <p class="text-center">Sorry, but you are looking for something that isn't here.</p>
		  <?php get_search_form(); ?>
      <?php endif;?>                           
      </div>
    </div>
  </div>
</div>
<?php // inner container start  ?>
<?php get_footer(); ?>
<?php get_header(); ?>
<div class="main-container">
	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content();
				wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'slicemytheme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'slicemytheme' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
				) ); ?>
				<?php comments_template( '', true ); // Remove if you don't want comments ?>
				<br class="clear">
				<?php edit_post_link(); ?>
			</article>
			<!-- /article -->
		<?php endwhile; ?>
	<?php else: ?>
		<h2><?php _e( 'Sorry, nothing to display.', 'slicemytheme' ); ?></h2>
	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>

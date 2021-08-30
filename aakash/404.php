<?php get_header(); ?>
<div class="main-container text-center">
	<div class="container">
		<h1><?php _e( 'Page not found', 'slicemytheme' ); ?></h1>
		<h2>
			<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'slicemytheme' ); ?></a>
		</h2>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
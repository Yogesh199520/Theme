<?php get_header(); ?>
<div class="main-container">
	<div class="container">
		<h1><?php _e( 'Archives', 'slicemytheme' ); ?></h1>
		<?php get_template_part('loop'); ?>
		<?php get_template_part('pagination'); ?>
	</div>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<?php //======== row start ======== ?>
<div class="row">
	<div class="col-sm-12">
    	<div class="content-box">
		<?php get_template_part('loop'); ?>
		<?php get_template_part('pagination'); ?>
		</div>
	</div>
</div>
<?php //======== row end ======== ?>
<?php get_footer(); ?>
<?php get_header(); ?>
<?php if (have_posts()): ?>
<?php $prv_post = get_previous_post();
$next_post = get_next_post(); 
?>
<?php //========= row start ========= ?>
<div class="row">
	<div class="col-sm-12">
	<?php while (have_posts()) : the_post();
	$imgID = get_post_thumbnail_id($post->ID);
	$img = wp_get_attachment_image_src($imgID,'full',false,''); ?>
	<div id="post-<?php the_ID(); ?>" class="single-post">
		<div class="entry-media"  style="background-image:url(<?php echo $img[0]; ?>);">
			<h3><?php the_title(); ?></h3>
			<h6><?php the_category(', '); // Separated by commas ?> <span class="separator">|</span> <?php the_time('j F Y'); ?> <span class="separator">|</span> <?php if (comments_open( get_the_ID() ) ) comments_number( __( 'Leave your thoughts', 'slicemytheme' ), __( '1 Comment', 'slicemytheme' ), __( '% Comments', 'slicemytheme' )); ?></h6>
			<h6><?php _e('Published by ','slicemytheme'); the_author_posts_link(); ?></h6>
			<div class="post-nav">
				<?php if(!empty($prv_post)){ ?><a href="<?php echo get_permalink($prv_post->ID ); ?>" class="prev-post">PREVIOUS POST</a><?php } ?>
				<?php if(!empty($next_post)){ ?><a href="<?php echo get_permalink($next_post->ID ); ?>" class="next-post">NEXT POST</a><?php } ?>
			</div>
		</div>
		<div class="content-box">
		   	<div class="entry-content">
		    	<?php the_content(); ?>
		    	<?php the_tags( __( 'Tags: ', 'slicemytheme' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
		    	<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			</div>
			<?php //========= row start ========= ?>
      		<div class="row">
			<?php comments_template(); ?>
			</div>
			<?php //========= row end ========= ?>
		</div>
    </div>
<?php endwhile; ?>
    </div>
</div>
<?php //========= row end ========= ?>
<?php else: ?>
<?php //========= article ========= ?>
<article>
	<h1><?php _e( 'Sorry, nothing to display.', 'slicemytheme' ); ?></h1>
</article>
<?php //========= article end ========= ?>
<?php endif; ?>
<?php get_footer(); ?>
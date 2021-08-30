<?php if (have_posts()): ?>
	<ul class="blog-list">
	<?php while (have_posts()) : the_post();
	$imgID = get_post_thumbnail_id($post->ID);
	$img = wp_get_attachment_image_src($imgID,'full',false,''); ?>
		<li id="post-<?php the_ID(); ?>" style="background-image:url(<?php echo $img[0]; ?>);">
        	<a href="<?php the_permalink(); ?>">
        	<h3><?php the_title(); ?></h3>
            <h6><span class="entry-meta"><?php foreach((get_the_category()) as $category) { ?> <span class="cat-sep"><?php echo $category->cat_name . '';?></span> <?php } ?></span> <span class="separator">|</span><?php the_time('j F Y'); ?> <span class="separator">|</span> <?php if (comments_open( get_the_ID() ) ) comments_number( __( 'Leave your thoughts', 'slicemytheme' ), __( '1 Comment', 'slicemytheme' ), __( '% Comments', 'slicemytheme' )); ?></h6>
            <em>read more</em>
            </a>
            <?php // edit_post_link(); ?>
        </li>
<?php endwhile; ?>
</ul>
<?php else: ?>
	<!-- article -->
	<article>
		<h2><?php _e( 'Coming Soon.', 'slicemytheme' ); ?></h2>
	</article>
	<!-- /article -->
<?php endif; ?>

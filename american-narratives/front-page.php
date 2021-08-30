<?php get_header();
	$bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
	$bg_image_mob = wp_get_attachment_image_url(get_field('bg_image_mobile'),'medium_large');
	$heading = get_field('heading');
?>

<div class="homepage-banner" style="background-image: url(<?php echo $bg_image; ?>);padding: 35px;">
	<h1><?php echo $heading; ?></h1>
</div>
<div class="homepage-banner" style="background-image: url(<?php echo $$bg_image_mob; ?>);display: none;">
	<h1><?php echo $heading; ?></h1>
</div>
<div class="body-content">
	<?php 
		$bold_heading = get_field('bold_heading');
		$red_heading = get_field('red_heading');
		if(!empty($bold_heading)){
			echo '<h3>'.$bold_heading.'</h3>';
		}
		if(!empty($red_heading)){
			echo '<h2>'.$red_heading.'</h2>';
		}
		the_content() ?>
</div>
<div class="episode-content">
	<?php 
		$bold_heading = get_field('bold_headings');
		$red_heading = get_field('red_headings');
		if(!empty($bold_heading)){
			echo '<h3>'.$bold_heading.'</h3>';
		}
		if(!empty($red_heading)){
			echo '<h2>'.$red_heading.'</h2>';
		}
		if(have_posts()):
   		$args = array ( 
        	'post_type' => 'post', 
        	'posts_per_page' =>1,
        	'order' => 'DESC',
        	'orderby' => 'date',
        );
        $query = new WP_Query( $args ); ?>
	    <?php while ($query->have_posts()) : $query->the_post(); ?>
	            <a href="<?php the_permalink(); ?>" >
	            	<div><?php the_title(); ?></div>
	                <?php if(has_post_thumbnail()) : ?>
	                	<img class="icon" src="<?php echo IMG.'mic.png'; ?>" alt=""/>
	            		<div class="post-img">
	                        <?php the_post_thumbnail(); echo do_shortcode('[powerpress_playlist date="false" title="false" images ="false"]'); ?>
	                    </div>
	                <?php endif; ?>
	               
	            </a>
	        </li>
	    <?php

	    wp_reset_postdata(); 
		endwhile ;
 	endif; ?>
</div>
<h3>Past Episode</h3>
<?php if(have_posts()):
    	$args = array ( 
        	'post_type' => 'post', 
        	'posts_per_page' => 8,
        	'offset' => 1
        );
        $query = new WP_Query( $args ); 
    	while($query->have_posts()) : $query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" >
            	<div><?php the_title(); ?></div>
                <?php if(has_post_thumbnail()) : ?>
                	<img class="icon" src="<?php echo IMG.'mic.png'; ?>" alt=""/>
            		<div class="post-img">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                
            </a>
        </li>
    <?php endwhile; ?>
<?php endif; ?>
<style>
	.post-img img {
		height: 150px;
		width: 150px;
	}
	.wp-playlist.wp-audio-playlist.wp-playlist-light {
	    width: 50%;
	    display: inline-block;
	}
	img.icon {
	    position: absolute;
	    left: 15px;
	    height: 25px;
	}
</style>
<?php get_footer(); ?>

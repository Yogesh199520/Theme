<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */

get_header();

$bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
$bg_image_mob = wp_get_attachment_image_url(get_field('bg_image_mobile'),'medium_large');
$heading = get_field('heading');
?>
<!--============================== Hero container Start ============================-->
<div class="inner-banner-conatainer d-flex align-items-center">
    <div class="inner-banner-bg d-none d-lg-block" style="background-image: url(<?php echo $bg_image; ?>);"></div>
    <div class="inner-banner-bg d-block d-lg-none" style="background-image: url(<?php echo $bg_image_mob; ?>);"></div>
    <?php if(!empty($heading)): ?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center">
                <h2><?php echo $heading; ?></h2>
            </div>
        </div>
    </div>
	<?php endif; ?>
</div>
<!--============================== Hero container End ==============================-->
<?php 
$normal_heading = get_field('wl_normal_heading');
$bold_heading = get_field('wl_bold_heading');
$wl_text = get_field('wl_text');
if(!empty($wl_text)):
?>
<!--============================== content container Start ==============================-->
<div class="content-container intro-container pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	            <div class="heading">
                <?php if(!empty($normal_heading)) : echo '<h6>'.$normal_heading.'</h6>'; 
                endif;
                if(!empty($bold_heading)) : echo '<h5>'.$bold_heading.'</h5>';
                endif;
                ?> 
	            </div>
            	<?php echo $wl_text; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== content container End ==============================-->
<?php
endif;

$normal_heading = get_field('p_normal_heading');
$bold_heading = get_field('p_bold_heading');

if(have_posts()):

$query = new WP_Query( array( 'post_type'=>'post', 'posts_per_page'=>1 ) );
?>
<!--============================== content container Start ============================-->
<div class="content-container">
  	<div class="container">
	    <div class="row">
	      	<div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	           <div class="heading mb-0">
	                <?php
	                if(!empty($normal_heading)): echo '<h6>'.$normal_heading.'</h6>'; endif;
	                if(!empty($bold_heading)): echo '<h5>'.$bold_heading.'</h5>'; endif;
	                ?> 
	            </div>
	            <?php
			    while($query->have_posts()): $query->the_post();
			    $episode_no = get_field('episode_no');
			    $mediaUrl = powerpress_get_enclosure_data(get_the_ID());
			   	if(!empty($mediaUrl['url'])){
			      	$media = htmlspecialchars($mediaUrl['url']);
			   	}
			    ?>
		        <div class="latest-episode-panel d-md-flex flex-wrap border-top-left-radius overflow-hidden">
		          	<div class="pannel-left">
			            <div class="pl-text-box  d-flex align-items-center justify-content-center">
			              	<h4>latest<span>Episode</span></h4>
			            </div>
		          	</div>
		          	<div class="pannel-right d-flex flex-wrap">
			            <?php if(has_post_thumbnail()) : ?>
                        <div class="pr-img-box border-top-left-radius overflow-hidden">
                            <?php the_post_thumbnail(); ?>
                            <div class="post-media-img">
                                <img src="<?php echo IMG.'mic.png'; ?>" alt="" />
                            </div>
                        </div>
                        <?php endif; ?>
			            <div class="pr-text-box d-flex flex-wrap flex-column">
			              	<?php if(!empty($episode_no)): echo '<div class="pr-desc"><span>Episode '.$episode_no.'</span></div>'; endif; ?>
                            <h5><?php the_title(); ?></h5>
                            <div class="pr-media-box">
                                <?php echo do_shortcode('[powerpress]'); ?>
                            </div>
							<div class="pr-link-box d-flex align-items-center justify-content-between mt-auto">
								<div class="pr-button-group">
									<a href="<?php echo home_url('/subscribe/'); ?>" class="btn btn-primary">Subscribe</a>
									<div class="btn btn-primary"><?php echo do_shortcode('[addtoany]'); ?></div>
								</div>
							</div>
			            </div>
		          </div>
		        </div>
		       	<?php

		       	the_content();

		    	endwhile;

		    	wp_reset_postdata();

		    	?>
	      	</div>
	    </div>
  	</div>
</div>
<!--============================== content container End ==============================-->
<?php $query = new WP_Query( array('post_type'=>'post', 'posts_per_page'=>8, 'offset'=>1) ); ?>
<!--============================== Content Start ==============================-->
<div class="content-container home-post-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	            <div class="home-post-box">
                  	<div class="post-heading">
                      	<em>Past</em>
	                    <h5>Episodes</h5>
                  	</div>
                  	
	                <ul class="post-list d-flex flex-wrap">
	                	<?php
	                	while($query->have_posts()): $query->the_post();
						$mediaDuration = powerpress_get_enclosure_data(get_the_ID());
					    if(!empty($mediaDuration['duration'])){
					      	$duration = htmlspecialchars($mediaDuration['duration']);
					   	}
	                	?>
	                    <li class="post-item">
	                        <a href="<?php the_permalink(); ?>" class="post-box">
	                        	<?php if(has_post_thumbnail()) : ?>
	                            <div class="post-img border-top-left-radius overflow-hidden">
	                               	<?php the_post_thumbnail(); ?>
	                                <div class="post-media-img">
	                                	<img src="<?php echo IMG.'mic.png'; ?>" alt="mic icon" />
	                                </div>
	                            </div>
	                            <?php endif; ?>
	                            <div class="post-content-box">
	                                <h4><?php the_title(); ?></h4>
	                            	<?php if(!empty($duration)): ?>
	                                <div class="post-desc d-flex align-items-center">
	                                    <img src="<?php echo IMG.'clock.svg'; ?>" alt="clock icon" />
	                                    <span><?php echo $duration; ?> min listen</span>
	                                </div>
	                            	<?php endif; ?>
	                            </div>
	                        </a>
	                    </li>
	                    <?php endwhile; wp_reset_postdata(); ?>
	                </ul>
	            	
	            </div>
            </div> 
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php endif; ?>
<?php get_footer(); ?>


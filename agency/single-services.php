<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header(); 
$bg_image = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
?>
<!--============================== Inner Banner Start ==============================-->
<div class="inner-banner" style="background-image: url(<?php echo esc_html($bg_image); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_title(); ?></h2>
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Inner Banner End ==============================-->
<?php 
$cta_heading = get_field('cta_heading');
$cta_text = get_field('cta_text');
$cta_link = get_field('cta_link');
$ID = get_the_ID();
$args = array('post_type'=> 'services','post_status'=>'publish', 'post__not_in' => array($ID),'posts_per_page' => 3,'orderby' => 'rand','order' => 'DESC',);
$post_query = new WP_Query($args);
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container color-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-8">
               	<?php 
               	the_content();
               	if($post_query->have_posts()): 
               	?>
                <ul class="service-list mar-30">
                	<?php 
                	while($post_query->have_posts()) : $post_query->the_post();
                	$icon = get_field('icon');
                	?>
                    <li>
                        <div class="service-box">
                            <div class="icon2"><?php echo html_entity_decode(esc_html($icon)); ?></div>
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_excerpt();?></p>
                        </div>
                    </li>
                	<?php endwhile; ?>
                </ul>
                <?php 
            	endif;
                if(!empty($cta_heading || $cta_text)): 
                ?>
                <div class="sidebar-cta mob-mar-30 text-center">
                    <?php 
                    if(!empty($cta_heading)): echo '<h3>'.$cta_heading.'</h3>'; endif; 
                    if(!empty($cta_text)): echo '<a href="'.$cta_link.'" class="btn btn-primary btn-xs">'.$cta_text.'</a>'; endif;  
                    ?>
                </div>
            	<?php endif; ?>
            </div>
            <?php 
            $args = array('post_type'=> 'services','post_status'=> 'publish',);
			$query = new WP_Query($args);
			if($query->have_posts()):
			?>
            <div class="col-md-4 fix">
                <div class="service-sidebar">
                    <h4 class="color-text">Our Services</h4>
                    <ul class="other-service-list">
                    	<?php 
                    	$slug = get_queried_object()->post_name;
	                    while($query->have_posts()) : $query->the_post();
	                    $permalink = get_the_permalink();
	                    $last_seg = basename($permalink);
	                    $icon = get_field('icon');
	                    ?>
                        <li>
                            <a href="<?php echo esc_html($permalink); ?>" class="<?php if($slug == $last_seg): echo 'active'; endif; ?>">
                                <div class="service-list-icon"><?php echo html_entity_decode(esc_html($icon)); ?></div>
                                <span><?php the_title(); ?></span>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
    
<?php
get_template_part('template-part/stats');  
get_footer(); 
?>
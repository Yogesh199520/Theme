<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Case Study */

get_header();
get_template_part('template-part/inner-banner');
$args = array('post_type'=>'case-studies','post_status'=>'publish','orderby'=>'publish_date','order' =>'ASC',);
$query = new WP_Query($args);
if($query->have_posts()):
?>	
<div class="content-container case-container">
	<?php 
    while($query->have_posts()) : $query->the_post();
    $icon = wp_get_attachment_image(get_field('case_studies_logo'),'social-logo');
    $bg_image = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
    $color = get_field('bg_color');
    ?>
    <a href="<?php the_permalink(); ?>" class="case-box os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s" style="background-image: url(<?php echo esc_html($bg_image); ?>);">
        <div class="case-box-bg" style="background-color: <?php echo esc_html($color); ?>"></div>
        <?php if(!empty($icon)): echo '<div class="case-box-content">'.$icon.'</div>'; endif; ?>
    </a>
    <?php 
    endwhile;
    wp_reset_postdata(); 
    ?>
</div>
<?php
endif;
get_footer();
?>
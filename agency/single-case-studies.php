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
$client = get_field('client');
$location = get_field('location')
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
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-9">
                <ul class="detail-list d-block d-md-none d-md-none">
                    <?php 
                    if(!empty($client)): echo '<li><h5>Client</h5><p>'.$client.'</p></li>'; endif;
                    $terms = get_the_terms($post->ID,'case_studies_category');
                    if(!empty($terms)): 
                    $term = array_shift($terms);
                    echo '<li><h5>Category</h5><p>'.$term->name.'</p></li>'; 
                    endif;
                    if(!empty($location)): echo '<li><h5>Location</h5><p>'.$location.'</p></li>'; endif; 
                    ?>
                </ul>
                <?php 
                the_content();
                if(have_rows('thumbnail_list')):
                while(have_rows('thumbnail_list') ): the_row();
                $thumbnail = wp_get_attachment_image(get_sub_field('thumbnail'),'case-study-single');
                echo '<div class="media-box">'.$thumbnail.'</div>';
                endwhile; 
                endif;
                $prev_post = get_adjacent_post(false, '', true);
                $next_post = get_adjacent_post(false, '', false);
                ?>
                <ul class="bottom-nav">
                    <li><a class="template-nav template-prev" <?php if(!empty($prev_post)): ?>href="<?php echo get_permalink($prev_post->ID); ?>"<?php endif; ?>><i class="fa fa-angle-left"></i> <strong class="hidden-xs">Prev Case</strong></a></li>
                    <li><a href="<?php echo esc_url(home_url('/case-studies/')); ?>"><i class="fas fa-th-large"></i></a></li>
                    <li><a class="" <?php if(!empty($next_post)): ?>href="<?php echo get_permalink($next_post->ID); ?>"<?php endif; ?>><strong class="hidden-xs">Next Case</strong> <i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 d-none d-md-block fix">
                <div class="case-sidebar">
                    <ul class="detail-list">
                        <?php 
                        if(!empty($client)): echo '<li><h5>Client</h5><p>'.$client.'</p></li>'; endif;
                        $terms = get_the_terms($post->ID,'case_studies_category');
                        if(!empty($terms)): 
                        $term = array_shift($terms);
                        echo '<li><h5>Category</h5><p>'.$term->name.'</p></li>'; 
                        endif;
                        if(!empty($location)): echo '<li><h5>Location</h5><p>'.$location.'</p></li>'; endif; 
                        ?>
                    </ul>
                    <div class="sidebar-cta">
                        <h5>Ready to start your next project?</h5>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary btn-xs">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->

<?php get_footer(); ?>
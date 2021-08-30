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
<div class="inner-banner" style="background-image: url(<?php echo esc_html($bg_image); ?>);">
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
                <div class="single-post-content">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <?php  
                    $post_id = get_the_ID();
                    $author_id = get_post_field( 'post_author', $post_id );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    ?>
                    <p>Posted on <strong><?php echo get_the_date('M d, Y'); ?></strong> by <strong><?php echo esc_html($author_name); ?></strong></p>
                    <?php the_content(); ?>
                    <div class="share-post">
                        <h5 class="color-text">Share :</h5>
                        <ul class="share-post-list">
                            <?php echo meks_ess_share(); ?>
                        </ul>
                    </div>
                    <?php 
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false);
                    ?>
                    <ul class="bottom-nav">
                        <li>
                            <a class="template-nav template-prev" <?php if(!empty($prev_post)): ?>href="<?php echo get_permalink($prev_post->ID); ?>"<?php endif; ?>><i class="fa fa-angle-left"></i> <strong class="hidden-xs">Prev Post</strong></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/blog/')); ?>"><i class="fas fa-th-large"></i></a>
                        </li>
                        <li>
                            <a class="template-nav template-next" <?php if(!empty($next_post)): ?>href="<?php echo get_permalink($next_post->ID); ?>"<?php endif; ?>><strong class="hidden-xs">Next Post</strong> <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                    <?php if(comments_open() || get_comments_number()) :comments_template(); endif; ?>
                </div>
            </div>
            <?php get_sidebar('sidebar'); ?>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->

<?php get_footer(); ?>
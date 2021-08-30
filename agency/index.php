<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

get_template_part('template-part/inner-banner');

$post_per_page = get_option( 'posts_per_page' );
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type'=>'post','post_status'=>'publish','paged'=> $paged);
$query = new WP_Query($args);
if($query->have_posts()):
?>
<div class="content-container color-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-9">
                <ul class="post-list blog-post">
                    <?php while($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <div class="post-box">
                            <?php 
                            if(has_post_thumbnail()) :?> 
                            <div class="post-box-img"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a></div>
                            <?php endif;  ?>
                            <div class="post-box-content">
                                <h6><?php echo get_the_date('M d, Y'); ?></h6>
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <a href="<?php the_permalink(); ?>" class="link">Read more</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </ul>
                <div class="pagination-container">
                    <?php ao_wp_pagination($query); ?>
                </div>
            </div>
            <?php get_sidebar('sidebar'); ?>
        </div>
    </div>
</div>
<?php
endif;
get_footer(); 
?>
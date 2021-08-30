<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header();

?>
<div class="inner-banner" style="background-image: url(<?php echo IMG.'inner-banner2.jpg'; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
$tags = get_queried_object_id();
$args = ['post__not_in'=>array( get_queried_object_id()),'orderby'=>'rand','tax_query' => [['taxonomy' => 'post_tag','terms' => $tags]]];
$query = new wp_query($args);
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
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php 
endif;
get_footer(); 
?>
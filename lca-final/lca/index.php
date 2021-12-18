<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

?>
<!--============================== Content Container Start ==============================-->
<div class="content-container blog-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-content-box d-lg-flex flex-wrap">
                    <?php if(have_posts()): ?>
                    <div class="bcb-left">
                        <ul class="blog-list">
                            <?php
                            $count = 1;
                            while(have_posts()): the_post();
                            ?>
                            <li class="blog-item">
                                <a href="<?php the_permalink(); ?>" class="blog-box">
                                    <div class="blog-post-img">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    </div>
                                    <div class="blog-content">
                                        <h6><?php the_title(); ?></h6>
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="blog-post-date">
                                        <strong><?php the_time( 'd' ); ?></strong>
                                        <?php the_time( 'M' ); ?>
                                    </div>
                                </a>
                            </li>
                            <?php if($count == 2){ echo '</ul></div><div class="bcb-right"><ul class="blog-list d-flex flex-wrap">'; } ?>
                            <?php $count++; endwhile; wp_reset_query(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="pagination">
                    <?php echo ao_wp_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$blog_select_testimonial = get_field('blog_select_testimonial',627);
if($blog_select_testimonial):
$client_name = get_field('client_name',$blog_select_testimonial);
$client_testimonial = get_field('client_testimonial',$blog_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($blog_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="testimonial-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-box">
                            <div class="testimonial-content text-center">
                                <?php echo $client_testimonial; ?>
                            </div>
                            <div class="author text-end">- <?php echo $client_name; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonial container End ==============================-->
<?php
endif;
get_footer(); 
?>
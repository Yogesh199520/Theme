<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header();


while(have_posts()): the_post();
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-8">
                <div class="blog-single-container add-bottom-border add-shadow">
                    <div class="bsc-head">
                        <div class="bsc-thumbnail">
                            <div class="date-widget-box">
                                <b><?php the_time( 'd' ); ?></b>
                                <span><?php the_time( 'M' ); ?></span>
                            </div>
                            <?php the_post_thumbnail( '1536x1536' ); ?>
                        </div>
                    </div>
                    <div class="bsc-body">
                       
                        <h1><?php the_title(); ?></h1>
                        <strong>Posted by: <?php the_author(); ?></strong>
                        <div class="v-line"></div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 fix">
                <?php
                $query = new WP_Query(array( 'post_type'=>'post', 'posts_per_page'=>4, 'post__not_in'=>array($post->ID) ));
                if($query->have_posts()):
                ?>
                <div class="latest-blog-box">
                    <div class="latest-blog-head">
                        <h4>Latest blog</h4>
                    </div>
                    <div class="latest-blog-body">
                        <ul class="latest-blog-list">
                            <?php while($query->have_posts()): $query->the_post(); ?>
                            <li class="lb-item">
                                <a href="<?php the_permalink(); ?>" class="lb-box d-flex flex-wrap align-items-center">
                                    <div class="lb-img-box"><?php the_post_thumbnail( 'medium' ); ?></div>
                                    <div class="lb-text-box">
                                        <h5><?php the_title(); ?></h5>
                                        <p>Posted on <?php the_time('dS M'); ?></p>
                                    </div>
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
</div>
<!--============================== Content Container End ==============================-->
<?php 
wp_reset_postdata();
$post_single = get_field('post_single');
if($post_single):
$client_name = get_field('client_name',$post_single);
$client_testimonial = get_field('client_testimonial',$post_single);
if(empty($client_name)):
    $client_name = get_the_title($post_single);
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
endwhile;
get_footer(); 
?>
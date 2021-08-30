<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  	exit; // Exit if accessed directly
}
get_header();

$term = get_queried_object();
$slug =  $term->slug;
$categories = get_the_category();
$catid = $categories[0]->cat_ID;
?>
<!--============================== Content Start ==============================-->
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12">
                <div class="cb-box d-lg-flex flex-wrap">
                    <?php get_sidebar(); ?>
                    <div class="cb-right">
                        <?php if(have_posts()): ?>
                        <ul class="post-list d-flex flex-wrap">
                            <?php
                            while(have_posts()): the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            $year = get_field('year');
                            $country = get_field('country');
                            $state = get_field('state');
                            $school = get_field('school');
                            $experience = get_field('experience');
                            ?>
                            <li class="post-item">
                                <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                                    <div class="post-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc">
                                            <?php 
                                            if(!empty($year)): echo '<span><strong>Year -</strong>'.$year.'</span>'; endif;
                                            if(!empty($country)): echo '<span><strong>Country -</strong>'.$country.'</span>'; endif;
                                            ?> 
                                        </div>
                                        <?php if(!empty($school)): echo '<p><strong>School: </strong>'.$school.'</p>'; endif; ?>
                                        <?php 
                                        if($catid ==3){ ?>
                                            <a href="<?php the_permalink(); ?>" class="btn-hover color-2">View Experience</a>
                                        <?php }
                                        else { ?>
                                            <a href="<?php the_permalink(); ?>" class="btn-hover color-2">Read More</a>
                                        <?php }?>
                                       
                                    </div>
                                </div>
                            </li>
                            <?php 
                            wp_reset_postdata();
                            endwhile; 
                            ?>
                        </ul>
                        <?php
                        if(ao_wp_pagination()){
                            echo '<div class="pagination-container">';
                            echo ao_wp_pagination();
                            echo '</div>';
                        }
                        ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
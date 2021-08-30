<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Reunion */
get_header();

$heading = get_field('job_heading');
$body_text = get_field('job_body_text');
?>
<!--============================== Content Start ==============================-->
<div class="content-container gradient-bg white-text simple-banner-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <?php 
                if(!empty($heading)): echo '<h4 class="text-center">'.$heading.'</h4>'; endif;
                echo $body_text; 
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type' =>'reunion','paged' => $paged,);
$query = new WP_Query($args);
if($query->have_posts()):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list d-flex flex-wrap">
                    <?php
                    $counter = null;
                    $index = 1; 
                    while($query->have_posts()): $query->the_post();
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $counter; ?>s">
                        <div class="ns-box">
                            <?php if(has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" class="ns-img">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <?php endif; ?>
                            <div class="ns-content-box">
                                <h4 class="gradient-text"><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn-hover color-1">Know more</a>
                            </div>
                        </div>
                    </li>
                    <?php
                    if($index % 3 ==0){
                        unset($counter);
                    }
                    $index++;
                    $counter = $counter+2;
                    endwhile; 
                    ?>
                </ul>
                <div class="pagination-container text-right">
                   <?php echo ao_wp_pagination($paged,$query->max_num_pages); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>
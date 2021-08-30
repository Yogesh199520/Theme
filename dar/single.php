<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

$year = get_field('year');
$country = get_field('country');
$state = get_field('state');
$school = get_field('school');
$featured_img = get_the_post_thumbnail_url(get_the_ID(),'large');
$category = get_the_category($post->ID);
$slug = $category[0]->slug;
?>
<!--============================== Content Start ==============================-->
<div class="content-container content-block-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12">
                <div class="cb-box d-lg-flex flex-wrap">
                    <?php get_sidebar();?>
                    <div class="cb-right">
                        <div class="cb-content-box">
                            <div class="cbc-box d-flex flex-wrap">
                                <div class="cbc-img-box">
                                    <div class="cbc-bg" style="background-image: url(<?php echo $featured_img; ?>);"></div>
                                </div>
                                <div class="cbc-text-box">
                                    <h5><?php the_title(); ?></h5>
                                    <?php
                                    if(!empty($year)): echo '<p><strong>Year</strong>- '.$year.'</p>'; endif;
                                    if(!empty($country)): echo '<p><strong>Country</strong>-'.$country.'</p>'; endif;
                                    if(!empty($state)): echo '<p><strong>State</strong>-'.$state.'</p>'; endif; 
                                    if(!empty($school)): echo '<p><strong>School</strong>-'.$school.'</p>'; endif;
                                    ?>
                                </div>
                            </div>
                            <?php if(!empty($year) || !empty($country) || !empty($state) || !empty($school)): ?>
                            <h6>Experience:</h6>
                            <?php endif; ?>
                            <?php the_content(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
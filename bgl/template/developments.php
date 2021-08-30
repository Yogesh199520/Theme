<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Developments */
get_header();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$query = new WP_Query(array( 'post_type'=>'development', 'posts_per_page'=>4, 'paged'=>$paged));
$max_page = $query->max_num_pages;
if($query->have_posts()):
while($query->have_posts()): $query->the_post();
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>
<!--============================== Content Start ==============================-->
<a href="<?php the_permalink(); ?>" class="development-box d-flex flex-column">
    <div class="development-box-img" style="background-image: url(<?php echo $featured_img_url; ?>);"></div>
    <div class="development-box-content d-flex flex-column justify-content-center align-items-center">
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
        <span class="btn btn-default">LEARN MORE</span>
    </div>
    <div class="development-box-overlay"></div>
</a>
<!--============================== Content End ==============================-->
<?php 
endwhile;
wp_reset_postdata(); 
endif;
if(ao_wp_pagination($paged, $max_page)): 
?>
<div class="content-container mid-pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo ao_wp_pagination($paged, $max_page); ?>
            </div>
        </div>
    </div>
</div>
<?php 
endif;

get_footer();
?>
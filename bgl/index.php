<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
get_header();

$category = get_queried_object();
$cat_dropdown = wp_dropdown_categories(array('show_option_none'=>'All News','class'=>'','value_field'=>'slug','selected'=>$category->slug, 'echo'=>false));

if(have_posts()):
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="filter-box">
                    <?php echo $cat_dropdown; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php endif; ?>
<!--============================== Content Start ==============================-->
<div class="content-container blog-post-container <?php if(!ao_wp_pagination() && is_category()){ echo 'pt-0'; }else{ echo 'p-0'; } ?>">
    <div class="container-fluid">
        <div class="row">
            <?php if(have_posts()): ?>
            <ul class="blog-post-list d-flex flex-wrap">
            	<?php while(have_posts()): the_post(); ?>
                <li class="blog-post-item">
                    <a href="<?php the_permalink(); ?>" class="blog-post-box d-flex">
                    	<?php if(has_post_thumbnail()){ ?> 
                        <div class="blog-post-img">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </div>
                    	<?php } ?>
                        <div class="blog-post-caption">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <span class="blog-post-btn">READ MORE</span>
                        <div class="blog-post-overlay"></div>
                    </a>
                </li>
               	<?php 
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
            <?php else: ?>
                <h3>Coming Soon</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php if(ao_wp_pagination()): ?>
<div class="content-container mid-pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo ao_wp_pagination(); ?>
            </div>
        </div>
    </div>
</div>
<?php 
endif;

get_footer();
?>
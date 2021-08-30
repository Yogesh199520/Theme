<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
get_header(); ?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="post-meta-detail d-flex flex-wrap">
                	<?php 
                	$category_list = get_the_category($post->ID);
                	if(!empty($category_list)):
                	?>
                    <div class="post-meta-left">
                        <div class="post-meta-category">
                            <?php 
                            foreach($category_list as $cat_item):
                            	$cat_link = get_category_link($cat_item->cat_ID);
                            	echo '<span><a href="'.$cat_link.'">'.$cat_item->cat_name.'</a></span>';
                        	endforeach;
                        	?>
                        </div>
                    </div>
                	<?php endif; ?>
                    <div class="post-meta-right">
                        <span class="post-meta-time"><?php echo ao_post_read_time(); ?></span>
                        <span class="post-meta-date"><?php echo get_the_date('d/m/Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-post-body">
                    <?php while(have_posts()): the_post(); the_post_thumbnail('full'); the_content(); endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$disabled = get_post_meta( $post->ID, 'sharing_disabled', true );
if(!$disabled){
?>
<div class="content-container p-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 d-flex justify-content-center">
                <div class="single-post-share">
                    <p>Share this</p>
                    <?php echo do_shortcode('[addtoany]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}

$prv_post = get_previous_post(); $next_post = get_next_post();
if($prv_post || $next_post):
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="post-nav d-flex flex-wrap justify-content-center flex-column flex-md-row">
                    <a <?php if($next_post): echo 'href="'.get_permalink($next_post->ID).'"'; endif; ?> class="btn btn-primary2">Previous Article</a>
                    <a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-primary">Back to News</a>
                    <a <?php if($prv_post): echo 'href="'.get_permalink($prv_post->ID).'"'; endif; ?> class="btn btn-primary2">Next Article</a>
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
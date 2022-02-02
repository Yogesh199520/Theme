<?php
/*==============================*/
// @package TruFab
// @author Think EQ
/*==============================*/
get_header(); while(have_posts()): the_post(); ?>
<style>
.uwp_widget_author_box { display: none !important; }
</style>
<?php /*============================== Content Start ==============================*/ ?>
<div class="content-container news-single-container bg-white">
    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="news-single-content">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="media-box mb-3">
                        <?php the_post_thumbnail('medium_large'); ?>
                    </div>
                    <div class="news-post-date mb-3 d-none d-lg-block">Published - <strong><?php the_time('d/m/Y'); ?></strong></div>
                    <?php the_content(); ?>
                </div>
                <?php $prv_post = get_previous_post(); $next_post = get_next_post();
                if($prv_post || $next_post): ?>
                <div class="post-nav mb-3">
                    <div class="row mt-auto">
                        <div class="col-md-4"><a <?php if($next_post): echo 'href="'.get_permalink($next_post->ID).'"'; endif; ?> class="btn btn-primary btn-block">Previous</a></div>
                        <div class="col-md-4"><a href="<?php echo get_post_type_archive_link('post'); ?>" class="btn btn-primary btn-block">All News</a></div>
                        <div class="col-md-4"><a <?php if($prv_post): echo 'href="'.get_permalink($prv_post->ID).'"'; endif; ?> class="btn btn-primary btn-block">Next</a></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /*============================== Content End ==============================*/ ?>
<?php endwhile; get_footer(); ?>
<?php
$category = get_queried_object();
$pid = get_option('page_for_posts');

if(have_posts()):

?>
<!--============================== News Start ============================-->  
<div class="content-container blog-post-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="filter-box">
                    <?php wp_dropdown_categories(array('show_option_none'=>'All posts','class'=>'','value_field'=>'slug','selected'=>$category->slug)); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="blog-post-list d-flex flex-wrap">
                    <?php while(have_posts()): the_post(); ?>
                    <li class="blog-post-item">
                        <div class="blog-post-box d-flex">
                            <div class="blog-post-date"><h6><?php the_time('d M Y'); ?></h6></div>
                            <div class="blog-post-img">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div class="blog-post-details">
                                <h3><?php the_title(); ?></h3>
                                <div class="blog-post-author">By <?php the_author(); ?></div>
                                <p><?php the_excerpt(); ?></p>
                                <div class="blog-post-cta"><a href="<?php the_permalink(); ?>" class="btn btn-primary3 btn-sm">READ MORE</a></div>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php echo ao_wp_pagination(); ?>
            </div>
        </div>

    </div>
</div>
<!--============================== News End ==============================-->
<?php
endif;
?>
<?php
$obj = get_queried_object();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = new WP_Query( array( 'post_type'=>'our_works', 'posts_per_page'=>1, 'paged'=>$paged ) );

if($query->have_posts()):

?>
<!--============================== 19-our-work Start ============================-->
<div class="content-container our-work-grid-container">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="filter-box">
                    <?php wp_dropdown_categories(array('show_option_none'=>'All posts','class'=>'','value_field'=>'slug','selected'=>$obj->slug, 'taxonomy'=>'our_works_categories', 'id'=>'work_cat' )); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 p-0">
                <ul class="owg-list d-flex flex-wrap">
                    <?php while($query->have_posts()): $query->the_post(); ?>
                    <li class="owg-item">
                        <a href="<?php the_permalink(); ?>" class="owg-box">
                            <div class="owg-img">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </div>
                            <div class="owg-content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                                <span class="btn btn-default">LEARN MORE</span>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo ao_wp_pagination( $paged, $query->max_num_pages ); ?>
            </div>
        </div>
    </div>
</div>
<!--==============================  19-our-work End ==============================-->
<?php
endif;
wp_reset_query();
?>
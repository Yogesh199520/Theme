<?php
$padding_option = get_sub_field('padding_option');  
$title = get_sub_field('title');
$query = new WP_Query(array('post_type'=>'post','posts_per_page'=>3 ));
if($query->have_posts()):
?>
<div class="content-container latest-insights-post-container light-purple-bg <?php echo implode(' ', $padding_option); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(!empty($title)): echo '<div class="heading text-lg-center"><h2>'.$title.'</h2></div>'; endif; ?> 
                <ul class="latest-insights-post-list">
                    <?php 
                    while($query->have_posts()): $query->the_post(); 
                    ?>
                    <li class="latest-insights-post-item">
                        <a href="<?php the_permalink(); ?>" class="latest-insights-post-box">  
                            <div class="latest-insights-post-img">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="latest-insights-post-content d-flex flex-column"> 
                                 <h5 class="latest-insights-post-category"><?php the_title(); ?></h5>
                                 <?php the_excerpt();?>
                                 <div class="latest-insights-post-bottom d-flex justify-content-between">  
                                      <div class="latest-insights-post-date"><?php echo get_the_date('M d, Y'); ?></div>
                                      <span class="read-more-btn">READ MORE <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt="arrow-right"></span>
                                 </div>
                            </div>
                        </a>
                    </li>
                    <?php 
                    endwhile; 
                    ?>
                </ul>
                <div class="view-all-insights text-center"> 
                    <a href="<?php echo site_url('/blog/'); ?>" class="btn btn-default btn-lg">VIEW ALL INSIGHTS</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
wp_reset_query();
?>
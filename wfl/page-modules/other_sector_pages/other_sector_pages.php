<?php
$query = new WP_Query(array('post_type'=>'sector','posts_per_page'=>-1,'post__not_in' => array(get_the_ID())));
if($query->have_posts()):
?>
<div class="content-container other-sector-container light-gray-bg">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1">
                <div class="heading text-center text-md-left">
                    <h3>Our other sectors</h3>
                </div>
                <div class="other-sector-slider-content">
                    <ul class="oss-list es-slider p-0 full-height">
                        <?php 
                        while($query->have_posts()): $query->the_post(); 
                        ?>
                        <li class="oss-item">
                            <a href="<?php the_permalink(); ?>" class="oss-box read-more-btn-parent light-purple-bg">
                                <div class="oss-content d-flex flex-column">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_excerpt(); ?>
                                    <div class="oss-cta mt-auto">
                                        <span class="read-more-btn black-color">READ MORE  <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt="arrow-right"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php 
                        endwhile; 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
wp_reset_query();
?>
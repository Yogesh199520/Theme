<?php
$query = new WP_Query(array('post_type'=>'sector','posts_per_page'=>-1));
if($query->have_posts()):
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                 <div class="sectors-signpost-content">
                    <?php 
                    while($query->have_posts()): $query->the_post(); 
                    ?>
                    <a href="<?php the_permalink(); ?>" class="sectors-signpost-box d-flex read-more-btn-parent">
                        <div class="sectors-signpost-left">
                            <h3><?php the_title(); ?></h3>
                        </div>
                        <div class="sectors-signpost-mid">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="sectors-signpost-right">
                            <span class="read-more-btn black-color">read more <img src="<?php echo IMG.'arrow-right.svg'; ?>" alt="arrow-right"></span>
                        </div>
                    </a>
                    <?php 
                    endwhile; 
                    ?>
                 </div>
            </div>
        </div>
    </div>
</div> 
<?php 
endif;
wp_reset_query();
?>
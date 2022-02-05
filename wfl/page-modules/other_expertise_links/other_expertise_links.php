<?php
$query = new WP_Query(array('post_type'=>'expertise','posts_per_page'=>-1,'post__not_in' => array(get_the_ID())));
if($query->have_posts()):
?>
<div class="content-container light-gray-bg other-expertise-container">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 offset-xl-1 col-lg-4 offset-lg-0">
                <div class="heading">
                 <h3>Other Employment & HR Law expertise</h3>
             </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-7 offset-lg-1">
                 <ul class="other-expertise-list d-flex flex-column">
                    <?php 
                    while($query->have_posts()): $query->the_post(); 
                    ?>
                    <li><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></li>
                    <?php 
                    endwhile; 
                    ?>
                 </ul>
            </div>
        </div>
    </div>
</div> 
<?php 
endif;
wp_reset_query();
?>

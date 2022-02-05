<?php
$obj = get_queried_object();

if (is_a($obj, 'WP_Term')) {
    $cat_query = array('tax_query'=>array(array( 'taxonomy'=>'team_categories', 'field'=>'slug', 'terms'=>$obj->slug)));
}else{
    $cat_query = array();
}

$query = new WP_Query( array_merge( array( 'post_type'=>'team', 'posts_per_page'=>-1 ), $cat_query ) );
if($query->have_posts()):
?>
<div class="content-container team-member-container">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <ul class="team-member-list d-flex flex-wrap">
                    <?php 
                    while($query->have_posts()): $query->the_post(); 
                    $photo = wp_get_attachment_image(get_field('photo'),'medium');
                    $name = get_field('name');
                    if(empty($name)): 
                        $name = get_the_title(); 
                    endif;
                    $job_title = get_field('job_title');
                    ?>
                    <li class="team-membet-item">
                        <a href="<?php the_permalink(); ?>" class="team-member-box">
                            <?php if(!empty($photo)): echo '<div class="team-member-img">'.$photo.'</div>'; endif; ?>
                            <div class="team-member-content">
                                <h4><?php echo $name;; ?></h4>
                                <?php if(!empty($job_title)): echo '<h6>'.$job_title.'</h6>'; endif; ?>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
endif;
wp_reset_query();
?>
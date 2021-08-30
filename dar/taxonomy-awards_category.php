<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

?>
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1 class="text-uppercase"><?php single_cat_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php
$description = category_description();
if(!empty($description)): 
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <?php echo $description; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Start ==============================-->
<?php 
endif;
$term = get_queried_object();
$slug =  $term->slug;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type'=>'alumni_awards', 'posts_per_page'=> -1, 'paged'=>$paged,'tax_query'=>array(array('taxonomy'=>'awards_category','field'=>'slug','terms'=> $slug))
);
$query = new WP_Query($args);
if($query->have_posts()):
?>
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-grid-list d-flex flex-wrap">
                    <?php 
                    $count = null;
                    while($query->have_posts()): $query->the_post();
                    $award_post_image = wp_get_attachment_image(get_field('award_post_image'),'medium_large');
                    $name = get_the_title();
                    $awarded_for = get_field('awarded_for');
                    $awarded_year = get_field('awarded_year');
                    $awarded_in = get_field('awarded_in');
                    $index = get_row_index();
                    ?>
                    <li class="new-grid-item os-animation animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $count; ?>s" style="animation-delay: 0.3s;">
                        <a href="<?php the_permalink(); ?>" class="new-grid-box add-border">
                            <?php if(!empty($award_post_image)): echo '<div class="new-grid-img">'.$award_post_image.'</div>'; endif; ?>
                            <div class="new-grid-content-box">
                                <h4><?php echo $name; ?></h4>
                                <?php 
                                if(!empty($awarded_for)): echo '<p>'.$awarded_for.'</p>'; endif; 
                                if(!empty($awarded_year)): echo '<p>'.$awarded_year.'</p>'; endif; 
                                if(!empty($awarded_in)): echo '<p>'.$awarded_in.'</p>'; endif; 
                                ?>
                            </div>
                        </a>
                    </li>
                    <?php
                     if($index % 3 ==0){
                        unset($count);
                    }
                    $count = $count+2;
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
                <?php
                if(ao_wp_pagination($paged,$query->max_num_pages)){
                    echo '<div class="pagination-container text-right">';
                        echo ao_wp_pagination($paged,$query->max_num_pages);
                    echo '</div>';
                }
              ?>
            </div>
        </div>
    </div>
</div>
<?php 
else:
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">No posts founds</p>
            </div>
        </div>
    </div>
</div>
<?php
endif;
get_footer(); 
?>
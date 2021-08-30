<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
get_header();

$term = get_queried_object();
$slug =  $term->slug;
$name =  $term->name;
$args = array(
    'post_type' => 'patient-stories',
    'posts_per_page' => 4,
    'orderby'   => 'title',
    'order' => 'ASC',
    'tax_query' => array(
    array(
    'taxonomy' => 'patient_category',
    'field' => 'slug',
    'terms' => $slug
    ))
);
$query = new WP_Query($args);
if(!empty($query)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="heading-2 text-blue">
                    <?php if(!empty($name)): echo '<h1>'.$name.'</h1>'; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container p-0">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <ul class="sub-nav-list d-flex flex-row justify-content-center">
                    <li class="sub-nav-item">
                        <a href="<?php echo site_url('patient-story');?>" class="sub-nav-link">All</a>
                    </li>
                    <?php
                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                    $parent_categories = get_terms('patient_category',$parent_cat_arg);
                    foreach($parent_categories as $category): 

                    ?>
                    <li class="sub-nav-item <?php if($slug == $category->slug): echo 'active'; endif; ?>">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="sub-nav-link"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="select-nav-list">
                    <select class="sub-nav-mobile mobile-cat form-control">
                        <option value="<?php echo site_url('patient-story');?>">All</option>
                        <?php
	                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
	                    $parent_categories = get_terms('patient_category',$parent_cat_arg);
	                    foreach($parent_categories as $category): 
	                    ?>
                        <option value="<?php echo get_category_link($category->term_id); ?>" <?php if($slug == $category->slug): echo 'selected'; endif; ?>><?php echo $category->name; ?></option>
                    	<?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-10 offset-lg-1">
                <ul class="patient-list patient-single">
                    <?php 
                    while($query->have_posts()): $query->the_post();
                    ?>

                    <li class="patient-item">
                        <div class="patient-box d-flex flex-column flex-md-row">
                            <div class="patient-content-inner">
                                <h6>Name : <?php the_title(); ?></h6>
                                <?php if(!empty($term)) : echo ' <h6>Case : '.$name.' </h6>'; endif; ?>
                               
                                <p><?php echo the_excerpt();?></p>
                                <a href="<?php echo the_permalink(); ?>" class="btn btn-blue-border">Know more</a>
                            </div>
                            <?php if(has_post_thumbnail()): ?>
                            <div class="patient-img">
                                <?php echo the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->

<!--============================== Content end ==============================-->
<?php
endif;
get_footer(); 
?>
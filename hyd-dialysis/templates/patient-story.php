<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Patient Story */
get_header();

$patient_bold_heading = get_field('patient_bold_heading');
$patient_normal_heading = get_field('patient_normal_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="heading-2 text-blue">
                    <?php 
                    if(!empty($patient_bold_heading)): echo '<h1>'.$patient_bold_heading.'</h1>'; endif;
                    if(!empty($patient_normal_heading)): echo '<h5>'.$patient_normal_heading.'</h5>'; endif;
                    ?>
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
                    <li class="sub-nav-item <?php if(!$slug): echo 'active'; endif; ?>">
                        <a href="javascript:void(0)" class="sub-nav-link">All</a>
                    </li>
                    <?php
                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                    $parent_categories = get_terms('patient_category',$parent_cat_arg);
                    foreach($parent_categories as $category): 
                    ?>
                    <li class="sub-nav-item <?php if($slug): echo 'active'; endif; ?>">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="sub-nav-link"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="select-nav-list">
                    <select class="sub-nav-mobile mobile-cat form-control">
                        <option value="<?php echo site_url('patient-story'); ?>">All</option>
                        <?php
                        $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                        $parent_categories = get_terms('patient_category',$parent_cat_arg);
                        foreach($parent_categories as $category):
                        $cat_slug = $category->Slug;
                        ?>
                        <option value="<?php echo get_category_link($category->term_id); ?>" <?php if($slug == $cat_slug): echo 'selected'; endif; ?>><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
if(post_type_exists('patient-stories')): 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$patient_args = array (
    'post_type'  => 'patient-stories',
    'paged' => $paged,
);
$patient = new WP_Query($patient_args);  
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-10 offset-lg-1">
                <ul class="patient-list patient-single">
                    <?php 
                    while($patient->have_posts()): $patient->the_post();
                    $terms = get_the_terms($post->ID, 'patient_category');
                    $term = array_shift($terms);
                    ?>

                    <li class="patient-item">
                        <a href="<?php the_permalink(); ?>" class="patient-box d-flex flex-column flex-md-row">
                            <div class="patient-content-inner">
                                <h6>Name : <?php the_title(); ?></h6>
                                <?php if(!empty($term)) : echo ' <h6>Case : '.$term->name.' </h6>'; endif; ?>
                                <p><?php the_excerpt();?></p>
                                <span class="btn btn-blue-border">Know more</span>
                            </div>
                            <?php if(has_post_thumbnail()): ?>
                            <div class="patient-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
               <?php
                $total_pages = $patient->max_num_pages;
                if($total_pages > 1): ?>
                <div class="patients-pagination">
                <?php
                    $current_page = max(1, get_query_var('paged'));
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => 'page/%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
                        'next_text'    => __('<i class="fa fa-angle-right"></i>'),
                        'type'       => 'list'
                    ));
                ?>
                </div>
                <?php 
                endif; 
                ?>  
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
endif;
get_footer();
?>
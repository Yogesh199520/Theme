<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

$term = get_queried_object();
$slug =  $term->slug;
$pid = get_option('page_for_posts');
$bold_heading = get_field('publications_bold_heading',$pid);
$normal_heading = get_field('publications_normal_heading',$pid);
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <div class="heading-2 text-moon-yellow">
                    <?php 
                    if(!empty($bold_heading)): echo '<h1>'.$bold_heading.'</h1>'; endif; 
                    if(!empty($normal_heading)): echo '<h5>'.$normal_heading.'</h5>'; endif; 
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
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <ul class="sub-nav-list d-flex flex-row justify-content-center hover-moon-yellow">
                     <li class="sub-nav-item <?php if(!$slug): echo 'active'; endif; ?>">
                        <a href="<?php echo site_url('publications');?>" class="sub-nav-link">All</a>
                    </li>
                    <?php
                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                    $parent_categories = get_terms('category',$parent_cat_arg);
                    foreach($parent_categories as $category):
                    $cat = $category->slug;
                    ?>
                    <li class="sub-nav-item <?php if($slug == $cat): echo 'active'; endif; ?>">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="sub-nav-link"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                    
                </ul>
                <div class="select-nav-list">
                    <select class="sub-nav-mobile mobile-cat form-control">
                        <option value="<?php echo site_url('publications');?>">All</option>
                        <?php
                        $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                        $parent_categories = get_terms('category',$parent_cat_arg);
                        foreach($parent_categories as $category):
                        $cat = $category->slug;
                        ?>
                        <option value="<?php echo get_category_link($category->term_id); ?>" <?php if($slug == $cat): echo 'selected'; endif; ?>><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
if(have_posts()):
$pmid = get_field('pmid');
$pmcid = get_field('pmcid');
$doi = get_field('doi');
$author = get_field('author');
$link = get_field('link');
$publications_text = get_field('publications_text');
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-10 offset-lg-1">
                <ul class="publications-list">
                    <?php while(have_posts()): the_post(); ?>
                    <li class="publications-item">
                        <div class="publications-box d-flex flex-row">
                            <div class="publications-content-inner">
                                <h6><?php the_title(); ?></h6>
                                <?php if(!empty($publications_text)): echo $publications_text; endif; ?>
                                <ul class="publications-list">
                                    <?php 
                                    if(!empty($pmid)): echo '<li>PMID: '.$pmid.'</li>'; endif; 
                                    if(!empty($pmcid)): echo '<li>PMCID: '.$pmcid.'</li>'; endif;
                                    if(!empty($doi)): echo '<li>DOI: '.$doi.'</li>'; endif;
                                    ?>
                                    <?php if(!empty($author)):?>
                                    <li class="auther">
                                        <span>Authors :</span>
                                        <p><?php echo $author; ?></p>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <?php if(!empty($link)): echo ' <a href="'.$link.'" class="btn btn-blue-border" target="_blank">Full Article</a>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile; 
                    ?>
                </ul>
                <?php
                if(ao_wp_pagination()){
                echo '<div class="pagintion">';
                echo ao_wp_pagination();
                echo '</div>';
                }
                ?>  
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php 
else:
    echo '<div class="content-container pt-0"><p class="text-center">Sorry, but no post in this category.</p></div>';
endif;
get_footer();
?>
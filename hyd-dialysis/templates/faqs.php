<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: FAQ's */
get_header();

$normal_heading = get_field('faqs_normal_heading');
$bold_heading = get_field('faqs_bold_heading');
$query = $_GET['query'];
?>
<!--============================== Content Start ==============================-->
<div class="content-container pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-12">
                <div class="heading-2 text-blue">
                    <?php 
                    if(!empty($normal_heading)): echo '<h1>'.$normal_heading.'</h1>'; endif;
                    if(!empty($bold_heading)): echo '<h5>'.$bold_heading.'</h5>'; endif;
                    ?>
                </div>
                <ul class="sub-nav-list d-flex flex-row justify-content-center">
                    <li class="sub-nav-item active">
                        <a href="<?php echo site_url('faqs'); ?>" class="sub-nav-link">All</a>
                    </li>
                    <?php
                    $parent_cat_arg = array('hide_empty' => false, 'parent' =>0);
                    $parent_categories = get_terms('faqs-category',$parent_cat_arg);
                    foreach($parent_categories as $category): 
                    ?>
                    <li class="sub-nav-item">
                        <a href="<?php echo get_category_link($category->term_id); ?>" class="sub-nav-link"><?php echo $category->name; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="search-content">
                	<form action="" method="get">
	                    <div class="search-box">
	                        <input type="text" name="query" <?php if(empty($query)): echo 'placeholder="Search"'; endif; ?> <?php if(!empty($query)): echo 'value="'.$query.'"'; endif; ?> />
	                        <input type="submit" value="" />
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$show_post = get_option('posts_per_page'); 
if($query):
$faqs_args = array (
	'post_type'  => 'faqs',
	'posts_per_page' =>$show_post,
    'paged' => $paged,
	's' =>$query
);
else:
$faqs_args = array (
	'post_type'  => 'faqs',
    'paged' => $paged,
	'posts_per_page' =>$show_post,
);
endif;
$faqs = new WP_Query($faqs_args);
if($faqs->have_posts()): 
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-10 offset-lg-1">
                <div class="accordion" id="accordionExample">
                    <div class="panel-group faqs-list" id="accordion" role="tablist" aria-multiselectable="true">
                	<?php
                	$index = 0;
                	while($faqs->have_posts()): $faqs->the_post();
                	?>
                    <div class="panel panel-default <?php if($index==0): echo 'active'; endif; ?>">
                        <div class="panel-heading" role="tab" id="heading<?php echo $index; ?>">
                            <h6 class="panel-title d-flex align-items-center" role="button" data-toggle="collapse" href="#collapse<?php echo $index; ?>" aria-expanded="true" aria-controls="collapse<?php echo $index; ?>">
                                <?php the_title();?>
                            </h6>
                        </div>
                        <div id="collapse<?php echo $index; ?>" class="panel-collapse collapse <?php if($index==0): echo 'show'; endif; ?>" role="tabpanel" aria-labelledby="heading<?php echo $index; ?>" data-parent="#accordion">
                            <div class="panel-body">
                                <div class="faqs-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $index++;
                    wp_reset_postdata(); 
                	endwhile;
					?>
                    </div>
                    <?php
                    $total_pages = $faqs->max_num_pages;
                    if($total_pages > 1): ?>
                    <div id="pagination">
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
</div>
<?php 
else:
    echo '<div class="content-container pt-0"><p class="text-center">Sorry, but nothing matched your search terms. Please try again with some different keywords.</p></div>';
endif;
get_footer();
?>
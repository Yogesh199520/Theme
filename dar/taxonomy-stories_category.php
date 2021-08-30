<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

$term = get_queried_object();
$children = get_terms($term->taxonomy, array('parent'=>$term->term_id,'hide_empty' => false));
if(!empty($children)):
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
?>
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list two-coulmn d-flex flex-wrap">
                    <?php
                    $count = null;
                    foreach($children as $subcat):
                    $image = wp_get_attachment_image(get_field('image',$term),'large'); 
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $count; ?>s">
                        <div class="ns-box">
                           <?php if(!empty($image)): echo '<a href="'.esc_url(get_term_link($subcat, $subcat->taxonomy)).'" class="ns-img">'.$image.'</a>'; endif; ?>
                            <div class="ns-content-box">
                                <h4 class="gradient-text text-uppercase"><?php echo $subcat->name; ?></h4>
                                <a href="<?php echo esc_url(get_term_link($subcat, $subcat->taxonomy)); ?>" class="btn-hover color-1">Know more</a>
                            </div>
                        </div>
                    </li>
                    <?php
                    $count = $count+2;
                    endforeach; 
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
else:
$term = get_queried_object();
$slug =  $term->slug;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type'=>'alumni_stories', 'posts_per_page'=> -1, 'paged'=>$paged,'tax_query'=>array(array('taxonomy'=>'stories_category','field'=>'slug','terms'=> $slug))
);
$query = new WP_Query($args);
if($query->have_posts()):
?>
<div class="content-container less-pad giving-banner-container pb-0 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="giving-banner text-center gradient-bg">
                    <h1 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s"><?php single_cat_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content start ==============================-->
<div class="content-container intro-block-container gray-bg less-pad">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="intro-block-content">
                    <?php 
                    while($query->have_posts()): $query->the_post();
                    $image = wp_get_attachment_image(get_field('image'),'medium');
                    $name = get_the_title();
                    $year = get_field('year');
                    $country = get_field('country');
                    $state = get_field('state');
                    $town = get_field('town');
                    $village = get_field('village');
                    $collage = get_field('collage');
                    $expreince = get_field('expreince');
                    ?>
                    <a href="<?php the_permalink(); ?>" class="intro-block-box">
                        <div class="intro-block-upper">
                            <?php if(!empty($image)): echo '<div class="intro-block-img os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">'.$image.'</div>'; endif; ?>
                            <div class="intro-block-details os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.32s">
                                <?php if(!empty($name)): echo '<h6>'.$name.'</h6>'; endif; ?>
                                <ul class="introdetail-list">
                                    <?php  
                                    if(!empty($year)): echo '<li><p><strong>Year -</strong> '.$year.'</p></li>'; endif;
                                    if(!empty($country || $state)):
                                    ?>
                                    <li>
                                        <?php 
                                        if(!empty($country)): echo ' <p><strong>Country -</strong> '.$country.'</p>'; endif; 
                                        if(!empty($state)): echo '<p><strong>state -</strong> '.$state.'</p>'; endif; 
                                        ?>
                                    </li>
                                    <?php 
                                    endif;
                                    if(!empty($town || $village)):
                                    ?>
                                    <li>
                                        <?php 
                                        if(!empty($town)): echo ' <p><strong>Town -</strong> '.$town.'</p>'; endif; 
                                        if(!empty($village)): echo '<p><strong>Village -</strong> '.$village.'</p>'; endif; 
                                        ?>
                                    </li>
                                    <?php 
                                    endif;
                                    if(!empty($collage)): echo '<li><p><strong>Collage -</strong> '.$collage.'</p></li>'; endif; 
                                    ?>
                                    
                                </ul>
                            </div>
                        </div>
                        <?php if(!empty($expreince)): ?>
                        <div class="intro-block-lower os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.34s">
                            <h6>Experience</h6>
                            <?php echo $expreince; ?>
                        </div>
                        <?php endif; ?>
                    </a>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </div>
            </div>
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
<?php 
else:
?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <p class="text-center">No posts founds</p>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
endif;
get_footer(); 
?>
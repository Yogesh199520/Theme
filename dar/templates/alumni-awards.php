<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Alumni Awards */
get_header(); ?>

<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1 class="text-uppercase"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php 
$terms = get_terms('awards_category', array('hide_empty'=>false, 'parent' => 0));
if(!empty($terms)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list two-coulmn d-flex flex-wrap">
                	<?php
                    $count = null; 
                    foreach($terms as $term):
                    $image = wp_get_attachment_image(get_field('award_image',$term),'large'); 
                    $description = $term->description;
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $counter; ?>s">
                        <div class="ns-box">
                             <?php if(!empty($image)): echo '<a href="'.get_category_link($term->term_id).'" class="ns-img">'.$image.'</a>'; endif; ?>
                            <div class="ns-content-box">
                                <h4 class="gradient-text"><?php echo $term->name; ?></h4>
                                <a href="<?php echo get_category_link($term->term_id); ?>" class="btn-hover color-1">View Awards</a>
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
endif;
get_footer(); 
?>

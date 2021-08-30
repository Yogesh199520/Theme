<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

$terms = get_the_terms($post->ID, 'patient_category');
$term = array_shift($terms);
?>
<!--============================== Content Start ==============================-->
<div class="content-container blue-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php smp_breadcrumb_list(); ?>
                <?php if(has_post_thumbnail()): ?>
                    <div class="individual-img">
                        <?php echo the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="individual-content">
                    <h6 class="patients-name">Name : <?php the_title(); ?></h6>
                   <?php if(!empty($term)) : echo ' <h6 class="patients-case">Case : '.$term->name.' </h6>'; endif; ?>
                    <hr />
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php
get_footer(); 
?>
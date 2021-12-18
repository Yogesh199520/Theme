<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/

if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

?>
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(have_posts()):  while(have_posts()): the_post(); the_content(); endwhile;  endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$blog_select_testimonial = get_field('blog_select_testimonial');
if($blog_select_testimonial):
$client_name = get_field('client_name',$blog_select_testimonial);
$client_testimonial = get_field('client_testimonial',$blog_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($blog_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="testimonial-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-box">
                            <div class="testimonial-content text-center">
                                <?php echo $client_testimonial; ?>
                            </div>
                            <div class="author text-end">- <?php echo $client_name; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonial container End ==============================-->
<?php
endif;
get_footer(); 
?>
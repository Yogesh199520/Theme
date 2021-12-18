<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Join US */
get_header();


$join_us_bg_image = wp_get_attachment_image_url(get_field('join_us_bg_image'),'large');
$join_us_body_content = get_field('join_us_body_content');
$join_us_select_form = get_field('join_us_select_form');
?>
<!--============================== Outer Container Start ============================-->
<div class="content-block-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cb-row add-shadow">
                    <!--============================== Inner hero container Start ============================-->
                    <div class="inner-hero-content d-md-flex flex-md-wrap">
                        <div class="inner-hero-img-box position-relative add-tl-white-shape">
                            <div class="inner-hero-bg background-image" style="background-image: url(<?php echo $join_us_bg_image; ?>);"></div>
                        </div>
                        <?php if(!empty($join_us_body_content)): ?>
                        <div class="inner-hero-text-box yellow-bg d-flex align-items-center add-br-dark-shape">
                            <div class="iht-content os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                               <?php echo $join_us_body_content; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!--============================== Inner hero container End ==============================-->
                    <?php
                    if($join_us_select_form){
                        echo '<div class="cb-form-row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">';
                            echo do_shortcode('[contact-form-7 id="'.$join_us_select_form.'" title="Join US"]'); 
                        echo '</div>';
                    }

                    if(have_rows('join_us_our_vision')):
                    ?>
                    <ul class="post-list two-column p-0 d-flex flex-wrap os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <?php 
                        while(have_rows('join_us_our_vision')): the_row();
                        $image = wp_get_attachment_image(get_sub_field('image'),'medium_lagre');
                        $heading = get_sub_field('heading');
                        $body_text = get_sub_field('body_text');
                        ?>
                        <li class="post-item">
                            <div class="post-box d-flex flex-column w-100 text-center">
                                <?php 
                                if(!empty($image)): echo '<div class="post-thumbnail-box">'.$image.'</div>'; endif;
                                if(!empty($heading || $body_text)):  
                                ?>
                                <div class="post-text-box">
                                    <?php 
                                    if(!empty($heading)): echo '<h4 class="post-title">'.$heading.'</h4>'; endif; 
                                    echo $body_text;
                                    ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </li>
                     <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Outer Container End ==============================-->
<?php 
$join_us_select_testimonial = get_field('join_us_select_testimonial');
if($join_us_select_testimonial):
$client_name = get_field('client_name',$join_us_select_testimonial);
$client_testimonial = get_field('client_testimonial',$join_us_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($join_us_select_testimonial);
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
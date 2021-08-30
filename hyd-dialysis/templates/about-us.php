<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About Us */
get_header();

$about_bg_image = wp_get_attachment_image_url(get_field('about_bg_image'),'medium_large');
$about_heading = get_field('about_heading');
$about_body_text = get_field('about_body_text');
$about_button_text = get_field('about_button_text');
$about_button_link = get_field('about_button_link');
?>
<!--============================== Content Start ==============================-->
<div class="about-banner-conainer">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="about-banner-content" style="background-image:url(<?php echo $about_bg_image; ?>);">
                    <div class="about-banner-inner blue-bg">
                        <?php if(!empty($about_heading)): ?>
                        <div class="heading">
                            <h3><?php echo $about_heading; ?></h3>
                        </div>
                        <?php endif;
                        if(!empty($about_body_text)):
                            echo '<p>'.$about_body_text.'</p>';
                        endif;
                        if(!empty($about_button_text && $about_button_link)):
                            echo '<a href="'.$about_button_link.'" class="btn btn-white-bg">'.$about_button_text.'</a>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php 
if(have_rows('diseases_types')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container about-us-conainer">
    <div class="container container1 add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-10 offset-lg-1">
                <div class="about-us-conent">
                    <ul class="about-us-list">
                        <?php
                        while(have_rows('diseases_types') ): the_row();
                        $image = wp_get_attachment_image(get_sub_field('image'),'large');
                        $heading = get_sub_field('heading');
                        $body_content = get_sub_field('body_content');  
                        ?>
                        <li class="about-us-item">
                            <div class="about-us-box d-flex flex-column flex-md-row">
                                <?php if(!empty($image)): 
                                    echo '<div class="about-us-left">'.$image.'</div>'; 
                                endif; 
                                ?>
                                <div class="about-us-right">
                                    <div class="about-us-right-content">
                                    <?php if(!empty($heading)): 
                                        echo '<h3>'.$heading.'</h3>';
                                    endif;
                                    echo $body_content; 
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
                        endwhile; 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->
<?php 
endif;
if(have_rows('why_choose_us')):
$heading = get_field('why_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container ckd-cause-container blue-bg pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php if(!empty($heading)): ?>
                <div class="heading type3">
                    <h3>
                       <?php echo $heading; ?> 
                    </h3>
                    <div class="h-line"></div>
                </div>
                <?php endif; ?>
                <div class="ckd-cuase-content how-works">
                    <ul class="ckd-cause-list mobile-slider white-dots">
                        <?php
                        while(have_rows('why_choose_us') ): the_row();
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                        $heading = get_sub_field('heading');
                        $text = get_sub_field('text');  
                        ?>
                        <li class="ckd-cause-item d-flex flex-column flex-md-row align-items-center">
                            <?php if(!empty($icon)): echo '<div class="ckd-img">'.$icon.'</div>'; endif; ?>
                            <div class="ckd-cause-content">
                                <?php 
                                if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif;
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif;  
                                ?>
                            </div>
                        </li>
                        <?php 
                        endwhile; 
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
get_footer();
?>
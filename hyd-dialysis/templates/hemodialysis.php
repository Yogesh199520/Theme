<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Hemodialysis */
get_header();

$bg_image = wp_get_attachment_image_url(get_field('hemo_image'),'large');
$heading = get_field('hemo_normal_heading');
$bold_heading = get_field('hemo_bold_heading');
$text = get_field('hemo_text');
?>
<!--============================== hero start ==============================-->
<div class="inner-hero-container d-flex align-items-center">
    <div class="container add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-6">
                <div class="inner-hero-content heading-white">
                    <?php 
                    if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif;
                    if(!empty($bold_heading)): echo '<h1>'.$bold_heading.'</h1>'; endif; 
                    if(!empty($text)): echo '<p>'.$text.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-hero-bg os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s" style="background-image: url(<?php echo $bg_image; ?>);"></div>
</div>
<!--============================== hero End ==============================-->
<?php 
$body = get_field('body_text');
if(!empty($body)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-info-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="service-info-content">
                   <?php echo $body; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(have_rows('hemo_healthcare_team_list')):
$heading = get_field('hemo_health_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container heaelthcare-container p-100">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($heading)): echo '<div class="heading type2"><h3>'.$heading.'</h3></div>'; endif;
                ?>
                <ul class="healthcare-list d-flex flex-wrap text-center">
                    <?php
                    while(have_rows('hemo_healthcare_team_list')): the_row();
                    $text = get_sub_field('text');
                    $image = wp_get_attachment_image(get_sub_field('icon'),'medium');  
                    ?>
                    <li class="healthcare-item">
                        <div class="healthcare-box">
                            <?php 
                            if(!empty($image)): echo '<div class="healthcare-img">'.$image.'</div>'; endif;
                            if(!empty($text)): echo '<div class="healthcare-info">'.$text.'</div>'; endif;
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
<!--============================== Content End ==============================-->
<?php
endif;
if(have_rows('hemo_why_choose_hyd')):
$heading = get_field('hemo_hyd_heading');
$quotes = get_field('hemo_quotes');
?>
<!--============================== Content Start ==============================-->
<div class="content-container moon-yellow-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($heading)): echo '<div class="heading type2"><h3>'.$heading.'</h3></div>'; endif;
                ?>
                <div class="service-dialysis-content">
                    <ul class="dialysis-list d-md-flex flex-wrap flex-column text-center mobile-slider white-dots">
                        <?php
                        while(have_rows('hemo_why_choose_hyd')): the_row();
                        $text = get_sub_field('text');
                        $image = wp_get_attachment_image(get_sub_field('icon'),'medium');  
                        ?>
                        <li class="dialysis-item">
                            <div class="dialysis-box">
                                <?php 
                                if(!empty($image)): echo '<div class="dialysis-img">'.$image.'</div>'; endif;
                                if(!empty($text)): echo '<div class="dialysis-info">'.$text.'</div>'; endif;
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
        <?php if(!empty($quotes)): ?>
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-8 offset-lg-2">
                <div class="committment"> 
                    <p><em><?php echo $quotes; ?></em></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
$left_heading = get_field('hemo_left_heading');
$right_heading = get_field('hemo_right_heading');
$left_content = get_field('hemo_left_content');
$right_content = get_field('hemo_right_content');
?>
<!--============================== Content Start ==============================-->
<div class="content-container hemodialysis-container more-apd pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-6">
                <div class="hemodialysis-content-left">
                    <?php 
                    if(!empty($left_heading)): echo '<div class="new-heading"><h3>'.$left_heading.'</h3></div>'; endif;
                    if(!empty($left_content)): echo '<div class="hemodialysis-content">'.$left_content.'</div>'; endif;
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="hemodialysis-content-right">
                    <?php 
                    if(!empty($right_heading)): echo '<div class="new-heading right"><h3>'.$right_heading.'</h3></div>'; endif;
                    if(have_rows('hemo_right_content')):
                    ?>
                    <ul class="hemodialysis-list d-flex justify-content-center">
                        <?php
                        while(have_rows('hemo_right_content')): the_row();
                        $text = get_sub_field('text');
                        $image = wp_get_attachment_image(get_sub_field('icon'),'medium');  
                        ?>
                        <li class="hemodialysis-item">
                            <?php 
                            if(!empty($image)): echo '<div class="hemodialysis-img">'.$image.'</div>'; endif;
                            if(!empty($text)): echo '<div class="hemodialysis-info">'.$text.'</div>'; endif;
                            ?>
                        </li>
                        <?php 
                        endwhile; 
                        ?>
                    </ul>
                    <?php 
                    endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
if(have_rows('work_with_hyd_types')):
$work_heading = get_field('hemo_work_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container work-with-us-container blue-bg pb-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($work_heading)): echo '<div class="heading type2 type3"><h3>'.$work_heading.'</h3>
                <div class="h-line"></div></div>'; endif;
                ?>
                <div class="ckd-cuase-content how-works">
                    <ul class="ckd-cause-list mobile-slider white-dots">
                        <?php
                        while(have_rows('work_with_hyd_types')): the_row();
                        $text = get_sub_field('text');
                        $heading = get_sub_field('heading');
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');  
                        ?>
                        <li class="ckd-cause-item d-flex flex-column flex-md-row align-items-center">
                            <?php if(!empty($image)): echo '<div class="ckd-img">'.$icon.'</div>'; endif;
                            ?>
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
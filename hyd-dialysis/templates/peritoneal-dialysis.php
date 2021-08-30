<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Peritoneal Dialysis */
get_header();

$bg_image = wp_get_attachment_image_url(get_field('peritoneal_image'),'large');
$peritoneal_heading = get_field('peritoneal_heading');
$peritoneal_bold_heading = get_field('peritoneal_bold_heading');
$peritoneal_text = get_field('peritoneal_text');
?>
<!--============================== hero start ==============================-->
<div class="inner-banner-container d-lg-flex align-items-center banner-2">
    <div class="container container1 add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-7">
                <div class="inner-banner-outer">
                    <div class="inner-banner-content">
                    <?php 
                    if(!empty($peritoneal_heading)): echo '<h3>'.$peritoneal_heading.'</h3>'; endif;
                    if(!empty($peritoneal_bold_heading)): echo '<h1>'.$peritoneal_bold_heading.'</h1>'; endif; 
                    if(!empty($peritoneal_text)): echo '<p>'.$peritoneal_text.'</p>'; endif; 
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-img-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s" style="background-image: url(<?php echo $bg_image; ?>);"></div>
</div>
<!--============================== hero End ==============================-->
<?php 
$body_text = get_field('body_text');
if(!empty($body_text)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-info-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="service-info-content">
                    <?php echo $body_text;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(have_rows('peritoneal_why_choose_hyd')):
$heading = get_field('peritoneal_hyd_heading');
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
                    <ul class="dialysis-list d-md-flex flex-wrap flex-column flex-sm-row text-center mobile-slider white-dots">
                        <?php
                        while(have_rows('peritoneal_why_choose_hyd')): the_row();
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
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$peritoneal_how_heading = get_field('peritoneal_how_heading');
$peritoneal_how_left_content = get_field('peritoneal_how_left_content');
$peritoneal_how_right_content = get_field('peritoneal_how_right_content');
?>
<!--============================== Content Start ==============================-->
<div class="content-container hdw-container more-pad">
    <div class="container">
        <div class="row os-animation animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.3s" style="animation-delay: 0.3s;">
            <div class="col-md-12">
                <?php if(!empty($peritoneal_how_heading)): echo ' <div class="new-heading"><h3>'.$peritoneal_how_heading.'</h3></div>'; endif; 
                ?>
                <div class="hdw-content d-flex flex-wrap">
                    <?php 
                    if(!empty($peritoneal_how_left_content)): ?>
                    <div class="hdw-left">
                        <div class="hdw-left-content">
                            <?php echo $peritoneal_how_left_content; ?>
                        </div>
                    </div>
                    <?php endif;
                    if(!empty($peritoneal_how_right_content)):?>
                    <div class="hdw-right">
                        <div class="hdw-right-content">
                            <?php echo $peritoneal_how_right_content; ?>
                        </div>
                    </div>
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
get_footer();
?>
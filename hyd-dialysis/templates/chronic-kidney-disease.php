<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Chronic Kidney Disease */
get_header();

$bg_image = wp_get_attachment_image_url(get_field('chronic_image'),'large');
$chronic_normal_heading = get_field('chronic_normal_heading');
$chronic_bold_heading = get_field('chronic_bold_heading');
$chronic_text = get_field('chronic_text');
?>
<!--============================== hero start ==============================-->
<div class="inner-banner-container d-lg-flex align-items-center">
    <div class="container container1 add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-7">
                <div class="inner-banner-outer">
                    <div class="inner-banner-content">
                        <?php 
                        if(!empty($chronic_normal_heading)): echo '<h3>'.$chronic_normal_heading.'</h3>'; endif;
                        if(!empty($chronic_bold_heading)): echo '<h1>'.$chronic_bold_heading.'</h1>'; endif; 
                        if(!empty($chronic_text)): echo '<p>'.$chronic_text.'</p>'; endif; 
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
$content = get_field('content');
if(!empty($content)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-info-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="service-info-content">
                   <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$causes_heading = get_field('causes_heading');
$treatment_heading = get_field('treatment_heading');
$quotes = get_field('quotes');
$body_text = get_field('body_text');
?>
<!--============================== Content start ==============================-->
<div class="content-container causes-container less-pad">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-12">
                <?php
                if(have_rows('causes_of_kidney_disease')): 
                ?>
                <div class="causes-content">
                    <?php if(!empty($causes_heading)): echo '<div class="heading2 d-flex align-items-end"><div class="heading-text">'.$causes_heading.'</div><div class="h-line"></div></div>'; endif; ?>
                    <div class="causes-list-outer">
                        <ul class="causes-list">
                            <?php
                            while(have_rows('causes_of_kidney_disease')): the_row();
                            $heading = get_sub_field('heading');
                            $text = get_sub_field('text');
                            $icon = wp_get_attachment_image(get_sub_field('image'),'medium'); 
                            ?>
                            <li class="causes-item">
                                <div class="causes-box d-flex flex-column flex-md-row align-items-md-center justify-content-center text-center text-md-left">
                                    <?php 
                                    if(!empty($icon)): echo '<div class="causes-img-box d-flex align-items-center justify-content-center">'.$icon.'</div>'; endif;
                                    if(!empty($text || $heading)):
                                    ?>
                                    <div class="causes-text">
                                        <?php 
                                        if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif;
                                        if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                                        ?>
                                        <p></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <?php 
                            endwhile; 
                            ?>
                        </ul>
                    </div>
                </div>
                <?php
                endif;
                if(!empty($body_text || $quotes)):
                ?>
                <div class="causes-content include-content">
                    <?php if(!empty($treatment_heading)): echo '<div class="heading2 d-flex align-items-end"><div class="heading-text"><h4>'.$treatment_heading.'</h4></div><div class="h-line"></div></div>'; endif; ?>
                    <div class="include-box">
                        <?php 
                        if(!empty($quotes)): echo '<div class="ib-top-content">'.$quotes.'</div>'; endif;
                        echo $body_text;
                        ?>
                    </div>
                </div>
                <?php
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
if(have_rows('healthcare_team_list')):
$health_heading = get_field('health_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container heaelthcare-container p-100">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($health_heading)): echo '<div class="heading type2"><h3>'.$health_heading.'</h3></div>'; endif;
                ?>
                <ul class="healthcare-list d-flex flex-wrap flex-md-column text-center">
                    <?php
                    while(have_rows('healthcare_team_list')): the_row();
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
if(have_rows('why_choose_hyd')):
$hyd_heading = get_field('hyd_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container moon-yellow-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($hyd_heading)): echo '<div class="heading type2"><h3>'.$hyd_heading.'</h3></div>'; endif;
                ?>
                <div class="service-dialysis-content">
                    <ul class="dialysis-list d-md-flex flex-wrap flex-column flex-sm-row text-center mobile-slider white-dots">
                        <?php
                        while(have_rows('why_choose_hyd')): the_row();
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
get_footer();
?>
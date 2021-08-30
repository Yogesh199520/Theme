<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Renal/Kidney Transplant */
get_header();

$bg_image = wp_get_attachment_image_url(get_field('renal_bg_image'),'full');
$heading = get_field('renal_normal_heading');
$bold_heading = get_field('renal_bold_heading');
$text = get_field('renal_text');
?>
<!--============================== hero start ==============================-->
<div class="inner-hero-container d-flex align-items-center">
    <div class="container add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="inner-hero-content">
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
$body = get_field('renal_body');
if(!empty($body)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-info-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="service-info-content">
                    <?php echo $body;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$alert_image = wp_get_attachment_image(get_field('renal_alert_image'),'medium');
$body = get_field('renal_alert_body');
if(!empty($body)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-caution-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="service-caution-content d-md-flex flex-wrap align-item-center">
                    <?php 
                    if(!empty($alert_image)): echo '<div class="caution-img">'.$alert_image.'</div>'; endif; 
                    if(!empty($body)): echo '<div class="caution-content">'.$body.'</div>'; endif;
                    ?> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
if(have_rows('transplant_types')):
$heading = get_field('renal_live_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container transplant-container less-pad">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php if(!empty($heading)): echo ' <div class="heading type2"><h3>'.$heading.'</h3></div>'; endif; ?>
                <div class="transplant-content-inner d-flex flex-wrap">
                    <div class="transplant-left">
                        <?php
                        while(have_rows('transplant_types')): the_row();
                        $heading = get_sub_field('heading');
                        $body = get_sub_field('body');  
                        ?>
                        <div class="transplant-box">
                            <div class="transplant-content">
                                <?php 
                                if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif;
                                echo $body;
                                ?>
                            </div>
                        </div>
                        <?php 
                        endwhile; 
                        ?>
                    </div>
                    <div class="transplant-right mobile-slider">
                        <?php
                        while(have_rows('transplant_types')): the_row();
                        $image = wp_get_attachment_image(get_sub_field('image'),'large');
                        echo '<div class="media-box">'.$image.'</div>';
                        endwhile; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$body = get_field('renal_cadaver_body');
$heading = get_field('renal_cadaver_heading');
if(!empty($body)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <?php 
                if(!empty($heading)): echo '<div class="heading type2"><h3>'.$heading.'</h3></div>'; endif;
                if(!empty($body)): echo '<div class="service-info-content">'.$body.'</div>'; endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(have_rows('renal_hyd_services')):
$heading = get_field('renal_why_heading');
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
                        while(have_rows('renal_hyd_services')): the_row();
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
if(have_rows('team_will_include')):
$heading = get_field('renal_health_heading');
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
                    while(have_rows('team_will_include')): the_row();
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
get_footer();
?>
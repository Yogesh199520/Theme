<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Doctors-2 */
get_header();

$doc_bg_image = wp_get_attachment_image_url(get_field('doc_bg_image'),'medium_large');
$doc_heading = get_field('doc_heading');
$doc_text = get_field('doc_text');
?>
<!--============================== hero start ==============================-->
<div class="inner-hero-container d-flex align-items-center">
    <div class="container add-index">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="inner-hero-content doctors-banner-inner">
                    <?php 
                    if(!empty($doc_heading)): echo '<h1>'.$doc_heading.'</h1>'; endif; 
                    if(!empty($doc_text)): echo '<p>'.$doc_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-hero-bg os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s" style="background-image: url(<?php echo $doc_bg_image; ?>);"></div>
</div>
<!--============================== hero End ==============================-->
<?php
$content = apply_filters('the_content', get_the_content());
if(!empty($content)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container info-container less-pad">
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
if(have_rows('doctors')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container service-info-container less-pad">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-md-12">
                <div class="doctors-listing-content">
                    <?php
                    while(have_rows('doctors') ): the_row();
                    $doctor_image = wp_get_attachment_image(get_sub_field('doctor_image'),'large');
                    $doctor_name = get_sub_field('doctor_name');
                    $doctor_designation = get_sub_field('doctor_designation');
                    ?>
                    <div class="doctors-content-box d-md-flex flex-wrap">
                        <div class="doctors-content-left d-flex flex-column">
                            <?php if(!empty($doctor_image)): ?>
                            <div class="doctors-img-box">
                                <div class="doctors-img">
                                    <?php echo $doctor_image; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="doctors-name">
                                <h3>
                                    <?php 
                                    if(!empty($doctor_name)): echo $doctor_name; endif;
                                    if(!empty($doctor_designation)): echo ' <small>'.$doctor_designation.'</small>'; endif;
                                    ?>
                                </h3>
                            </div>
                        </div>
                        <?php
                        if(have_rows('about_doctor')):
                        ?>
                        <div class="doctors-content-right">
                            <?php
                            while(have_rows('about_doctor') ): the_row();
                            $heading = get_sub_field('heading');
                            $body_text = get_sub_field('body_text');
                            if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
                            if(!empty($body_text)): echo $body_text; endif;
                            endwhile; 
                            ?>
                        </div>
                        <?php 
                        endif; 
                        ?>
                    </div>
                    <?php 
                    endwhile; 
                    ?>
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
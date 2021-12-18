<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: LCA Assessment */
get_header();


$career_ass_heading = get_field('career_ass_heading');
$career_ass_sub_heading = get_field('career_ass_sub_heading');
$career_ass_body_text = get_field('career_ass_body_text');
$career_ass_right_text = get_field('career_ass_right_text');
$career_ass_button_text = get_field('career_ass_button_text');
$career_ass_button_link = get_field('career_ass_button_link');
$career_ass_right_bg_image = wp_get_attachment_image_url(get_field('career_ass_right_bg_image'),'medium_large');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container info-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($career_ass_heading || $career_ass_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php 
                    if(!empty($career_ass_heading)): echo '<h3>'.$career_ass_heading.'</h3>'; endif;
                    if(!empty($career_ass_sub_heading)): echo '<h4>'.$career_ass_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
                <?php endif; ?>
                <div class="row">
                    <?php 
                    if(!empty($career_ass_body_text)): echo '<div class="col-md-7 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">'.$career_ass_body_text.'</div>'; endif; 
                    if(!empty($career_ass_right_bg_image)):
                    ?>
                    <div class="col-md-5">
                        <div class="card-block-box green-bg position-relative overflow-hidden">
                            <div class="card-block-bg background-image" style="background-image: url(<?php echo $career_ass_right_bg_image; ?>);"></div>
                            <div class="bard-block-text os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.35s">
                                <?php 
                                echo $career_ass_right_text; 
                                if(!empty($career_ass_button_text)): echo '<a href="'.$career_ass_button_link.'" class="btn yellow-btn add-line" target="_blank">'.$career_ass_button_text.'</a>'; endif; 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--============================== Content Container End ==============================-->
<?php 
if(have_rows('services')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <ul class="post-list p-0 d-flex flex-wrap">
                	<?php 
                    while(have_rows('services')): the_row();
                    $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
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
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif; 
$career_content_heading = get_field('career_content_heading');
$career_content_body_text = get_field('career_content_body_text');
$career_content_image = wp_get_attachment_image_url(get_field('career_content_image'),'medium_large');
if(!empty($career_content_body_text || $career_content_image)):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container text-block-container overflow-hidden pt-0">
    <div class="container">
        <div class="row">
            <?php if(!empty($career_content_heading || $career_content_body_text)): ?>
            <div class="col-md-8">
                <div class="text-block-box add-bott-shape">
                    <div class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <?php 
                        if(!empty($career_content_heading)): echo '<h4>'.$career_content_heading.'</h4>'; endif; 
                        echo $career_content_body_text;
                        ?>
                    </div>
                </div>
            </div>
            <?php
            endif;
            if(!empty($career_content_image)): 
            ?>
            <div class="col-md-4">
                <div class="text-img-box position-relative add-top-shape os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.35s">
                    <div class="text-block-bg background-image" style="background-image: url(<?php echo $career_content_image; ?>);"></div>
                </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$inscareer_heading = get_field('inscareer_heading');
$inscareer_sub_heading = get_field('inscareer_sub_heading');
$inscareer_body_text = get_field('inscareer_body_text');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0 career-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            	<?php if(!empty($inscareer_heading || $inscareer_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($inscareer_heading)): echo '<h3>'.$inscareer_heading.'</h3>'; endif;
                    if(!empty($inscareer_sub_heading)): echo '<h4>'.$inscareer_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php 
            	endif; 
            	echo $inscareer_body_text;
            	if(have_rows('inscareer_success')): 
            	?>
                <ul class="career-cards">
                	<?php 
                    while(have_rows('inscareer_success')): the_row();
                    $box_color = get_sub_field('box_color');
                    $heading = get_sub_field('heading');
                    $sub_heading = get_sub_field('sub_heading');
                    $text = get_sub_field('text');
                    $high_low = strtolower($sub_heading);
                   if($high_low == 'high'):
                   		$check_attr = '';
                   	elseif($high_low == 'low'):
                   		$check_attr = 'checked';
                   endif; 
                    ?>
                    <li>
                        <div class="career-card-box d-md-flex align-items-md-center justify-content-md-between <?php echo $box_color; ?>-bg">
                            <div class="dot-line"></div>
                            <?php if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif; ?>
                            <div class="indicator">
                                <label class="switch">
                                    <input type="checkbox" <?php echo $check_attr; ?> disabled="disabled"/>
                                    <small></small>
                                </label>
                            </div>
                            <div class="ccb-text text-center">
                                <?php 
                                if(!empty($sub_heading)): echo '<h5>'.$sub_heading.'</h5>'; endif; 
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif; 
                                ?>
                            </div>
                        </div>
                    </li>
                   <?php endwhile; ?>
                </ul>
            	<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$development_guide_heading = get_field('development_guide_heading');
$development_guide_sub_heading = get_field('development_guide_sub_heading');
$development_guide_intro_text = get_field('development_guide_intro_text');
$development_guide_body_text = get_field('development_guide_body_text');
$profile_report = get_field('profile_report');
$development_guide_image = wp_get_attachment_image(get_field('development_guide_image'),'medium_large');
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
    	<?php if(!empty($development_guide_heading || $development_guide_sub_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-uppercase overflow-hidden os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php 
                    if(!empty($development_guide_heading)): echo '<h3>'.$development_guide_heading.'</h3>'; endif;
                    if(!empty($development_guide_sub_heading)): echo '<h4>'.$development_guide_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div class="row align-items-md-start">
            <div class="col-md-8 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <?php 
                if(!empty($development_guide_intro_text)): echo '<p>'.$development_guide_intro_text.'</p>'; endif; 
                if(!empty($development_guide_body_text || $development_guide_image)):
                ?>
                <div class="row align-items-center">
                	<?php 
                	if(!empty($development_guide_image)): echo '<div class="col-md-5"><div class="">'.$development_guide_image.'</div></div>'; endif;
                	if(!empty($development_guide_body_text)): echo '<div class="col-md-7"><p>'.$development_guide_body_text.'</p></div>'; endif;
                	?>
                </div>
            	<?php endif; ?>
            </div>
            <div class="col-md-4">
                <a href="<?php echo $profile_report; ?>" class="large-thumbnail-img mt-md-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.35s" download>
                    <img src="<?php echo IMG.'report-card.jpg'; ?>" alt="report-card"/>
                </a>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$career_ass_select_testimonial = get_field('career_ass_select_testimonial');
if($career_ass_select_testimonial):
$client_name = get_field('client_name',$career_ass_select_testimonial);
$client_testimonial = get_field('client_testimonial',$career_ass_select_testimonial);
if(empty($client_name)):
	$client_name = get_the_title($career_ass_select_testimonial);
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
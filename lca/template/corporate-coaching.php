<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Corporate Coaching */
get_header();

$cc_banner_body_text = get_field('cc_banner_body_text');
$cc_banner_bg_image = wp_get_attachment_image_url(get_field('cc_banner_bg_image'),'large');
$cc_banner_button_text = get_field('cc_banner_button_text');
$cc_banner_button_link = get_field('cc_banner_button_link');
if(!empty($cc_banner_body_text || $cc_banner_bg_image)):
?>
<!--============================== Inner hero container Start ============================-->
<div class="inner-hero-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-hero-content d-md-flex flex-md-wrap">
                    <div class="inner-hero-img-box position-relative add-tl-white-shape add-br-white-shape">
                        <div class="inner-hero-bg background-image" style="background-image: url(<?php echo $cc_banner_bg_image; ?>);"></div>
                    </div>
                    <div class="inner-hero-text-box orange-bg d-flex align-items-center add-tr-dark-shape">
                        <div class="iht-content">
                            <?php 
                            echo $cc_banner_body_text; 
                            if(!empty($cc_banner_button_text)): 
                            ?>
                            <div class="iht-btn">
                                <a href="<?php echo $cc_banner_button_link; ?>" class="add-arrow white">
                                    <span class="btn btn-primary"><?php echo $cc_banner_button_text; ?></span>
                                    <img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow" />
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Inner hero container End ==============================-->
<?php 
endif;
$cc_ph_heading = get_field('cc_ph_heading');
$cc_ph_sub_heading = get_field('cc_ph_sub_heading');
if(have_rows('program_highlights')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($cc_ph_heading || $cc_ph_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($cc_ph_heading)): echo '<h3>'.$cc_ph_heading.'</h3>'; endif;
                    if(!empty($cc_ph_sub_heading)): echo '<h4>'.$cc_ph_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
                <?php endif; ?>
                <ul class="dot-list">
                    <?php 
                    while(have_rows('program_highlights')): the_row();
                    $list_item = get_sub_field('list_item');
                    echo '<li>'.$list_item.'</li>';
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$cc_cta_button_text = get_field('cc_cta_button_text');
if(have_rows('cc_button')):
while(have_rows('cc_button')): the_row();
if(get_row_layout() == 'page_link'):
    $url = get_sub_field('page_link');
    $target = "_self";
elseif(get_row_layout() == 'external_link'):
    $url = get_sub_field('external_link');
    $target = "_blank";
else:
    $url = '';
    $target = "_self";
endif;
endwhile;
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container btn-link-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-link-content d-flex">
                    <div class="btn-link-box d-flex align-items-center">
                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="btn btn-primary"><?php echo $cc_cta_button_text; ?></a><img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$cc_heading = get_field('cc_heading');
$cc_sub_heading = get_field('cc_sub_heading');
$select_corporate_coaches = get_field('select_corporate_coaches');
$cc_button_text = get_field('cc_button_text');
$cc_button_link = get_field('cc_button_link');
if($select_corporate_coaches):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container coach-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($cc_heading || $cc_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($cc_heading)): echo '<h3>'.$cc_heading.'</h3>'; endif;
                    if(!empty($cc_sub_heading)): echo '<h4>'.$cc_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
                <?php endif; ?>
                <ul class="coach-list d-flex flex-wrap">
                    <?php 
                    foreach($select_corporate_coaches as $cid):
                    $name = get_field('coaches_name',$cid);
                    $coaches_designation = get_field('coaches_designation',$cid);
                    $photo = wp_get_attachment_image(get_field('coaches_photo',$cid),'medium');
                    if(empty($name)):
                        $name = get_the_title($cid);
                    endif;
                    ?>
                    <li>
                        <div class="coach-box text-center">
                            <?php if(!empty($photo)): echo '<div class="coach-img">'.$photo.'</div>'; endif; ?>
                            <div class="coach-content">
                                <h5><?php echo $name; ?></h5>
                                <?php if(!empty($coaches_designation)): echo '<h6>'.$coaches_designation.'</h6>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php if(!empty($cc_button_text)): ?>
                <div class="text-center mt-5">
                    <a href="<?php echo $cc_button_link; ?>" class="add-arrow">
                        <span class="btn btn-primary"><?php echo $cc_button_text; ?></span>
                        <img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow"/>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<!--============================== Content Container End ==============================-->
<?php 
endif;
$cc_select_testimonial = get_field('cc_select_testimonial');
if($cc_select_testimonial):
$client_name = get_field('client_name',$cc_select_testimonial);
$client_testimonial = get_field('client_testimonial',$cc_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($cc_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
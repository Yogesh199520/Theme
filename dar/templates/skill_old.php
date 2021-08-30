<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Skill */
get_header();
$skill_banner_image = wp_get_attachment_image(get_field('skill_banner_image'),'full');
$skill_heading = get_field('skill_heading');
$skill_text = get_field('skill_text');
?>
<!--============================== inner hero container Start ==============================-->
<div class="inner-hero-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-hero-content">
                    <?php if(!empty($skill_banner_image)): echo '<div class="inner-hero-bg">'.$skill_banner_image.'</div>'; endif; ?>
                    <div class="inner-hero-box">
                        <div class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <?php
                        if(!empty($skill_heading)): echo '<h2>'.$skill_heading.'</h2>'; endif;
                        if(!empty($skill_text)): echo '<p>'.$skill_text.'</p>'; endif;
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== inner hero container End ==============================-->
<?php
if(have_rows('services')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container content-block-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="grid-list">
                    <?php
                    while(have_rows('services')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                    $heading = get_sub_field('heading');
                    $text = get_sub_field('text');
                    ?>
                    <li class="grid-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="grid-box d-flex align-items-md-center justify-content-center">
                            <?php if(!empty($icon)): echo '<div class="grid-icon">'.$icon.'</div>'; endif; ?>
                            <div class="grid-content">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($text)): echo $text; endif;
                                ?> 
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
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
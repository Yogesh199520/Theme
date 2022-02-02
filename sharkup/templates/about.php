<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: About */

get_header();
get_template_part('template-part/inner-banner');

$intro_image = wp_get_attachment_image(get_field('intro_image'),'medium_large');
$intro_body_text = get_field('intro_body_text');
$who_wh_heading = get_field('who_wh_heading');
$who_wh_body_text = get_field('who_wh_body_text');
$why_wh_heading = get_field('why_wh_heading');
$why_wh_body_text = get_field('why_wh_body_text');
?>
<!--============================== Content container Start ==============================-->

<div class="content-container about-container">
    <div class="container">
        <div class="row">
            <?php if(!empty($intro_image)): ?>
            <div class="col-md-5">
                <div class="about-img-box">
                    <?php echo $intro_image; ?>
                </div>
            </div>
            <?php 
            endif;
            if(!empty($intro_body_text)): 
            ?>
            <div class="col-md-7">
                <div class="about-text-box">
                    <?php echo $intro_body_text; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--============================== Content container End ==============================-->

<!--============================== Content container Start ==============================-->

<div class="content-container block-container overflow-hidden">
    <div class="container">
        <?php if(!empty($who_wh_heading || $who_wh_body_text)): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="block-text-box">
                    <?php 
                    if(!empty($who_wh_heading)): echo '<h6>'.$who_wh_heading.'</h6>'; endif; 
                    echo $who_wh_body_text;
                    ?>
                </div>
            </div>
        </div>
        <?php endif;
        $image_list = get_field('image_list');
        $size = 'small';
        if($image_list):  
        ?>
        <div class="row">
            <div class="col-md-12">
                <ul class="about-img-list d-flex align-items-center flex-wrap">
                    <?php foreach($image_list as $list_id): ?>
                    <li>
                        <div class="ai-img"><?php echo wp_get_attachment_image($list_id, $size); ?></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
        endif; 
        if(!empty($why_wh_heading || $why_wh_body_text)): 
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="block-text-box">
                    <?php 
                    if(!empty($why_wh_heading)): echo '<h6>'.$why_wh_heading.'</h6>'; endif; 
                    echo $why_wh_body_text;
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!--============================== Content container End ==============================-->

<?php

get_template_part('template-part/help');

get_template_part('template-part/signup','cta');

get_footer();
?>
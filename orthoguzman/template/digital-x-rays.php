<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Digital X-Rays */

get_header();

get_template_part('template-part/inner-banner');

$xrays_body_text = get_field('xrays_body_text');
$xrays_button_text = get_field('xrays_button_text');
$xrays_button_link = get_field('xrays_button_link');
$xrays_image = wp_get_attachment_image(get_field('xrays_image'),'large');
?>
<section class="community-sec1">
    <div class="container">
        <div class="row">
            <?php if(!empty($xrays_image)): echo '<div class="col-6"><div class="border_image">'.$xrays_image.'</div></div>'; endif; ?>
            <div class="col-6">
                <?php 
                echo $xrays_body_text;
                if(!empty($xrays_button_text)): echo '<a href="'.$xrays_button_link.'" class="banner-btn">'.$xrays_button_text.'</a>'; endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer(); 
?>
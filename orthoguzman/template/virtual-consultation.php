<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Virtual Consultation */

get_header();

get_template_part('template-part/inner-banner');

$virtual_consultation_video = get_field('virtual_consultation_video');
$virtual_consultation_body_text = get_field('virtual_consultation_body_text');
$virtual_consultation_text = get_field('virtual_consultation_text');
?>
<div id="content">
    <section class="consult-sec1">
        <div class="container">
            <?php 
            if(!empty($virtual_consultation_video)): echo '<div class="consult-video">'.$virtual_consultation_video.'</div>'; endif; 
            echo $virtual_consultation_body_text;
            if(!empty($virtual_consultation_text)): echo '<p>'.$virtual_consultation_text.'</p>'; endif;
            ?>
            <div id="shortcode-103-527" class="ct-shortcode">
                <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </section>
</div>


<?php 
get_footer(); 
?>
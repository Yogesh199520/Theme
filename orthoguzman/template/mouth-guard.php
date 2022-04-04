<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Mouth Guard */

get_header();

get_template_part('template-part/inner-banner');

$mouthguard_body_text = get_field('mouthguard_body_text');
$mouthguard_image = wp_get_attachment_image(get_field('mouthguard_image'),'medium_large');
?>
<section class="homepage-sec1">
    <div class="container">
        <div class="row">
        	<?php 
        	if(!empty($mouthguard_image)): echo '<div class="col-6"><div class="border_image">'.$mouthguard_image.'</div></div>'; endif;
            ?> 
        	<div class="col-6">
                <?php 
                echo $mouthguard_body_text; 
                while(have_rows('mouthguard_content_block')): the_row();
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                echo '<h2>'.$heading.'</h2>';
                echo $body_text;
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>
<?php 
get_footer(); 
?>
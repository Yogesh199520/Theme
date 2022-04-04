<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Surgical Orthodontics */

get_header();

get_template_part('template-part/inner-banner');


$surgical_right_image = wp_get_attachment_image(get_field('surgical_right_image'),'large');
$surgical_heading = get_field('surgical_heading');
$surgical_left_content = get_field('surgical_left_content');
$surgical_body_text = get_field('surgical_body_text');
?>
<section class="community-sec1">
    <div class="container">
         <div class="row">
        	<?php 
        	if(!empty($surgical_left_content)):
        	?>
            <div class="col-6">
            	<?php 
            	if(!empty($surgical_heading)): echo '<h2 class="sec_title">'.$surgical_heading.'</h2>'; endif;
            	echo $surgical_left_content;
            	?>
            </div>
            <?php 
        	endif;
        	if(!empty($surgical_right_image)): echo '<div class="col-6"><div class="border_image">'.$surgical_right_image.'</div></div>'; endif; 
        	?>
        </div>
        <?php 
        if(have_rows('surgical_content_block')):
        ?>
        <div class="row">
        	<div class="col-12">
        		<?php
                while(have_rows('surgical_content_block')): the_row();
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                echo '<h2>'.$heading.'</h2>';
                echo $body_text;
                endwhile;
                ?>
        	</div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php 
get_footer(); 
?>
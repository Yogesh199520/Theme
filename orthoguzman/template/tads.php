<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Tads */

get_header();

get_template_part('template-part/inner-banner');


$tabs_right_image = wp_get_attachment_image(get_field('tabs_right_image'),'large');
?>
<section class="community-sec1">
    <div class="container">
        <?php if(have_rows('tabs_content_block')): ?>
        <div class="row">
            <div class="col-6">
            	<?php
                while(have_rows('tabs_content_block')): the_row();
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                echo '<h2>'.$heading.'</h2>';
                echo $body_text;
                endwhile;
                ?>
            </div>
            <?php 
        	if(!empty($tabs_right_image)): echo '<div class="col-6"><div class="border_image">'.$tabs_right_image.'</div></div>'; endif; 
        	?>
        </div>
        <?php 
        endif;
        if(have_rows('full_width_content')):
        ?>
        <div class="row">
            <div class="col-12">
                <?php
                while(have_rows('full_width_content')): the_row();
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
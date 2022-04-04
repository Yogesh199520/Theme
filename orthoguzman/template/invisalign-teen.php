<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Invisalign Teen */

get_header();

get_template_part('template-part/inner-banner');

$if_image = get_field('if_image');
$teen_image = wp_get_attachment_image(get_field('teen_image'),'large');
$teen_left_image = wp_get_attachment_image(get_field('teen_left_image'),'medium_large');
$teen_heading = get_field('teen_heading');
$teen_right_content = get_field('teen_right_content');
?>
<div id="content">
<section class="invi-sec1">
    <div class="container ">
        <?php 
        if($if_image): echo '<div class="aligncenter center-img">'.$teen_image.'</div>'; endif; 
        while(have_rows('teen_content_block')): the_row();
        $heading = get_sub_field('heading');
        $body_text = get_sub_field('body_text');
        echo '<h2>'.$heading.'</h2>';
        echo $body_text;
        endwhile;
        ?>
    </div>
</section>
<section class="">
    <div class="container">
        <div class="row">
            <?php 
            if(!empty($teen_left_image)): echo '<div class="col-6"><div class="border_image">'.$teen_left_image.'</div></div>'; endif;
            echo '<div class="col-6">';
            if(!empty($teen_heading)): echo '<h4>'.$teen_heading.'</h4>'; endif;
            echo $teen_right_content;
            echo '</div>';
            ?>
        </div>
    </div>
</section>
</div>


<?php 
get_footer(); 
?>
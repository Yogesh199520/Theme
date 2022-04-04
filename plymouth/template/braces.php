<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Braces */

get_header();


get_template_part('/template-part/inner-banner');

$bracessec1_intro_text = get_field('bracessec1_intro_text');
$bracessec1_body_text = get_field('bracessec1_body_text');
$bracessec1_button_text = get_field('bracessec1_button_text');
$bracessec1_button_link = get_field('bracessec1_button_link');
$bracessec1_image = wp_get_attachment_image(get_field('bracessec1_image'),'medium_large');
?>

<section class="braces-sec1">
    <div class="container">
        <?php if(!empty($bracessec1_intro_text)): echo '<h4 class="center">'.$bracessec1_intro_text.'</h4>'; endif; ?>
        <div class="row align-items-center">
            <div class="col-6">
                <?php 
                echo $bracessec1_body_text;
                if(!empty($bracessec1_button_text)): echo '<a class="blue_button" href="'.$bracessec1_button_link.'">'.$bracessec1_button_text.'</a>'; endif;
                ?>
            </div>
            <?php if(!empty($bracessec1_image)): echo '<div class="col-6">'.$bracessec1_image.'</div>'; endif; ?>
        </div>
    </div>
</section>
<?php 
$bracessec2_heading = get_field('bracessec2_heading');
if(have_rows('get_braces')):
?>
<section class="home-sec4 braces_sec2">
    <div class="container">
        <?php if(!empty($bracessec2_heading)): echo '<h2 class="section-title mb_150">'.$bracessec2_heading.'</h2>'; endif; ?>
        <div class="row">
            <?php 
            while(have_rows('get_braces')): the_row();
            $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
            $heading = get_sub_field('heading');
            $text = get_sub_field('text');
            ?>
            <div class="step_box">
                <?php 
                if(!empty($icon)): echo '<div class="step_icon2">'.$icon.'</div>'; endif;
                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                ?>
            </div>
           <?php endwhile; ?>
        </div>
    </div>
</section>
<?php 
endif; 
$bracessec3_heading = get_field('bracessec3_heading');
$bracessec3_body_text = get_field('bracessec3_body_text');
$bracessec3_image = wp_get_attachment_image(get_field('bracessec3_image'),'medium_large');
?>
<section class="braces-sec1">
    <div class="container">
        <div class="row align-items-center">
            <?php 
            if(!empty($bracessec3_image)): echo '<div class="col-6">'.$bracessec3_image.'</div>'; endif;
            if(!empty($bracessec3_body_text)): 
            ?>
            <div class="col-6">
                <?php 
                if(!empty($bracessec2_heading)): echo '<h2>'.$bracessec2_heading.'</h2>'; endif; 
                echo $bracessec3_body_text;
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$bracessec4_heading = get_field('bracessec4_heading');
$bracessec4_button_text = get_field('bracessec4_button_text');
$bracessec4_button_link = get_field('bracessec4_button_link');
if(have_rows('benefits')):
?>
<section class="braces_sec2 center">
    <div class="container">
        <?php if(!empty($bracessec4_heading)): echo '<h2 class="section-title">'.$bracessec4_heading.'</h2>'; endif; ?>
        <div class="row">
            <?php 
            while(have_rows('benefits')): the_row();
            $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
            $heading = get_sub_field('heading');
            ?>
            <div class="braces_box">
                <?php 
                if(!empty($icon)): echo '<div class="braces_icon">'.$icon.'</div>'; endif;
                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                ?>
            </div>
            <?php endwhile; ?>
        </div>
        <?php if(!empty($bracessec4_button_text)): echo '<div class="center" style="margin-top: 40px;"><a class="blue_button" href="'.$bracessec4_button_link.'">'.$bracessec4_button_text.'</a></div>'; endif; ?>
    </div>
</section>
<?php
endif;

get_footer(); 
?>
<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Orthodontics */

get_header();

get_template_part('/template-part/inner-banner');

$orthosec1_intro_text = get_field('orthosec1_intro_text');
$orthosec1_body_text = get_field('orthosec1_body_text');
$orthosec1_button_text = get_field('orthosec1_button_text');
$orthosec1_button_link = get_field('orthosec1_button_link');
$orthosec1_image = wp_get_attachment_image(get_field('orthosec1_image'),'medium_large');
?>

<section class="braces-sec1">
    <div class="container">
        <?php if(!empty($orthosec1_intro_text)): echo '<h4 class="center">'.$orthosec1_intro_text.'</h4>'; endif; ?>
        <div class="row align-items-center">
            <div class="col-6">
                <?php 
                echo $orthosec1_body_text;
                if(!empty($orthosec1_button_text)): echo '<a class="blue_button" href="'.$orthosec1_button_link.'">'.$orthosec1_button_text.'</a>'; endif;
                ?>
            </div>
            <?php if(!empty($orthosec1_image)): echo '<div class="col-6">'.$orthosec1_image.'</div>'; endif; ?>
        </div>
    </div>
</section>
<?php 
$orthosec2_heading = get_field('orthosec2_heading');
if(have_rows('why_orthodontics')):
?>
<section class="home-sec4 braces_sec2">
    <div class="container">
        <?php if(!empty($orthosec2_heading)): echo '<h2 class="section-title">'.$orthosec2_heading.'</h2>'; endif; ?>
        <div class="row">
            <?php 
            while(have_rows('why_orthodontics')): the_row();
            $image = wp_get_attachment_image(get_sub_field('image'),'medium');
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            ?>
            <div class="step_box">
                <?php 
                if(!empty($image)): echo '<div class="step_icon2">'.$image.'</div>'; endif;
                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                ?>
            </div>
           <?php endwhile; ?>
        </div>
    </div>
</section>
<?php 
endif; 
$orthosec3_heading = get_field('orthosec3_heading');
$orthosec3_body_text = get_field('orthosec3_body_text');
$orthosec3_image = wp_get_attachment_image(get_field('orthosec3_image'),'medium_large');
?>
<section class="braces-sec1">
    <div class="container">
        <div class="row align-items-center">
            <?php 
            if(!empty($orthosec3_image)): echo '<div class="col-6">'.$orthosec3_image.'</div>'; endif;
            if(!empty($orthosec3_body_text)): 
            ?>
            <div class="col-6">
                <?php 
                if(!empty($orthosec3_heading)): echo '<h2>'.$orthosec3_heading.'</h2>'; endif; 
                echo $orthosec3_body_text;
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$orthosec4_heading = get_field('orthosec4_heading');
$orthosec4_button_text = get_field('orthosec4_button_text');
$orthosec4_button_link = get_field('orthosec4_button_link');
if(have_rows('orthosec4_benefits')):
?>
<section class="braces_sec2 center">
    <div class="container">
        <?php if(!empty($orthosec4_heading)): echo '<h2 class="section-title">'.$orthosec4_heading.'</h2>'; endif; ?>
        <div class="row">
            <?php 
            while(have_rows('orthosec4_benefits')): the_row();
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
        <?php if(!empty($orthosec4_button_text)): echo '<div class="center" style="margin-top: 40px;"><a class="blue_button" href="'.$orthosec4_button_link.'">'.$orthosec4_button_text.'</a></div>'; endif; ?>
    </div>
</section>
<?php
endif;

get_footer(); 
?>
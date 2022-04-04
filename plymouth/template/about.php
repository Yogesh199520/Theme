<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */
get_header();


get_template_part('/template-part/inner-banner');

$about_heading = get_field('about_heading');
$about_sub_heading = get_field('about_sub_heading');
$about_body_text_left = get_field('about_body_text_left');
$about_body_text_right = get_field('about_body_text_right');
?>

<section class="braces-sec1">
    <div class="container">
        <?php
        if(!empty($about_heading)): echo '<h2 class="center section-title">'.$about_heading.'</h2>'; endif;
        if(!empty($about_sub_heading)): echo '<h6 class="center">'.$about_sub_heading.'</h6>'; endif;
        ?>
        <div class="row">
            <?php 
            if(!empty($about_body_text_left)): echo '<div class="col-6">'.$about_body_text_left.'</div>'; endif;
            if(!empty($about_body_text_right)): echo '<div class="col-6">'.$about_body_text_right.'</div>'; endif;
            ?>
        </div>
    </div>
</section>
<?php 
$about_50_image = wp_get_attachment_image(get_field('about_50_image'),'large');
$about_50_body_text = get_field('about_50_body_text');
?>
<section class="home-sec4 braces_sec2 text-align-left">
    <div class="container">
        <div class="row">
            <?php 
            if(!empty($about_50_image)): echo '<div class="col-6">'.$about_50_image.'</div>'; endif; 
            if(!empty($about_50_body_text)): echo '<div class="col-6">'.$about_50_body_text.'</div>'; endif; 
            ?>
        </div>
    </div>
</section>

<?php 
get_footer(); 
?>
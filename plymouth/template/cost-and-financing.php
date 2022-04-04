<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Cost and Financing */
get_header();

get_template_part('/template-part/inner-banner');

$costsec1_heading = get_field('costsec1_heading');
$costsec1_body_text = get_field('costsec1_body_text');
$costsec1_button_text = get_field('costsec1_button_text');
$costsec1_button_link = get_field('costsec1_button_link');
$costsec1_image = wp_get_attachment_image(get_field('costsec1_image'),'medium_large');
?>
<div id="content">
    <section class="braces-sec1">
        <div class="container">
            <?php if(!empty($costsec1_heading)): echo '<h2 class="center section-title">'.$costsec1_heading.'</h2>'; endif; ?>
            <div class="row align-items-center">
                <?php 
                if(!empty($costsec1_image)): echo '<div class="col-6">'.$costsec1_image.'</div>'; endif; 
                if(!empty($costsec1_body_text)):
                ?>
                <div class="col-6">
                    <?php 
                    echo $costsec1_body_text;
                    if(!empty($costsec1_button_text)): echo ' <a href="'.$costsec1_button_link.'" class="blue_button">'.$costsec1_button_text.'</a>'; endif;
                   ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if(have_rows('costsec1_accordion')): ?>
            <div class="acc-sec mt_100">
                <div class="acc">
                    <?php 
                    while(have_rows('costsec1_accordion')): the_row();
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    ?>
                    <div class="acc__card">
                        <?php 
                        if(!empty($heading)): echo '<div class="acc__title">'.$heading.'</div>'; endif;
                        if(!empty($body_text)): echo '<div class="acc__panel"><p>'.$body_text.'</p></div>'; endif;
                        ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php 
    $costsec2_heading = get_field('costsec2_heading');
    $costsec2_body_text = get_field('costsec2_body_text');
    ?>
    <section class="home-sec4 braces_sec2 text-align-left">
        <div class="container">
            <?php 
            if(!empty($costsec2_heading)): echo '<h2 class="center section-title">'.$costsec2_heading.'</h2>'; endif; 
            echo $costsec2_body_text;
            ?>
        </div>
    </section>
</div>
<?php 
get_footer(); 
?>
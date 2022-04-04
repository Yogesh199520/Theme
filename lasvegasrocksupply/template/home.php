<?php
/*==============================*/
// @package Paradise
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Home */

get_header();

$banner_image = wp_get_attachment_image(get_field('banner_image'),'full');
$banner_heading = get_field('banner_heading');
$banner_sub_heading = get_field('banner_sub_heading');
?>
<div class="banner">
    <?php 
    echo $banner_image; 
    if(!empty($banner_heading || $banner_sub_heading)):
    ?>
    <div class="banner_layer">
        <div class="container">
            <?php 
            if(!empty($banner_heading)): echo '<h1>'.$banner_heading.'</h1>'; endif; 
            if(!empty($banner_sub_heading)): echo ' <h2>'.$banner_sub_heading.'</h2>'; endif; 
            ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<div id="content">
    <?php if(have_rows('services')): ?>
    <section class="section1">
        <div class="container">
            <div class="white_sec">
                <div class="row">
                    <?php 
                    while(have_rows('services')): the_row(); 
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                    $text = get_sub_field('text');
                    ?>
                    <div class="col-3">
                        <?php 
                        echo $icon;
                        if(!empty($text)): echo '<h4>'.$text.'</h4>'; endif; 
                        ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php 
    endif;
    if(have_rows('browse')): 
    ?>
    <section class="section2">
        <div class="container">
            <div class="row">
                <?php 
                while(have_rows('browse')): the_row(); 
                $image = wp_get_attachment_image(get_sub_field('image'),'medium');
                $heading = get_sub_field('heading');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                ?>
                <div class="col-3">
                    <?php 
                    if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                    echo $image;
                    if(!empty($button_text)): echo '<a href="'.$button_link.'" class="btn1" target="_blank">'.$button_text.'</a>'; endif;
                    ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php 
    endif;
    $full_image = wp_get_attachment_image(get_field('full_image'),'full');
    if(!empty($full_image)):
    ?>
    <section class="section3">
        <div class="container">
            <?php echo $full_image; ?>
        </div>
    </section>
    <?php endif; ?>
</div>


<?php
get_footer(); 
?>
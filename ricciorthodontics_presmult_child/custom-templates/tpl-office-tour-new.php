<?php 

/* Template Name: Office Tour New */

get_header(); the_post(); 

?> 
<div class="page-title" style="background: url(<?php the_field('banner_section_background');?>) no-repeat center 0;">
    <div class="container">
        <div class="page-title-head">
            <?php if(get_field('banner_section_title')){ ?>
                <h1><?php the_field('banner_section_title'); ?></h1>
            <?php } ?>
        </div>
        <div class="page-title-breadcrumbs">
            <ol class="breadcrumbs">
                <?php get_breadcrumb(); ?>
            </ol>
        </div>
    </div>
</div>
<?php
$intro_heading = get_field('intro_heading');
$intro_body_text = get_field('intro_body_text');
if(!empty($intro_body_text)):
?>
<section class="page-sec" id="section-one">
    <div class="container">
        <div class="info-text">
            <?php 
            if(!empty($intro_heading)): echo '<h2>'.$intro_heading.'</h2>'; endif; 
            echo $intro_body_text;
            ?>
        </div>
    </div>
</section>
<?php 
endif;
$content_heading = get_field('content_heading');
$content_body_text = get_field('content_body_text');
$content_image = wp_get_attachment_image(get_field('content_image'),'medium_large');
if(!empty($content_body_text)):
?>
<section class="page-sec" id="section-two">
    <div class="container">
        <?php if(!empty($content_image)): ?>
        <div class="left-content">
            <?php echo $content_image; ?>
        </div>
        <?php endif; ?>
        <div class="right-content">
            <?php 
            if(!empty($content_heading)): echo '<h2>'.$content_heading.'</h2>'; endif; 
            echo $content_body_text;
            ?>
        </div>
    </div>
</section>
<?php 
endif;
$gallery_heading = get_field('gallery_heading');
$images = get_field('new_gallery');
if($images): 
?>
<section class="page-sec" id="section-three">
    <div class="container">
        <div class="center-content">
             <?php if(!empty($gallery_heading)): echo '<h2>'.$gallery_heading.'</h2>'; endif; ?>
            <div class="tour">
                <?php foreach( $images as $image ): ?>
                    <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="images">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="150px" height="150px" />
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php 
endif;
$center_heading = get_field('center_heading');
$center_body_text = get_field('center_body_text');
if(!empty($center_body_text)):
?>
<section class="page-sec" id="section-four">
    <div class="container">
        <div class="info-text">
            <?php 
            if(!empty($center_heading)): echo '<h2>'.$center_heading.'</h2>'; endif; 
            echo $center_body_text;
            ?>
        </div>
    </div>
</section>
<?php 
endif;
$acc_heading = get_field('acc_heading');
if(have_rows('accordion')): 
?>
<section class="page-sec" id="section-five">
    <div class="container">
        <div class="accordition">
            <?php if(!empty($acc_heading)): echo '<h2>'.$acc_heading.'</h2>'; endif; ?>
            <div class="accordition-wrapper">
                <ul class="slides">
                    <?php 
                    while(have_rows('accordion')): the_row(); 
                    $heading = get_sub_field('heading');
                    $text = get_sub_field('text');
                    ?>
                        <li>
                            <?php 
                            if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                            echo $text;
                            ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        
    </div>
</section>
<?php 
endif; 
$contact_body_text = get_field('contact_body_text');
$button_text = get_field('button_text');
$button_link = get_field('button_link');
if(!empty($contact_body_text)):
?>
<section class="page-sec" id="section-six">
    <div class="container">
        <div class="contact-us">
            <?php 
            echo $contact_body_text; 
            if(!empty($button_text)): echo ' <a href="'.$button_link.'" class="btn contact-us">'.$button_text.'</a>'; endif; ?>
        </div>
    </div>
</section>

<?php 
endif;

get_footer(); 
?>
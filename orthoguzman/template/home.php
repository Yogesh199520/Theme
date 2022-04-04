<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */

get_header();

$video = get_field('video');
$video_heading = get_field('video_heading');
$video_button_text = get_field('video_button_text');
$video_button_link = get_field('video_button_link');
if(!empty($video)):
?>  
<section class="home-banner-sec">
    <video class="welcomeVid" preload="auto" autoplay="" loop="" muted="" playsinline="">
        <source type="video/mp4" src="<?php echo $video; ?>" />
    </video>
    <?php if(!empty($video_heading || $video_button_text)): ?>
    <div class="banne-layer">
        <div class="container">
            <div class="banner-txt">
                <?php  
                if(!empty($video_heading)): echo '<h1>'.$video_heading.'</h1>'; endif; 
                if(!empty($video_button_text)): echo '<a href="'.$video_button_link.'" class="banner-btn">'.$video_button_text.'</a>'; endif; 
                ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<?php 
endif;
$guzman_heading = get_field('guzman_heading');
$guzman_body_text = get_field('guzman_body_text');
$guzman_image = wp_get_attachment_image(get_field('guzman_image'),'medium_large');
$guzman_button_text = get_field('guzman_button_text');
$guzman_button_link = get_field('guzman_button_link');
?>
<div id="content">

    <section class="homepage-sec1">
        <div class="container">
            <div class="row">
                <?php 
                if(!empty($guzman_image)): echo '<div class="col-6"><div class="border_image">'.$guzman_image.'</div></div>'; endif; 
                if(!empty($guzman_body_text)):
                ?>
                <div class="col-6">
                    <?php 
                    if(!empty($guzman_heading)): echo '<h2 class="sec_title">'.$guzman_heading.'</h2>'; endif; 
                    echo $guzman_body_text;
                    if(!empty($guzman_button_text)): echo ' <a href="'.$guzman_button_link.'" class="banner-btn">'.$guzman_button_text.'</a>'; endif; 
                    ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php 
    $testimonial_heading = get_field('testimonial_heading');
    $read_more_review = get_field('read_more_review');
    $leave_us_a_review = get_field('leave_us_a_review');
    if(have_rows('testimonials')):
    ?>
    <section class="homepage-sec3 simple_slider">
        <div class="container">
            <?php if(!empty($testimonial_heading)): echo '<h2 class="center sec_title">'.$testimonial_heading.'</h2>'; endif; ?>
            <div class="flexslider">
                <ul class="slides">
                    <?php 
                    while(have_rows('testimonials')): the_row();
                    $name = get_sub_field('name');
                    $quotes = get_sub_field('quotes');
                    ?>
                    <li>
                        <p><?php echo $quotes; ?></p>
                        <p><strong><?php echo $name; ?></strong></p>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php if(!empty($read_more_review || $leave_us_a_review)): ?>
            <div class="buttons_row">
                <?php 
                if(!empty($read_more_review)): echo '<a class="banner-btn" href="'.$read_more_review.'">READ MORE REVIEWS</a>'; endif;
                if(!empty($leave_us_a_review)): echo '<a class="banner-btn" href="'.$leave_us_a_review.'" target="_blank">LEAVE US A REVIEW</a>'; endif;
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php 
    endif;
    $name = get_field('name');
    $designation = get_field('designation');
    $about_dr = get_field('about_dr');
    $meetdr_button_text = get_field('meetdr_button_text');
    $meetdr_button_link = get_field('meetdr_button_link');
    $photo = wp_get_attachment_image(get_field('photo'),'medium_large');
    ?>
    <section class="homepage-dr-sec" style="background-image: url(<?php echo IMG.'patern.png'; ?>);">
        <div class="container">
            <div class="row">
                <?php if(!empty($photo)): echo '<div class="col-6">'.$photo.'</div>'; endif; ?>
                <div class="col-6">
                    <?php 
                    if(!empty($name)): echo '<h2 class="sec_title">'.$name.'</h2>'; endif;
                    if(!empty($designation)): echo '<p><strong>'.$designation.'</strong></p>'; endif;
                    echo $about_dr;
                    if(!empty($meetdr_button_text)): echo '<a href="'.$meetdr_button_link.'" class="banner-btn">'.$meetdr_button_text.'</a>'; endif;
                    ?>
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                    <div class="line4"></div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    $invisalign_heading = get_field('invisalign_heading');
    $invisalign_short_text = get_field('invisalign_short_text');
    $invisalign_video = get_field('invisalign_video');
    $invisalign_button_text = get_field('invisalign_button_text');
    $invisalign_button_link = get_field('invisalign_button_link');
    if(!empty($invisalign_video)):
    ?>
    <section class="homepage-invi-sec">
        <div class="container">
            <?php 
            if(!empty($invisalign_heading)): echo '<h2 class="sec_title center">'.$invisalign_heading.'</h2>'; endif;
            if(!empty($invisalign_short_text)): echo '<p>'.$invisalign_short_text.'</p>'; endif;
            echo '<div class="videobox">'.$invisalign_video.'</div>';
            if(!empty($invisalign_button_text)): echo '<div class="buttons_row"><a class="grey-btn" href="'.$invisalign_button_link.'">'.$invisalign_button_text.'</a></div>'; endif;
            ?>
        </div>
    </section>
    <?php 
    endif;
    $services_heading = get_field('services_heading');
    $services_button_text = get_field('services_button_text');
    $services_button_link = get_field('services_button_link');
    if(have_rows('services')):
    ?>
    <section class="homepage-sec4">
        <div class="container">
            <?php if(!empty($services_heading)): echo '<h2 class="sec_title center">'.$services_heading.'</h2>'; endif; ?>
            <div class="row">
                <?php 
                while(have_rows('services')): the_row();
                $heading = get_sub_field('heading');
                $text = get_sub_field('text');
                $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                ?>
                <div class="service-box">
                    <div class="service-box_img">
                        <?php 
                        echo $image;
                        if(!empty($heading)): echo '<div class="service-box-text"><h3>'.$heading.'</h3></div>'; endif;
                        ?>
                    </div>
                    <div class="service-text-sec">
                        <?php 
                        if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                        if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                        ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php if(!empty($services_button_text)): echo '<div class="buttons_row"><a href="'.$services_button_link.'" class="banner-btn">'.$services_button_text.'</a></div>'; endif; ?>
        </div>
    </section>
    <?php 
    endif;
    $get_heading = get_field('get_heading');
    $get_sub_heading = get_field('get_sub_heading');
    $get_button_text = get_field('get_button_text');
    $get_button_link = get_field('get_button_link');
    $get_image = wp_get_attachment_image(get_field('get_image'),'medium_large');
    $get_bg_image = wp_get_attachment_image_url(get_field('get_bg_image'),'full');
    ?>
    <section class="homepage-sec2" style="background-image: url(<?php echo $get_bg_image; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <?php 
                    if(!empty($get_heading)): echo '<h2>'.$get_heading.'</h2>'; endif; 
                    if(!empty($get_sub_heading)): echo '<p>'.$get_sub_heading.'</p>'; endif;
                    if(have_rows('logo_list')):
                    ?>
                    <ul>
                        <?php 
                        while(have_rows('logo_list')): the_row();
                        $text = get_sub_field('text');
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                        echo '<li><span>'.$icon.'</span>'.$text.'</li>';
                        endwhile;
                        ?>
                    </ul>
                    <?php 
                    endif;
                    if(!empty($get_button_text)): echo '<a class="banner-btn" href="'.$get_button_link.'">'.$get_button_text.'</a>'; endif;
                    ?>
                </div>
                <?php if(!empty($get_image)): echo '<div class="col-6"><div class="bottom-img">'.$get_image.'</div></div>'; endif; ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
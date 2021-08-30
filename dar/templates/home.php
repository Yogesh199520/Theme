<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */
get_header();

if(have_rows('slider')):
?>
<!--============================== Hero  Start ==============================-->
<div class="hero-outer">
    <div class="hero-container d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="hero-box">
                        <div class="hero-content-box">
                            <div class="hero-text-box hero-slider pb-0">
                                <?php while(have_rows('slider')): the_row();
                                $heading = get_sub_field('heading');
                                $sub_heading = get_sub_field('sub_heading');
                                $text = get_sub_field('text');
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                ?>
                                <div>
                                    <div class="hero-slide os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <?php if(!empty($heading)): echo '<div class="hero-slide-upper"><h3>'.$heading.'</h3></div>'; endif;?>
                                        <div class="hero-slide-lower">
                                            <?php 
                                            if(!empty($sub_heading)): echo '<h4>'.$sub_heading.'</h4>'; endif;
                                            if(!empty($text)): echo '<p>'.$text.'</p>'; endif;  
                                            if(!empty($button_text && $button_link)): echo '<a href="'.$button_link.'" class="btn btn-default">'.$button_text.'</a>'; endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-image-slider">
        <?php while(have_rows('slider')): the_row();
        $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'full');
        ?>
        <div>
            <div class="hero-slide d-flex align-items-center" style="background-image: url(<?php echo $bg_image; ?>);"></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!--============================== Hero  End ==============================-->
<?php endif;

$lu_heading = get_field('lu_heading');
$lu_edu_heading = get_field('lu_edu_heading');
$lu_skill_heading = get_field('lu_skill_heading');
$select_events = get_field('lu_select_events');
$ppp = (empty($select_events)?3:-1);
$event_query = new WP_Query(array('post_type'=>'events', 'posts_per_page'=>$ppp, 'post__in'=>$select_events));
$select_student_experience = get_field('lu_select_student_experience');
$ppp = (empty($select_student_experience)?3:-1);
$student_experience_query = new WP_Query(array('post_type'=>'alumni_stories', 'posts_per_page'=>$ppp, 'post__in'=>$select_student_experience));
$select_gallery = get_field('lu_select_gallery');
$ppp = (empty($select_gallery)?3:-1);
$skill_gallery = new WP_Query(array('post_type'=>'gallary', 'posts_per_page'=>$ppp, 'post__in'=>$select_gallery));
if($event_query->have_posts() || $student_experience_query->have_posts() || $skill_gallery->have_posts()):
?>
<!--============================== Content Start ==============================-->
<div class="content-container home-post-list">
    <div class="container">
        <div class="row align-items-end">
            <?php if($event_query->have_posts()): ?>
            <div class="col-lg-4">
                <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text"><?php echo $lu_heading; ?></h5></div>
                <ul class="home-posts-list home-posts-slider mb-4 mb-lg-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($event_query->have_posts()): $event_query->the_post();
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                    ?>
                    <li class="home-posts-item">
                        <div class="home-posts-box" style="background-image:url('<?php echo $featured_img; ?>');">
                            <div class="home-posts-desc">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="btn-hover color-2">Know more</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php
            endif;

            if($student_experience_query->have_posts()): ?>
            <div class="col-lg-4">
                <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text"><?php echo $lu_edu_heading; ?></h5></div>
                <ul class="home-posts-list home-posts-slider mb-4 mb-lg-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($student_experience_query->have_posts()): $student_experience_query->the_post();
                    $featured_img = wp_get_attachment_image_url(get_field('image',get_the_ID()),'medium_large');
                    ?>
                    <li class="home-posts-item">
                        <div class="home-posts-box" style="background-image:url('<?php echo $featured_img; ?>');">
                            <div class="home-posts-desc">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="btn-hover color-2">Know more</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php
            endif;

            if($skill_gallery->have_posts()): ?>
            <div class="col-lg-4">
                <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text"><?php echo $lu_skill_heading; ?></h5></div>
                <ul class="home-posts-list home-posts-slider os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($skill_gallery->have_posts()): $skill_gallery->the_post();
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                    ?>
                    <li class="home-posts-item">
                        <div class="home-posts-box" style="background-image:url('<?php echo $featured_img; ?>');">
                            <div class="home-posts-desc">
                                <h3><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="btn-hover color-2">Know more</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                </ul>
            </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;


$welcome_heading = get_field('welcome_heading');
$welcome_body_text = get_field('welcome_body_text');
$welcome_image = wp_get_attachment_image(get_field('welcome_image'),'medium_large');
$welcome_name = get_field('welcome_name');
$welcome_destination = get_field('welcome_destination');
if(!empty($welcome_body_text)):
?>
<!--============================== Content Start ==============================-->
<div class="home-intro-container gradient-bg">
    <div class="container container1">
        <div class="row">
            <?php if(!empty($welcome_body_text)): ?>
            <div class="col-md-6 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <?php 
                if(!empty($welcome_heading)): echo '<div class="heading"><h4>'.$welcome_heading.'</h4></div>'; endif;
                echo $welcome_body_text;  
                ?>
            </div>
            <?php 
            endif;
            if(!empty($welcome_image)):
            ?>
            <div class="col-md-6">
                <div class="intro-image-box text-right os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php 
                    if(!empty($welcome_image)): echo '<div class="image-box">'.$welcome_image.'</div>'; endif;
                    if(!empty($welcome_name)): echo '<h5>'.$welcome_name.'</h5>'; endif;
                    if(!empty($welcome_destination)): echo '<p>'.$welcome_destination.'</p>'; endif; 
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;

$home_heading = get_field('home_heading');
if(have_rows('focus_areas')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <?php if(!empty($home_heading)): echo '<div class="heading gradient os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">'.$home_heading.'</h5></div>'; endif; ?>
                <ul class="card-list d-md-flex flex-wrap justify-content-center mobile-slider white-dots">
                    <?php
                    while(have_rows('focus_areas')): the_row();
                    $heading = get_sub_field('heading');
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');    
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    $index = get_row_index();
                    ?>
                    <li class="card-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $index+2; ?>s">
                        <div class="card-box d-flex flex-column align-items-center">
                            <?php 
                            if(!empty($icon)): echo '<div class="card-img">'.$icon.'</div>'; endif; 
                            if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                            if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;    
                            if(!empty($button_text)): echo '<div class="card-btn"><a href="'.$button_link.'" class="btn btn-primary">'.$button_text.'</a></div>'; endif;
                            ?>
                        </div>
                    </li>
                   <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>
<?php
/*==============================*/
// @package Plymouth
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */
get_header();


$video = get_field('video');
$map_link = get_field('map_link');
$banner_heading = get_field('banner_heading');
$phone = get_field('phone');
$address = get_field('address');
if(!empty($video)):
?>
<div class="banner">
    <video class="videoauto" width="640" height="810" preload="auto" autoplay="" loop="" muted="" playsinline="">
        <source src="<?php echo $video; ?>" type="video/mp4" />
    </video>
    <div class="banner_layer">
        <div class="container">
            <?php if(!empty($map_link)): ?>
            <div class="banner_map">
                <a target="_blank" href="<?php echo $map_link; ?>">
                    <img width="500" height="500" src="<?php echo IMG.'map.png'; ?>" alt="map" loading="lazy"/>
                </a>
            </div>
            <?php endif; ?>
            <div class="banner_address">
                <?php 
                if(!empty($banner_heading)): echo '<h2>'.$banner_heading.'</h2>'; endif; 
                if(!empty($phone)): echo '<p>'.$phone.'</p>'; endif; 
                if(!empty($address)): echo '<p>'.$address.'</p>'; endif; 
                ?>

            </div>
        </div>
    </div>
</div>
<?php 
endif; 
if(have_rows('page_link')):
?>
<section class="home-sec0">
    <?php 
    while(have_rows('page_link')): the_row();
    $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
    $logo = wp_get_attachment_image(get_sub_field('logo'),'medium');
    $page_ttitle = get_sub_field('page_ttitle');
    $page_link = get_sub_field('page_link');
    ?>
    <div class="service_block">
        <a href="<?php echo $page_link; ?>">
            <?php echo $image; ?>
            <h4>
                <?php 
                echo $page_ttitle; 
                if(!empty($logo)): echo '<span class="logo2022">'.$logo.'</span>'; endif;
                ?>
            </h4>
        </a>
    </div>
    <?php endwhile; ?>
</section>
<?php 
endif; 
$about_sec_heading = get_field('about_sec_heading');
$about_sec_image = wp_get_attachment_image(get_field('about_sec_image'),'large');
$about_sec_body_text = get_field('about_sec_body_text');
$about_sec_button_text = get_field('about_sec_button_text');
$about_sec_button_link = get_field('about_sec_button_link');
?>
<section class="home-sec1">
    <div class="row align-items-center">
        <?php 
        if(!empty($about_sec_image)): echo '<div class="col-6">'.$about_sec_image.'</div>'; endif; 
        if(!empty($about_sec_body_text)):
        ?>
        <div class="col-6">
            <div class="right_text">
                <?php 
                if(!empty($about_sec_heading)): echo '<h2 class="section-title">'.$about_sec_heading.'</h2>'; endif;
                echo $about_sec_body_text;
                if(!empty($about_sec_button_text)): echo '<a class="blue_button" href="'.$about_sec_button_link.'">'.$about_sec_button_text.'</a>'; endif;
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
$testimonail_heading = get_field('testimonail_heading');
$testimonail_bg_image = wp_get_attachment_image_url(get_field('testimonail_bg_image'),'full');
$select_testimonails = get_field('select_testimonails');
if($select_testimonails):
?>
<section class="home-sec5 simple_slider" style="background-image: url(<?php echo $testimonail_bg_image; ?>);">
    <div class="container">
        <div class="flexslider">
            <?php if(!empty($testimonail_heading)): echo '<h2 class="section-title">'.$testimonail_heading.'</h2>'; endif; ?>
            <ul class="slides">
                <?php  
                foreach($select_testimonails as $testi_id):
                $logo = wp_get_attachment_image(get_field('logo',$testi_id),'medium');
                $name = get_field('name',$testi_id);
                $quotes = get_field('quotes',$testi_id);
                ?>
               <li>
                    <?php 
                    if(!empty($quotes)): echo '<p>'.$quotes.'</p>'; endif;
                    echo '<h6>'.(!empty($name)?$name:get_the_title($testi_id)).' | '.get_the_date('M Y').' </h6>';
                    echo '<div class="stars"><img src="'.IMG.'star.png" alt="star" loading="lazy" /></div>';
                    if(!empty($logo)): echo '<div class="google2">'.$logo.'</div>'; endif;
                    ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<?php 
endif;
$your_ortho_heading = get_field('your_ortho_heading');
$your_ortho_image = wp_get_attachment_image(get_field('your_ortho_image'),'large');
$your_ortho_body_text = get_field('your_ortho_body_text');
$your_ortho_button_text = get_field('your_ortho_button_text');
$your_ortho_button_link = get_field('your_ortho_button_link');
?>
<section class="home-sec3">
    <div class="container">
        <div class="row align-items-center">
           <?php 
            if(!empty($your_ortho_image)): echo '<div class="col-6">'.$your_ortho_image.'</div>'; endif; 
            if(!empty($your_ortho_body_text)):
            ?>
            <div class="col-6">
                <?php 
                if(!empty($your_ortho_heading)): echo '<h2 class="section-title">'.$your_ortho_heading.'</h2>'; endif;
                echo $your_ortho_body_text;
                if(!empty($your_ortho_button_text)): echo '<a class="blue_button" href="'.$your_ortho_button_link.'">'.$your_ortho_button_text.'</a>'; endif;
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php 
$why_heading = get_field('why_heading');
$why_body_tex = get_field('why_body_tex');
$why_button_text = get_field('why_button_text');
$why_button_link = get_field('why_button_link');
if(have_rows('why_plymouth')):
?>
<section class="home-sec4">
    <div class="container">
        <?php 
        if(!empty($why_heading)): echo '<h2 class="section-title">'.$why_heading.'</h2>'; endif; 
        if(!empty($why_body_tex)): echo '<p class="mb_50">'.$why_body_tex.'</p>'; endif; 
        ?>
        <div class="row">
            <?php 
            while(have_rows('why_plymouth')): the_row();
            $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
            $heading = get_sub_field('heading');
            $text = get_sub_field('text');
            ?>
            <div class="step_box">
                <?php 
                if(!empty($icon)): echo '<span class="step_icon">'.$icon.'</span>'; endif;
                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                ?>
            </div>
            <?php endwhile; ?>
        </div>
        <?php 
        if(!empty($why_button_text)): echo '<a class="blue_button" href="'.$why_button_link.'">'.$why_button_text.'</a>'; endif;
        ?>
    </div>
</section>
<?php 
endif;
$age_heading = get_field('age_heading');
$age_image = wp_get_attachment_image(get_field('age_image'),'large');
$age_body_text = get_field('age_body_text');
$age_button_text = get_field('age_button_text');
$age_button_link = get_field('age_button_link');
?>
<section class="home-sec1">
    <div class="row">
        <?php 
        if(!empty($age_image)): echo '<div class="col-6">'.$age_image.'</div>'; endif; 
        if(!empty($age_body_text)):
        ?>
        <div class="col-6">
            <div class="right_text">
                <?php 
                if(!empty($age_heading)): echo '<h2 class="section-title">'.$age_heading.'</h2>'; endif;
                echo $age_body_text;
                if(!empty($age_button_text)): echo '<a class="blue_button" href="'.$age_button_link.'">'.$age_button_text.'</a>'; endif;
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php 
$org_heading = get_field('org_heading');
if(have_rows('plymouth_organizations')):
?>
<section class="home-sec6">
    <div class="container">
        <?php if(!empty($org_heading)): echo '<h2 class="section-title center">'.$org_heading.'</h2>'; endif; ?>
        <div class="row">
            <?php 
            while(have_rows('plymouth_organizations')): the_row();
            $logo = wp_get_attachment_image(get_sub_field('logo'),'medium');
            $url = get_sub_field('url');
            echo '<div class="partner"><a href="'.$url.'" target="_blank">'.$logo.'</a></div>';
            endwhile; 
            ?>
        </div>
    </div>
</section>
<?php 
endif;
$insta_heading = get_field('insta_heading');
$insta_shortcode = get_field('insta_shortcode');
if(!empty($insta_shortcode)):
?>
<section class="home-insta">
    <div class="container">
        <?php if(!empty($insta_heading)): echo '<h2 class="section-title center">'.$insta_heading.'</h2>'; endif; ?>
        <?php echo do_shortcode($insta_shortcode); ?>
    </div>
</section>
<?php 
endif;

get_footer(); 
?>
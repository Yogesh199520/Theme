<?php
/*==============================*/
// @package Susan
// @author Thinkeq
/*==============================*/
/* Template Name: Homepage */
get_header();

$hero_frame_one = wp_get_attachment_image(get_field('hero_frame_one'),'thumbnail');
$hero_frame_two = wp_get_attachment_image(get_field('hero_frame_two'),'thumbnail');
$home_image = wp_get_attachment_image(get_field('home_image'),'medium');
$intro_body_text = get_field('intro_body_text');
?>
<!--============================== Hero container Start ==============================-->
<div class="hero-container d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="hero-content">
                    <?php if(!empty($hero_frame_one || $hero_frame_two)): ?>
                    <div class="hero-content-upper d-flex flex-wrap justify-content-center">
                        <?php if(!empty($hero_frame_one)): ?>
                        <div class="hero-frame1">
                            <img src="<?php echo IMG.'hero-frame1.svg'; ?>" alt="hero-frame1" />
                            <div class="hero-frame1-img"><?php echo $hero_frame_one; ?></div>
                        </div>
                        <?php 
                        endif;
                        if(!empty($hero_frame_two)): 
                        ?>
                        <div class="hero-frame2">
                            <img src="<?php echo IMG.'hero-frame2.svg'; ?>" alt="hero-frame2" />
                            <div class="hero-frame2-img"><?php echo $hero_frame_two; ?></div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php 
                    endif;
                    if(!empty($intro_body_text)): 
                    ?>
                    <div class="hero-content-lower d-flex flex-wrap">
                        <?php if(!empty($home_image)): echo '<div class="hero-lower-left"> <div class="hero-character">'.$home_image.'</div></div>'; endif; ?>
                        <div class="hero-lower-right">
                            <div class="hero-content-box">
                                <?php echo $intro_body_text; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Hero container End ================================-->
<?php 
$home_icon = wp_get_attachment_image(get_field('home_icon'),'thumbnail');
$video_heading = get_field('video_heading');
$home_icon_url = get_field('home_icon_url');
if(have_rows('latest_video')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container latest-video-container">
    <div class="container">
        <div class="row">
            <?php 
            while(have_rows('latest_video')): the_row();
            if(get_row_layout() == 'image'):
            $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
            $link = get_sub_field('link'); 
            ?>
            <div class="col-lg-6">
                <a class="media-box" href="<?php echo $link; ?>" target="_blank"><?php echo $image; ?></a>
            </div>
            <?php 
            elseif(get_row_layout() == 'video'):
            $embed_video = get_sub_field('embed_video');  
            ?>
                <div class="col-lg-6">
                    <div class="media-box embed-container"><?php echo $embed_video; ?></div>
                </div>
            <?php 
            endif;
            endwhile;
            if(!empty($video_heading)): 
            ?>
            <div class="col-lg-6">
                <div class="latest-video-content d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="latest-video-icon"><img src="<?php echo IMG.'inner-hero-graphics.svg'; ?>" alt="inner-hero-graphics" /></div>
                    <?php 
                    if(!empty($video_heading)): echo '<h2>'.$video_heading.'</h2>'; endif; 
                    if(!empty($home_icon)): echo '<a class="latest-video-logo" href="'.$home_icon_url.'" target="_blank">'.$home_icon.'</a>'; endif; 
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Social Cta container Start ==============================-->
<?php
endif; 
get_template_part('template-part/social-links'); 
?>
<!--============================== Cta container End ==============================-->
<!--============================== Content Start ==============================-->
<?php
$tweet_options = get_option('ctf_options');
$tweet_screenname = $tweet_options['usertimeline_text'];
?>
<div class="content-container twitter-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="twitter-content text-center">
                    <div class="heading">
                        <h3>
                            What’s in the Twitter tray?<br />
                            <b>@<?php echo $tweet_screenname; ?></b>
                        </h3>
                    </div>
                    <div class="twitter-content"><?php echo do_shortcode('[custom-twitter-feeds class="sc-twiiter-feed"]'); ?></div>
                    <div class="twitter-cta">
                        <a href="https://twitter.com/<?php echo $tweet_screenname; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-default">Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
get_footer(); 
?>
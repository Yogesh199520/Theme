<?php
/*==============================*/
// @package American Narrative
// @author SLICEmyPAGE
/*==============================*/
get_header();

$mediaUrl = powerpress_get_enclosure_data(get_the_ID());
if(!empty($mediaUrl['url'])){
    $media = htmlspecialchars($mediaUrl['url']);
}
$episode_no = get_field('episode_no');
?>
<!--============================== inner banner Start ==============================-->
<div class="inner-hero-container background-image d-flex align-items-center" style="background-image:url(<?php echo IMG.'banner-single.png'; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <div class="inner-hero-content text-center">
                    <h1>
                    <?php if(!empty($episode_no)): echo 'Episode no - '.$episode_no; endif; ?>
                    <strong><?php the_title(); ?></strong>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== inner banner End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="latest-episode-panel mt-0 d-md-flex flex-wrap border-top-left-radius overflow-hidden">
                    <?php if(!empty($episode_no)): ?>
                    <div class="pannel-left">
                        <div class="pl-text-box d-flex align-items-center justify-content-center">
                            <h4>Episode<span>No-<?php echo $episode_no; ?></span></h4>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="pannel-right d-flex flex-wrap">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="pr-img-box border-top-left-radius overflow-hidden">
                            <?php the_post_thumbnail(); ?>
                            <div class="post-media-img">
                                <img src="<?php echo IMG.'mic.png'; ?>" alt="mic icon" />
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="pr-text-box d-flex flex-wrap flex-column">
                            <?php if(!empty($episode_no)): echo '<div class="pr-desc"><span>Episode '.$episode_no.'</span></div>'; endif; ?>
                            <h5><?php the_title(); ?></h5>
                            <div class="pr-media-box">
                                <?php echo do_shortcode('[powerpress]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php while(have_posts()): the_post(); the_content(); endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
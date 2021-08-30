<?php
/*==============================*/
// @package American Narrative
// @author SLICEmyPAGE
/*==============================*/
get_header();

$pid = get_option('page_for_posts');
$authentic_stories_normal_heading = get_field('authentic_stories_normal_heading',$pid);
$authentic_stories_bold_heading = get_field('authentic_stories_bold_heading',$pid);
if(have_posts()):
$query = new WP_Query( array( 'post_type'=>'post', 'posts_per_page'=>1 ) );
?>
<!--============================== Content End ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.3s" style="animation-delay: 0.3s;">
                <div class="heading mb-0">
                <?php
                if(!empty($authentic_stories_normal_heading)): echo '<h6>'.$authentic_stories_normal_heading.'</h6>'; endif;
                if(!empty($authentic_stories_bold_heading)): echo '<h5>'.$authentic_stories_bold_heading.'</h5>'; endif;
                ?> 
                </div>
                <?php
                while($query->have_posts()): $query->the_post();
                $episode_no = get_field('episode_no');
                $mediaUrl = powerpress_get_enclosure_data(get_the_ID());
                if(!empty($mediaUrl['url'])){
                    $media = htmlspecialchars($mediaUrl['url']);
                }
                ?>
                <div class="latest-episode-panel d-md-flex flex-wrap border-top-left-radius overflow-hidden">
                    <div class="pannel-left">
                        <div class="pl-text-box  d-flex align-items-center justify-content-center">
                            <h4>latest<span>Episode</span></h4>
                        </div>
                    </div>
                    <div class="pannel-right d-flex flex-wrap">
                        <?php if(has_post_thumbnail()) : ?>
                        <div class="pr-img-box border-top-left-radius overflow-hidden">
                            <?php the_post_thumbnail(); ?>
                            <div class="post-media-img">
                                <img src="<?php echo IMG.'mic.png'; ?>" alt="" />
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
                <?php
                the_content();
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Start ==============================-->
<?php
endif;
if(have_posts()):
$query = new WP_Query( array('post_type'=>'post', 'posts_per_page'=>8, 'offset'=>1) );    
?>
<!--============================== Content Start ==============================-->
<div class="content-container episode-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading mb-5">
                    <h6>ALL</h6><h5>EPISODES</h5> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php
                while($query->have_posts()): $query->the_post();
                $mediaDuration = powerpress_get_enclosure_data(get_the_ID());
                if(!empty($mediaDuration['duration']) ) {
                  $duration = htmlspecialchars($mediaDuration['duration']);
                } 
                ?>
                <a href="<?php the_permalink(); ?>"class="episode-box border-top-left-radius d-flex os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
                    <div class="episode-img-box">
                        <?php if(has_post_thumbnail()): ?>
                        <div class="episode-img border-top-left-radius overflow-hidden">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="episode-text-box">
                        <h4><?php the_title(); ?></h4>
                        <?php the_excerpt(); ?>
                        <?php if(!empty($duration)): ?>
                        <div class="episode-time-desk d-flex flex-wrap">
                            <img src="<?php echo IMG.'clock.svg'; ?>" alt="clock icon" />
                            <span><?php echo $duration; ?> min listen</span>
                        </div>
                        <?php endif; ?>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
                <div class="pagination-container d-flex justify-content-end os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s" >
                	<?php ao_wp_pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$normal_heading = get_field('epi_normal_heading',$pid);
$bold_heading = get_field('epi_bold_heading',$pid);
$text = get_field('epi_text',$pid);
$form = get_field('form',$pid);
?>
<!--============================== podcast search container Start ==============================-->
<div class="podcast-search-container background-image d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 os-animation animated fadeInUp" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <div class="ps-box">
                    <ul class="podcast-heading d-flex flex-wrap align-items-center">
                        <?php if(!empty($normal_heading && $bold_heading)) : echo '<li><h1>'.$normal_heading.'<span>'.$bold_heading.'</span></h1></li>'; 
                        endif;
                        if(!empty($text)) : echo '<li><p>'.$text.'</p> </li>';
                        endif; ?>
                    </ul>
                    <?php if(!empty($form)): ?>
                    <div class="podcast-search-box">
                        <?php echo do_shortcode('[contact-form-7 id="'.$form.'"]'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if(have_rows('subscribe_with',$pid)): ?>
                    <ul class="podcast-logo-list d-flex align-items-center justify-content-center">
                        <?php while(have_rows('subscribe_with',$pid)): the_row(); ?>
                        <li>
                            <a href="<?php the_sub_field('url'); ?>" class="pl-logo" target="_blank">
                                <?php echo wp_get_attachment_image(get_sub_field('icon'),'medium'); ?>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== podcast search container End ==============================-->
<?php
get_footer();
?>
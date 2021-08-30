<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Subscribe */
get_header(); 

$subs_bg_image = wp_get_attachment_image_url(get_field('subs_bg_image'),'full');
$subs_normal_heading = get_field('subs_normal_heading');
$subs_bold_heading = get_field('subs_bold_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container background-image subscribe-container" style="background-image:url(<?php echo $subs_bg_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($subs_normal_heading)): ?>
                <div class="heading white os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php
                    echo '<h6>'.$subs_normal_heading.'</h6>';
                    if(!empty($subs_bold_heading)): echo '<h5>'.$subs_bold_heading.'</h5>'; endif;
                    ?>
                </div>
                <?php endif;

                if(have_rows('subscribe')):
                ?>
                <ul class="subscriber-logo-list d-flex flex-wrap os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.38s">
                    <?php
                    while(have_rows('subscribe')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                    $title = get_sub_field('title');
                    $url = get_sub_field('url');
                    ?>
                    <li class="sl-item">
                        <a href="<?php echo $url; ?>" target="_blank" class="sl-box">
                            <div class="sl-logo"><?php echo $icon; ?></div>
                            <h6><?php echo $title; ?></h6>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php else: ?>
                    <h4>Coming Soon...</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php /*echo do_shortcode('[powerpress_subscribe]');*/ ?>   
<?php get_footer(); ?>

<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header(); ?>

<!--============================== Content Start ==============================-->
<div class="content-container events-banner-container gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <?php if(has_post_thumbnail()): ?>
                <div class="events-banner os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
$address = get_field('address');
$contact_map = get_field('contact_map');
$map_link = get_field('map_link');
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad block-container gray-bg pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-content">
                    <div class="block-content-box h-100 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="heading text-center">
                            <h5 class="gradient-text-3"><?php the_title(); ?></h5>
                        </div>
                        <?php 
                        the_content();
                        $bt_button_text = get_field('bt_button_text');
                        $bt_button_link = get_field('bt_button_link');
                        if(!empty($bt_button_link)):
                        ?>
                        <div class="block-btn">
                            <a href="<?php echo $bt_button_link; ?>" class="btn-hover color-2"><?php echo $bt_button_text; ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="block-btn mt-4">
                            <?php echo do_shortcode('[addtoany]'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php if(!empty($address) || !empty($contact_map)): ?>
                <div class="block-content">
                    <div class="block-content-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.32s">
                        <div class="heading text-center">
                            <h5 class="gradient-text-3">Venue</h5>
                        </div>
                        <?php if(!empty($address)): ?>
                        <div class="block-address">
                            <span><?php echo $address; ?></span>
                        </div>
                        <?php 
                        endif;
                        if(!empty($contact_map)): 
                        ?>
                        <div class="block-location">
                            <?php echo $contact_map; ?>
                        </div>
                        <div class="block-btn">
                            <a href="<?php echo $map_link; ?>" target="_blank" class="btn-hover color-2">get directions</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>
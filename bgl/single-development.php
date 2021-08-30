<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
get_header(); 
if('' !== get_post(get_the_ID())->post_content){
?>
<!--============================== Content Start ==============================-->
<div class="content-container intro-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-left text-md-center">
               <?php $content = apply_filters('the_content', get_post(get_the_ID())->post_content); echo $content; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
}

if(have_rows('dev_hero_slider')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container dev-gallery-container p-0">
    <div class="dev-gallery-upper">
        <div class="dev-gallery-image dev-img-slider center-arrow pb-0 white-dots">
            <?php
            while(have_rows('dev_hero_slider')): the_row();
            $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'full');
            $bg_image_mob = wp_get_attachment_image_url(get_sub_field('bg_image_mob'),'large');
            $caption = get_sub_field('caption');
            ?>
            <div class="dev-image-slide">
                <img src="<?php echo $bg_image; ?>" class="d-md-block d-none" />
                <img src="<?php echo $bg_image_mob; ?>" class="d-md-none d-block" />
                <?php if(!empty($caption)): echo '<div class="dev-image-disc text-center"><p>'.$caption.'</p></div>'; endif; ?>
            </div>
           <?php endwhile; ?>
        </div>
    </div>
    <div class="dev-gallery-lower color-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="dev-gallery-text dev-text-slider d-lg-flex flex-lg-wrap pb-0">
                        <?php
                        while(have_rows('dev_hero_slider')): the_row();
                        $pagination_text = get_sub_field('pagination_text');
                        echo '<div class="dev-text-slide"><p>'.$pagination_text.'</p></div>';
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
if(have_rows('dev_page_content')):
while(have_rows('dev_page_content')): the_row();
$class_options = get_sub_field('class_options');
$image_option = get_sub_field('image_option');
$heading = get_sub_field('heading');
$body_text = get_sub_field('body_text');
$image = wp_get_attachment_image(get_sub_field('image'),'large');
?>
<!--============================== Content Start ==============================-->
<div class="content-container mob-pt-0 <?php echo implode(' ', $class_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box d-lg-flex flex-wrap align-items-center <?php echo $image_option; ?>">
                    <?php 
                    if(!empty($image)): echo '<div class="cb-right">'.$image.'</div>'; endif;
                    if(!empty($heading) || !empty($body_text)):  
                    ?>
                    <div class="cb-left d-flex flex-column">
                        <?php 
                        if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                        echo $body_text;
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endwhile;
endif;
$dev_single_show_testimonial = get_field('dev_single_show_testimonial');
$dev_single_select_testimonial = get_field('dev_single_select_testimonial');
if(!empty($dev_single_show_testimonial) && !empty($dev_single_select_testimonial)):
$title = get_field('name',$dev_single_select_testimonial);  
$destination = get_field('destination',$dev_single_select_testimonial);  
$quote = get_field('quote',$dev_single_select_testimonial);  
$author_photo = wp_get_attachment_image(get_field('author_photo',$dev_single_select_testimonial),'medium');  
if(empty($title)):
    $title = get_the_title($dev_single_select_testimonial);
endif;
?>
<!--============================== Content Start ==============================-->
<div class="content-container color-bg2 add-bg-graphic more-opacity add-inner-shadow">
    <div class="container add-index">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <ul class="testimonial-list d-flex flex-wrap justify-content-center">
                    <li class="testimonial-item w-100">
                        <div class="testimonial-box">
                            <?php 
                            if(!empty($author_photo)): echo '<div class="testimonial-img">'.$author_photo.'</div>'; endif; 
                            if(!empty($quote)): echo '<div class="testimonial-text"><p>'.$quote.'</p></div>'; endif; 
                            ?>
                            <div class="testimonial-by">
                                <?php 
                                echo '<span>'.$title.'</span>';
                                if(!empty($destination)): echo '<small>'.$destination.'</small>'; endif;
                                ?>
                            </div>
                        </div>
                    </li>
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
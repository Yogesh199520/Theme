<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Sustainability */
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
if(have_rows('stats')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container color-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12"> 
                <ul class="stats-list d-flex flex-wrap mobile-slider pb-0">
                	<?php 
                	while(have_rows('stats')): the_row();
                    $text = get_sub_field('text');
                    $number = get_sub_field('number');
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                	?>
                    <li class="stats-item">
                        <div class="stats-box">
                            <?php 
                            if(!empty($icon)): echo '<div class="stats-icon">'.$icon.'</div>'; endif;
                            if(!empty($number)): echo '<h3>'.$number.'</h3>'; endif;
                            if(!empty($text)): echo '<h6>'.$text.'</h6>'; endif;
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
if(have_rows('sus_services')):
while(have_rows('sus_services')): the_row();
$class_options = get_sub_field('class_options');
$image_option = get_sub_field('image_option');
$heading = get_sub_field('heading');
$body_text = get_sub_field('body_text');
$image = wp_get_attachment_image(get_sub_field('image'),'large');
?>
<!--============================== Content Start ==============================-->
<div class="content-container <?php echo implode(' ', $class_options); ?> mob-pt-0">
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
                        if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
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

get_footer();
?>
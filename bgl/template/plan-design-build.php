<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Plan, Design & Build */
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
if(have_rows('page_details')):
while(have_rows('page_details')): the_row();
$class_options = get_sub_field('class_options');
$image_option = get_sub_field('image_option');
$heading = get_sub_field('heading');
$body_text = get_sub_field('body_text');
$image = wp_get_attachment_image(get_sub_field('image'),'large');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
?>
<!--============================== Content Start ==============================-->
<div class="content-container mob-pt-0 <?php echo implode(' ', $class_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box d-lg-flex flex-wrap align-items-center <?php echo $image_option; ?>">
               <?php if(!empty($image)): echo '<div class="cb-right">'.$image.'</div>'; endif; ?>
                <div class="cb-left d-flex flex-column">
                    <?php 
                    if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
                    echo $body_text; 
                    if(!empty($button_text)): echo '<div class="cb-cta"><a href="'.$button_link.'" class="btn btn-primary2">'.$button_text.'</a></div>'; endif;
                    ?>
                </div>               
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
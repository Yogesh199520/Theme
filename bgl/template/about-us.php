<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: About US */
get_header();

if('' !== get_post(get_the_ID())->post_content){
?>
<!--============================== Content Start ==============================-->
<div class="content-container intro-container pb-0 mob-pb">
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


if(have_rows('body_content')):
while(have_rows('body_content')): the_row();
$class_options = get_sub_field('class_options');
$image_option = get_sub_field('image_option');
$heading = get_sub_field('heading');
$body_text = get_sub_field('body_text');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
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
	                if(!empty($heading) || !empty($body_text) || !empty($button_text)):  
	                ?>
	                <div class="cb-left d-flex flex-column">
	                	<?php 
	                	if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif;
	                	if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
	                	if(!empty($button_text)): echo '<div class="cb-cta"><a href="'.$button_link.'" class="btn btn-primary2">'.$button_text.'</a></div>'; endif;
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
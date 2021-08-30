<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Plan, Design, & Build Child */
get_header();

$golf_course_body_text = get_field('golf_course_body_text');
$golf_course_right_image = wp_get_attachment_image(get_field('golf_course_right_image'),'large');
if(!empty($golf_course_body_text) || !empty($golf_course_right_image)): 
?>	
<!--============================== Content Start ==============================-->
<div class="content-container mob-pt-0">
    <div class="container">
        <div class="row flex-row-reverse">
        	<?php 
        	if(!empty($golf_course_right_image)): echo '<div class="col-lg-6"><div class="media-box pad-mb">'.$golf_course_right_image.'</div></div>'; endif; 
        	if(!empty($golf_course_body_text)): echo '<div class="col-lg-6"><div class="single-intro">'.$golf_course_body_text.'</div></div>'; endif;
        	?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$golf_services_heading = get_field('golf_services_heading');
$golf_services_button_text = get_field('golf_services_button_text');
$golf_services_button_link = get_field('golf_services_button_link');
if(have_rows('golf_services_list')):
$golf_services_list_count = round(count(get_field('golf_services_list')) / 2);
?>
<!--============================== Content Start ==============================-->
<div class="content-container color-bg add-bg-graphic more-opacity">
    <div class="container">
    	<?php if(!empty($golf_services_heading)): ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="heading text-center">
                    <h3><?php echo $golf_services_heading; ?></h3>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div class="row mb-5">
            <div class="col-lg-4 offset-lg-2 col-md-6">
                <ul class="bullet-list mb-0">
                	<?php
                    while(have_rows('golf_services_list')): the_row();
                        $text = get_sub_field('text');
                        echo '<li>'.$text.'</li>';
                        if($golf_services_list_count == get_row_index()): echo '</ul></div><div class="col-lg-4 offset-lg-1 col-md-6"><ul class="bullet-list mb-0">'; endif; 
                    endwhile; 
                    ?>
                </ul>
            </div>
        </div>
        <?php if(!empty($golf_services_button_text)): ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="<?php echo $golf_services_button_link; ?>" class="btn btn-default"><?php echo $golf_services_button_text; ?></a>
            </div>
        </div>
    	<?php endif; ?>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$add_golf_course_image = wp_get_attachment_image(get_field('add_golf_course_image'),'large');
$add_golf_course_body_text = get_field('add_golf_course_body_text');
$add_golf_course_button_text = get_field('add_golf_course_button_text');
$add_golf_course_button_link = get_field('add_golf_course_button_link');
$add_appearance = get_field('add_appearance');
if($add_appearance == true):
?>
 <!--============================== Content Start ==============================-->
<div class="content-container mob-pt-0">
    <div class="container">
        <div class="row">
        	<?php 
        	if(!empty($add_golf_course_image)): echo '<div class="col-lg-6"><div class="media-box mob-mb">'.$add_golf_course_image.'</div></div>'; endif; 
        	if(!empty($add_golf_course_body_text)):
        	?>
            <div class="col-lg-6">
                <?php 
                echo $add_golf_course_body_text;
                if(!empty($add_golf_course_button_text)): echo '<a href="'.$add_golf_course_button_link.'" class="btn btn-primary">'.$add_golf_course_button_text.'</a>'; endif; 
                ?>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif; 

$golf_course_select_development = get_field('golf_course_select_development');
if(!empty($golf_course_select_development)):
$bg_image = get_the_post_thumbnail_url($golf_course_select_development, 'full');
$excrept = get_the_excerpt($golf_course_select_development);
$link = get_the_permalink($golf_course_select_development);
$icon = wp_get_attachment_image(get_field('dev_icon',$golf_course_select_development),'medium');
?>
<!--============================== Content Start ==============================-->
<div class="related-development-container">
	<a href="<?php echo $link; ?>" class="development-box d-flex flex-column">
        <div class="development-box-img" style="background-image: url(<?php echo $bg_image; ?>);"></div>
        <div class="development-box-content d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    	<?php if(!empty($icon)): echo '<div class="development-box-icon">'.$icon.'</div>'; endif; ?>
                        <h3><?php echo esc_html($golf_course_select_development->post_title); ?></h3>
                        <p><?php echo $excrept; ?></p>
                        <span class="btn btn-default">LEARN MORE</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="development-box-overlay"></div>
    </a>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

get_footer(); 
?>
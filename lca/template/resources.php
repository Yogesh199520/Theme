<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Resources */
get_header();

$resource_intro_heading = get_field('resource_intro_heading');
$resource_intro_sub_heading = get_field('resource_intro_sub_heading');
$resource_intro_bg_image = wp_get_attachment_image_url(get_field('resource_intro_bg_image'),'large');
$resource_intro_body_text = get_field('resource_intro_body_text');
$resource_intro_image_caption = get_field('resource_intro_image_caption');
$resource_intro_button_text = get_field('resource_intro_button_text');
if(have_rows('resource_button_link')):
	while(have_rows('resource_button_link')): the_row();
	if(get_row_layout() == 'page_link'):
	    $url = get_sub_field('page_link');
	    $target = "_self";
	elseif(get_row_layout() == 'external_link'):
	    $url = get_sub_field('external_link');
	    $target = "_blank";
	else:
	    $url = '';
	    $target = "_self";
	endif;
	endwhile;
endif;
?>
<!--============================== Content Container Start =============================-->
<div class="content-container">
    <div class="container">
    	<?php if(!empty($resource_intro_heading || $resource_intro_sub_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($resource_intro_heading)): echo '<h3>'.$resource_intro_heading.'</h3>'; endif;
                    if(!empty($resource_intro_sub_heading)): echo '<h4>'.$resource_intro_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div class="row">
        	<?php 
        	if(!empty($resource_intro_body_text)): echo '<div class="col-md-7">'.$resource_intro_body_text.'</div>'; endif;
        	if(!empty($resource_intro_bg_image)):
        	?>
            <div class="col-md-5">
                <div class="resource-bg">
                    <div class="resource-bg-img background-image" style="background-image: url(<?php echo $resource_intro_bg_image; ?>);">
                        <div class="img-label">
                        	<?php
                        	if(!empty($resource_intro_image_caption)): echo '<h6>'.$resource_intro_image_caption.'</h6>'; endif;
                            if(!empty($resource_intro_button_text)):
                            ?>
                            <div class="iht-btn">
                                <a href="<?php echo $url; ?>" target="<?php echo $target; ?>" class="add-arrow">
                                    <span class="btn btn-primary"><?php echo $resource_intro_button_text; ?></span>
                                    <img src="<?php echo IMG.'dark-arrow.png'; ?>" alt="dark-arrow" />
                                </a>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
$career_resources_heading = get_field('career_resources_heading');
$career_resources_sub_heading = get_field('career_resources_sub_heading');
if(have_rows('career_resources')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($career_resources_heading)): echo '<h3>'.$career_resources_heading.'</h3>'; endif;
                    if(!empty($career_resources_sub_heading)): echo '<h4>'.$career_resources_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
                <ul class="dot-list hash-underline">
                	<?php 
                	while(have_rows('career_resources')): the_row();
                	$text = get_sub_field('text');
                	$url = get_sub_field('url');
                	echo '<li><a href="'.$url.'" target="_blank">'.$text.' </a><i class="fas fa-long-arrow-alt-right"></i></li>'; 
                	endwhile;
                	?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
$resource_select_testimonial = get_field('resource_select_testimonial');
if($resource_select_testimonial):
$client_name = get_field('client_name',$resource_select_testimonial);
$client_testimonial = get_field('client_testimonial',$resource_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($resource_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ==============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-box">
                            <div class="testimonial-content text-center">
                                <?php echo $client_testimonial; ?>
                            </div>
                            <div class="author text-end">- <?php echo $client_name; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonial container End ==============================-->
<?php 
endif;
get_footer(); 
?>
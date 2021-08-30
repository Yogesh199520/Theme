<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: How It Works */
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

if(have_rows('development_methodology_steps')):
$dm_heading = get_field('dm_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php if(!empty($dm_heading)): echo '<div class="heading text-center"><h3>'.$dm_heading.'</h3></div>'; endif; ?>
                <div class="steps-container d-flex flex-column">
                    <ul class="step-list d-flex flex-wrap">
                    	<?php 
                    	while(have_rows('development_methodology_steps')): the_row();
                    	$heading = get_sub_field('heading');
                    	$body_text = get_sub_field('body_text');
                    	?>
                        <li class="step-list-item">
                            <div class="step-list-box">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;  
                                ?>
                            </div>
                        </li>
                    	<?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif; 
if(have_rows('funding_methodology_steps')):
$fn_heading = get_field('fn_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr />
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($fn_heading)): echo '<div class="heading text-center"><h3>'.$fn_heading.'</h3></div>'; endif; ?>
                <div class="steps-container d-flex flex-column">
                    <ul class="step-list d-flex flex-wrap">
                        <?php 
                    	while(have_rows('funding_methodology_steps')): the_row();
                    	$heading = get_sub_field('heading');
                    	$body_text = get_sub_field('body_text');
                    	?>
                        <li class="step-list-item">
                            <div class="step-list-box">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;  
                                ?>
                            </div>
                        </li>
                    	<?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
$howItWorks_show_testimonials = get_field('howItWorks_show_testimonials');
$howItWorks_select_testimonials = get_field('howItWorks_select_testimonials'); 
if(($howItWorks_show_testimonials == true ) && ( !empty($howItWorks_select_testimonials) )):
?>
<!--============================== Content Start ==============================-->
<div class="content-container color-bg2 add-bg-graphic more-opacity add-inner-shadow">
    <div class="container add-index">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="testimonial-list d-flex flex-wrap justify-content-center mobile-slider2 full-height">
                	<?php
                    foreach($howItWorks_select_testimonials as $test_id):
                        $title = get_field('name',$test_id);
                        $destination = get_field('destination',$test_id);
                        $quote = get_field('quote',$test_id);
                        $author_photo = wp_get_attachment_image(get_field('author_photo',$test_id),'medium');
                        if(empty($title)): $title = get_the_title($test_id); endif;
                    ?>
                    <li class="testimonial-item">
                        <div class="testimonial-box">
                        	<?php 
                        	if(!empty($author_photo)): echo '<div class="testimonial-img">'.$author_photo.'</div>'; endif; 
                        	if(!empty($quote)): echo '<div class="testimonial-text"><p>'.$quote.'</p></div>'; endif; 
                        	?>
                            <div class="testimonial-by">
                            <span><?php echo $title; ?> </span>
                            <?php if(!empty($destination)): echo '<small>'.$destination.'</small>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
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
<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */
get_header();

$banner_heading = get_field('home_banner_heading');
$banner_text = get_field('home_banner_text');
$banner_button_text = get_field('home_banner_button_text');
$banner_button_link = get_field('home_banner_button_link');
$banner_call_us = get_field('home_banner_call_us');
$banner_right_image = wp_get_attachment_image(get_field('home_banner_right_image'),'large');
?>
<!--============================== hero start ==============================-->
<div class="content-container hero-container pb-225">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
                <div class="hero-content d-flex flex-row justify-content-between">
                    <div class="hero-left">
                    	<?php 
                    	if(!empty($banner_heading)): echo '<h1>'.$banner_heading.'</h1>'; endif;
                    	if(!empty($banner_text)): echo '<p>'.$banner_text.'</p>'; endif;
                    	if(!empty($banner_button_text || $banner_button_link)): echo '<div class="hero-btn"><a href="'.$banner_button_link.'" class="btn btn-moon-bg">'.$banner_button_text.' </a></div>'; endif;
                    	if(!empty($banner_call_us)):  
                    	?>
                        <div class="hero-call-us">
                            <div class="hero-call-icon">
                                <img src="<?php echo IMG.'call2.png'; ?>" alt="Call" />
                            </div>
                            <span>call us </span>
                            <a href="tel:<?php echo str_replace('-','',$banner_call_us); ?>"><strong><?php echo $banner_call_us; ?></strong></a>
                        </div>
                    	<?php endif; ?>
                    </div>
                    <?php if(!empty($banner_right_image)): echo '<div class="hero-right">'.$banner_right_image.'</div>'; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== hero End ==============================-->
<?php
$who_heading = get_field('home_who_heading');
$who_body_text = get_field('home_who_body_text');
$who_top_image = wp_get_attachment_image_url(get_field('home_who_top_image'),'large');
$who_bottom_image = wp_get_attachment_image_url(get_field('home_who_bottom_image_'),'large');
$who_mobile_image = wp_get_attachment_image_url(get_field('home_who_mobile_image'),'large');
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad moon-yellow-bg">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
                <div class="hwr-content d-flex flex-colunm flex-md-row flex-wrap">
                    <div class="hwr-left">
                    	<?php 
                    	if(!empty($who_heading)): echo '<div class="heading"><h3>'.$who_heading.'</h3></div>'; endif;
                    	if(!empty($who_body_text)): echo $who_body_text; endif;
                    	?>
                    </div>
                    <?php if(!empty($who_top_image || $who_bottom_image)): ?>
                    <div class="hwr-right">
                        <div class="hwr-img-box">
                        	<div class="hwr-img-box">
                                <img src="<?php echo $who_top_image; ?>" class="hwr-upper-img" alt="Top Image">
                                <img src="<?php echo $who_bottom_image; ?>" class="hwr-lowwer-img" alt="Bottom Image">
                            </div>
                        </div>
                    </div>
                	<?php
                	endif; 
                	if(!empty($who_mobile_image)):
                	?>
                    <div class="hwr-mobile-img">
                        <img src="<?php echo $who_mobile_image; ?>" class="hwr-lowwer-img" alt="Mobile Image">
                    </div>
                    <?php
                	endif; 
                	?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
if(have_rows('home_why_us')):
$why_heading = get_field('home_why_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container block-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
                <?php 
            	if(!empty($why_heading)): echo '<div class="heading"><h3>'.$why_heading.'</h3></div>'; endif;
            	?>
                <div class="block-content">
                    <ul class="block-list d-md-flex flex-column flex-sm-row justify-content-center flex-wrap mobile-slider mob-mb-0">
                    	<?php
	                    while(have_rows('home_why_us')): the_row();
	                    $text = get_sub_field('text');
	                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');  
	                    ?>
                        <li class="block-item">
                            <div class="block-box">
                                <?php 
	                            if(!empty($icon)): echo '<div class="block-img">'.$icon.'</div>'; endif;
	                            if(!empty($text)): echo '<div class="block-info"><p>'.$text.'</p></div>'; endif;
	                            ?>
                            </div>
                        </li>
                        <?php 
	                    endwhile; 
	                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(have_rows('home_our_services')):
$our_services = get_field('home_services_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
                <?php 
            	if(!empty($our_services)): echo '<div class="heading"><h3>'.$our_services.'</h3></div>'; endif;
            	?>
                <div class="services-content">
                    <ul class="services-list d-md-flex flex-wrap flex-column flex-md-row justify-content-between mobile-slider mob-flex">
                    	<?php
                    	$count = 0;
	                    while(have_rows('home_our_services')): the_row();
	                    $heading = get_sub_field('heading');
	                    $text = get_sub_field('text');
	                    $button_text = get_sub_field('button_text');
	                    $button_link = get_sub_field('button_link');
	                    if($count == 0):
	                    	$cls_name = 'bg-blue-50';
	                    	$cls_btn = 'btn-blue-border';
	                    elseif($count == 1):
	                    	$cls_name = 'bg-moon-yellow-50';
	                    	$cls_btn = 'btn-moon-yellow-border';
	                    elseif($count == 2):
	                    	$cls_name = 'bg-moon-yellow-50';
	                    	$cls_btn = 'btn-moon-yellow-border';
	                    elseif($count == 3):
	                    	$cls_name = 'bg-blue-50';
	                    	$cls_btn = 'btn-blue-border';
	                    endif;
	                    ?>
                        <li class="services-item">
                            <div class="services-box d-flex flex-column <?php echo $cls_name; $count; ?>">
                                <?php 
                                if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif;
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                                if(!empty($button_text && $button_link)): echo '<div class="service-btn"><a href="'.$button_link.'" class="btn '.$cls_btn.'">'.$button_text.'</a></div>'; endif;
                                ?>
                            </div>
                        </li>
                        <?php
                        $count++; 
	                    endwhile; 
	                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(post_type_exists('patient-stories')): 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$patient_args = array (
    'post_type'  => 'patient-stories',
    'posts_per_page' =>-1,
);
$patient = new WP_Query($patient_args);
$patient_heading = get_field('home_patient_heading'); 
?>
<!--============================== Content Start ==============================-->
<div class="content-container light-blue-bg less-pad">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
            	<?php if(!empty($patient_heading)): echo '<div class="heading"><h3>'.$patient_heading.'</h3></div>'; endif; ?>
                <div class="patient-box d-flex flex-wrap">
                    <div class="patient-text-content">
                        <ul class="patient-text-list patient-text-slider white-d0ts">
                        	<?php 
		                    while($patient->have_posts()): $patient->the_post();
		                    ?>
                            <li class="patient-text-item">
                                <div class="patient-content-inner">
                                    <blockquote class="blockquote">
                                        <p><?php the_excerpt();?></p>
                                        <footer class="blockquote-footer"><?php the_title(); ?></footer>
                                    </blockquote>
                                </div>
                            </li>
                            <?php 
		                    wp_reset_postdata();
		                    endwhile;
		                    ?>
                        </ul>
                    </div>
                    <div class="patient-image-content">
                        <ul class="patient-img-list patient-img-slider">
                        	<?php 
		                    while($patient->have_posts()): $patient->the_post();
		                    if(has_post_thumbnail()):
		                    ?>
                            <li class="patient-img-item">
                                <div class="patient-img">
                                    <?php echo the_post_thumbnail(); ?>
                                </div>
                            </li>
                            <?php
                            endif;
		                    wp_reset_postdata();
		                    endwhile;
		                    ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(post_type_exists('events')): 
$events_heading = get_field('home_events_heading');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$today = date('Ymd');
$events_args = array(        
'post_type'  => 'events',
'posts_per_page' =>-1,  
'meta_query' => array(
    array(
        'key'       => 'end_date',
        'compare'   => '>=',
        'value'     => $today,
    )),
);    
$query = new WP_Query($events_args);  
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-12">
            	<?php if(!empty($events_heading)): echo '<div class="heading"><h3>'.$events_heading.'</h3></div>'; endif;?> 
                <div class="events-content">
                    <ul class="events-list events-slider d-flex">
                    	<?php while($query->have_posts()): $query->the_post(); 
                    	?>
                        <li class="events-item">
                            <div class="events-box">
                                <?php if(has_post_thumbnail()): ?>
	                            <div class="events-img-box">
	                                <?php the_post_thumbnail(); ?>
	                            </div>
                            	<?php endif; ?>
                                <div class="events-content-inner">
                                    <span><?php the_title(); ?></span>
                                    <div class="events-date">
                                    <?php 
                                    $event_date = get_field('start_date');
                                    $end_date = get_field('end_date');
                                    $days_diff = (strtotime($end_date) - strtotime($event_date)) / (60 * 60 * 24);
                                    $event = date("dS M Y", strtotime($event_date));
                                    if($days_diff > 0):
                                        echo ''.$event_date.' - '.$end_date .'';
                                    else:
                                        echo  $event_date;
                                    endif;
                                    ?>
                                    </div>
                                    <div class="events-btn">
                                        <a href="<?php the_permalink(); ?>" class="">know more</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                       	<?php 
	                    wp_reset_postdata();
	                    endwhile; 
	                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
get_footer();
?>
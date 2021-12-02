<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */
get_header();

$about_image = wp_get_attachment_image_url(get_field('about_image'),'large');
$about_heading = get_field('about_heading');
$about_body_text = get_field('about_body_text');
?>
<!--============================== Inner hero container Start ============================-->
<div class="inner-hero-container overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-hero-content d-md-flex flex-md-wrap">
                    <div class="inner-hero-img-box position-relative add-tl-white-shape add-br-white-shape">
                        <div class="inner-hero-bg background-image" style="background-image: url(<?php echo $about_image; ?>);"></div>
                    </div>
                    <?php if(!empty($about_heading || $about_body_text)): ?>
                    <div class="inner-hero-text-box yellow-bg d-flex align-items-center add-tl-dark-shape add-br-dark-shape">
                        <div class="iht-content">
                            <?php 
                            if(!empty($about_heading)): echo '<h1>'.$about_heading.'</h1>'; endif; 
                            echo $about_body_text; 
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Inner hero container End ==============================-->

<?php 
$aboutus_heading = get_field('aboutus_heading');
$aboutus_sub_heading = get_field('aboutus_sub_heading');
if(have_rows('stories')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($aboutus_heading || $aboutus_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($aboutus_heading)): echo '<h3>'.$aboutus_heading.'</h3>'; endif; 
                    if(!empty($aboutus_sub_heading)): echo '<h4>'.$aboutus_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php 
            	endif; 
            	?>
                <ul class="lca-info-list">
                	<?php 
                	while(have_rows('stories')): the_row();
                	$icon = wp_get_attachment_image(get_sub_field('icon'),'thubmnail');
                	$heading = get_sub_field('heading');
                	$body_text = get_sub_field('body_text');
                	?>
                    <li>
                        <div class="lca-info-box d-flex flex-wrap align-items-md-center">
                        	<?php 
                        	if(!empty($icon)): echo '<div class="lca-info-icon">'.$icon.'</div>'; endif;
                        	if(!empty($heading || $body_text)): 
                        	?>
                            <div class="lca-info-content">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                                ?>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$bio_heading = get_field('bio_heading');
$bio_sub_heading = get_field('bio_sub_heading');
$bio_body_text = get_field('bio_body_text');
$bio_image = wp_get_attachment_image(get_field('bio_image'),'medium_large');
if(!empty($bio_body_text || $bio_image)):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
    	<?php if(!empty($bio_heading || $bio_sub_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($bio_heading)): echo '<h3>'.$bio_heading.'</h3>'; endif; 
                    if(!empty($bio_sub_heading)): echo '<h4>'.$bio_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div class="row d-md-flex align-items-md-center">
        	<?php 
        	if(!empty($bio_image)): echo '<div class="col-md-4"><div class="large-thumbnails">'.$bio_image.'</div></div>'; endif; 
        	if(!empty($bio_body_text)): echo '<div class="col-md-8">'.$bio_body_text.'</div>'; endif;
        	?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$about_select_testimonial = get_field('about_select_testimonial');
if($about_select_testimonial):
$client_name = get_field('client_name',$about_select_testimonial);
$client_testimonial = get_field('client_testimonial',$about_select_testimonial);
if(empty($client_name)):
	$client_name = get_the_title($about_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
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
<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: LCA Career Coaching */
get_header();

$coaching_banner_body_text = get_field('coaching_banner_body_text');
$coaching_banner_image = wp_get_attachment_image_url(get_field('coaching_banner_image'),'medium_large');
$coaching_banner_button_text = get_field('coaching_banner_button_text');
$coaching_banner_button_link = get_field('coaching_banner_button_link');
if(!empty($coaching_banner_body_text || $coaching_banner_image)):
?>
<!--============================== Inner hero container Start ============================-->
<div class="inner-hero-container overflow-hidden right-image-container">
    <div class="container">
        <div class="row">
           <div class="col-md-12 ">
              <div class="inner-hero-content d-md-flex flex-md-wrap">
                 <div class="inner-hero-img-box position-relative  add-br-white-shape order-1">
                    <div class="inner-hero-bg background-image" style="background-image: url(<?php echo $coaching_banner_image; ?>);"></div>
                 </div>
                 <div class="inner-hero-text-box  yellow-bg d-flex align-items-center add-br-dark-shape order-0">
                    <div class="iht-content">
                        <?php 
                        echo $coaching_banner_body_text;
                        if(!empty($coaching_banner_button_text)):
                        ?>
                        <div class="iht-btn">
                            <a href="<?php echo $coaching_banner_button_link; ?>" class="add-arrow">
                                <span class="btn btn-primary"><?php echo $coaching_banner_button_text; ?></span>
                                <img src="<?php echo IMG.'dark-arrow.png'; ?>" alt="dark-arrow">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
</div>
<!--============================== Inner hero container End ==============================-->
<?php 
endif;
$coaching_meth_heading = get_field('coaching_meth_heading');
$coaching_meth_sub_heading = get_field('coaching_meth_sub_heading');
if(have_rows('coaching_methodology')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container card-block-container">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
            	<?php if(!empty($coaching_meth_heading || $coaching_meth_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($coaching_meth_heading)): echo '<h3>'.$coaching_meth_heading.'</h3>'; endif;
                    if(!empty($coaching_meth_sub_heading)): echo '<h4>'.$coaching_meth_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php endif; ?>
                <ul class="lca-info-list p-0">
                	<?php 
                    while(have_rows('coaching_methodology')): the_row();
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
                            	echo $body_text;
                            	?>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php 
            if(have_rows('coaching_meth_page_link')):
            ?>
            <div class="col-md-5">
            	<?php 
                while(have_rows('coaching_meth_page_link')): the_row();
                $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'medium_large');
                $color = get_sub_field('color');
                $heading = get_sub_field('heading');
                $body_text = get_sub_field('body_text');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                ?>
                <div class="card-block-box <?php echo $color; ?>-bg position-relative">
                    <div class="card-block-bg background-image" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                    <div class="bard-block-text">
                    	<?php 
                    	if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
                        if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                        if(!empty($button_text)): echo '<a href="'.$button_link.'" class="btn btn-white">'.$button_text.'</a>'; endif;
                        ?> 
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$career_coaches_heading = get_field('career_coaches_heading');
$career_coaches_sub_heading = get_field('career_coaches_sub_heading');
$select_career_coaches = get_field('select_career_coaches');
$career_coaches_button_text = get_field('career_coaches_button_text');
$career_coaches_button_link = get_field('career_coaches_button_link');
if($select_career_coaches):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container coach-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($career_coaches_heading || $career_coaches_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($career_coaches_heading)): echo '<h3>'.$career_coaches_heading.'</h3>'; endif;
                    if(!empty($career_coaches_sub_heading)): echo '<h4>'.$career_coaches_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php endif; ?>
                <ul class="coach-list d-flex flex-wrap">
                	<?php 
                	foreach($select_career_coaches as $cid):
                	$name = get_field('coaches_name',$cid);
                	$coaches_designation = get_field('coaches_designation',$cid);
                	$photo = wp_get_attachment_image(get_field('coaches_photo',$cid),'medium');
                	if(empty($name)):
                		$name = get_the_title($cid);
                	endif;
                	?>
                    <li>
                        <div class="coach-box text-center">
                        	<?php if(!empty($photo)): echo '<div class="coach-img">'.$photo.'</div>'; endif; ?>
                            <div class="coach-content">
                                <h5><?php echo $name; ?></h5>
                                <?php if(!empty($coaches_designation)): echo '<h6>'.$coaches_designation.'</h6>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php if(!empty($career_coaches_button_text)): ?>
                <div class="text-center mt-5">
                    <a href="<?php echo $career_coaches_button_link; ?>" class="add-arrow">
                        <span class="btn btn-primary"><?php echo $career_coaches_button_text; ?></span>
                        <img src="<?php echo IMG.'green-arrow.png'; ?>" alt="green-arrow"/>
                    </a>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$career_coaches_testimonial = get_field('career_coaches_testimonial');
if($career_coaches_testimonial):
$client_name = get_field('client_name',$career_coaches_testimonial);
$client_testimonial = get_field('client_testimonial',$career_coaches_testimonial);
if(empty($client_name)):
	$client_name = get_the_title($career_coaches_testimonial);
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
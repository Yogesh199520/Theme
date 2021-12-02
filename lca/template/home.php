<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */
get_header();

?>
<!--============================== Hero container Start ==============================-->
<div class="hero-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-content-box d-lg-flex flex-lg-wrap">
                    <?php if(have_rows('hero_slider')): ?>
                    <div class="hcb-left">
                        <div class="hcb-box h-100 d-flex flex-wrap">
                            <div class="hero-text-slider hero-slider d-flex align-items-center">
                                <!-- slider item start -->
                                <?php 
                                $homeintro_hero_image = wp_get_attachment_image(get_field('homeintro_hero_image'),'medium_large');
                                while(have_rows('hero_slider')): the_row();
                                $heading = get_sub_field('heading');
                                $sub_heading = get_sub_field('sub_heading');
                                $text = get_sub_field('text');
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                ?>
                                <div class="ht-item">
                                    <div class="ht-box">
                                        <div class="ht-upper">
                                            <div class="ht-text">
                                                <?php 
                                                if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif;
                                                if(!empty($sub_heading)): echo '<h3>'.$sub_heading.'</h3>'; endif;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="ht-lower">
                                            <?php 
                                            if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                                            if(!empty($button_text)):
                                            ?>
                                            <div class="hero-btn d-flex align-items-center">
                                                <a href="<?php echo $button_link; ?>" class="btn btn-default"><?php echo $button_text; ?></a>
                                                <img src="<?php echo IMG.'dark-arrow.png'; ?>" alt="dark-arrow" />
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                                <!-- slider item end -->
                            </div>

                            <div class="add-custom-arrow">
                                <ul>
                                    <li class="prev"></li>
                                    <li class="next"></li>
                                </ul>
                            </div>
                            <?php if(!empty($homeintro_hero_image)): ?>
                            <div class="hero-image-slider">
                                <div class="hi-item">
                                    <div class="hi-img">
                                       <?php echo $homeintro_hero_image; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php 
                    endif;
                    if(have_rows('hero_page_link')):
                    ?>
                    <div class="hcb-right">
                        <?php 
                        while(have_rows('hero_page_link')): the_row();
                        $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'medium_large');
                        $bg_color = get_sub_field('bg_color');
                        $heading = get_sub_field('heading');
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        ?>
                        <div class="card-block-box <?php echo $bg_color; ?>-bg position-relative text-center">
                            <div class="card-block-bg background-image" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                            <div class="bard-block-text">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif; 
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
    </div>
</div>
<!--============================== Hero container End ==============================-->
<?php 
$chasm_heading = get_field('chasm_heading');
$chasm_sub_heading = get_field('chasm_sub_heading');
$chasm_body_text = get_field('chasm_body_text');
if(have_rows('career_chasm')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php if(!empty($chasm_heading || $chasm_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($chasm_heading)): echo '<h3>'.$chasm_heading.'</h3>'; endif; 
                    if(!empty($chasm_sub_heading)): echo '<h4>'.$chasm_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php 
            	endif; 
            	echo $chasm_body_text;
            	?>
                <ul class="count-list">
                	<?php 
                	while(have_rows('career_chasm')): the_row();
                	$icon = wp_get_attachment_image(get_sub_field('icon'),'thubmnail');
                	$text = get_sub_field('text');
                	$number = get_sub_field('number');
                	$border = get_sub_field('border');
                	?>
                    <li class="count-item">
                        <div class="count-box <?php echo $border; ?> position-relative d-flex align-items-center">
                            <?php 
                            if(!empty($icon)): echo '<div class="count-icon-box">'.$icon.'</div>'; endif;
                            if(!empty($text)): echo '<div class="count-text-box"><p>'.$text.'</p></div>'; endif; 
                            if(!empty($number)): echo '<div class="count-number-box">'.$number.'</div>'; endif;
                            ?>
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
$latino_heading = get_field('latino_heading');
$latino_sub_heading = get_field('latino_sub_heading');
if(have_rows('page_link')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container home-post-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($latino_heading || $latino_sub_heading)): ?>
                <div class="heading text-uppercase overflow-hidden">
                    <?php 
                    if(!empty($latino_heading)): echo '<h3>'.$latino_heading.'</h3>'; endif; 
                    if(!empty($latino_sub_heading)): echo '<h4>'.$latino_sub_heading.'</h4>'; endif; 
                    ?>
                </div>
            	<?php 
            	endif; 
            	?>
                <ul class="post-list d-flex flex-wrap">
                	<?php 
                	while(have_rows('page_link')): the_row();
                	$image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                	$heading = get_sub_field('heading');
                	$body_text = get_sub_field('body_text');
                	$button_text = get_sub_field('button_text');
                	$button_link = get_sub_field('button_link');
                	?>
                    <li class="post-item">
                        <div class="post-box d-flex flex-column w-100 text-center">
                        	<?php if(!empty($image)): echo '<div class="post-thumbnail-box">'.$image.'</div>'; endif; ?>
                            <div class="post-text-box">
                            	<?php 
                            	if(!empty($heading)): echo '<h4 class="post-title">'.$heading.'</h4>'; endif;
                            	echo $body_text; 
                            	?>
                            </div>
                            <?php if(!empty($button_text)): echo '<div class="post-btn mt-auto"><a href="'.$button_link.'" class="btn btn-default">'.$button_text.'</a></div>'; endif; ?>
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
$home_select_testimonial = get_field('home_select_testimonial');
if($home_select_testimonial):
$client_name = get_field('client_name',$home_select_testimonial);
$client_testimonial = get_field('client_testimonial',$home_select_testimonial);
if(empty($client_name)):
	$client_name = get_the_title($home_select_testimonial);
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
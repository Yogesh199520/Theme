<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Invisalign */

get_header();

get_template_part('template-part/inner-banner');
?>
<div id="content">
	<?php 
	$delivering_heading = get_field('delivering_heading');
	$delivering_body_text = get_field('delivering_body_text');
	?>
    <section class="invi-sec1">
        <div class="container">
        	<?php 
        	if(!empty($delivering_heading)): echo '<h2 class="sec_title">'.$delivering_heading.'</h2>'; endif;
        	echo $delivering_body_text;
        	?>
        </div>
    </section>
    
    <?php 
    $popup_bg_image = wp_get_attachment_image_url(get_field('popup_bg_image'),'full');
    $popup_video = get_field('popup_video', false, false);
    if(!empty($popup_video)):
    ?>
    <section class="invi-sec2" style="background-image: url(<?php echo $popup_bg_image; ?>);">
        <div class="cointainer">
            <h2 style="display:none;">Heading</h2>
            <a data-fancybox href="<?php echo $popup_video; ?>"><img alt="play" src="<?php echo IMG.'play-1.png'; ?>"/> </a>
        </div>
    </section>
    <?php 
	endif;
	$what_heading = get_field('what_heading');
	$what_body_text = get_field('what_body_text');
	$what_image = wp_get_attachment_image(get_field('what_image'),'medium_large');
	?>
    <section class="community-sec1">
        <div class="container">
            <div class="row">
            	<?php 
            	if(!empty($what_body_text)):
            	?>
                <div class="col-6">
                	<?php 
                	if(!empty($what_heading)): echo '<h2>'.$what_heading.'</h2>'; endif;
                	echo $what_body_text;
                	?>
                </div>
                <?php 
            	endif;
            	if(!empty($what_image)): echo '<div class="col-6"><div class="border_image">'.$what_image.'</div></div>'; endif;
            	?>
            </div>
        </div>
    </section>
    <?php 
	$how_heading = get_field('how_heading');
	$how_body_text = get_field('how_body_text');
	$how_image = wp_get_attachment_image(get_field('how_image'),'medium_large');
	?>
    <section class="invi-sec4">
        <div class="container">
            <div class="row align-items-center">
            	<?php 
            	if(!empty($how_image)): echo '<div class="col-6">'.$how_image.'</div>'; endif;
            	if(!empty($how_body_text)):
            	?>
                <div class="col-6">
                    <?php 
                	if(!empty($how_heading)): echo '<h2>'.$how_heading.'</h2>'; endif;
                	echo $how_body_text;
                	?>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </section>
    <?php 
	$invisalignteen_heading = get_field('invisalignteen_heading');
	$invisalignteen_body_text = get_field('invisalignteen_body_text');
	$invisalignteen_image = wp_get_attachment_image(get_field('invisalignteen_image'),'medium_large');
	?>
    <section class="community-sec1">
        <div class="container">
            <div class="row">
            	<?php 
            	if(!empty($invisalignteen_body_text)):
            	?>
                <div class="col-6">
                	<?php 
                	if(!empty($invisalignteen_heading)): echo '<h2>'.$invisalignteen_heading.'</h2>'; endif;
                	echo $invisalignteen_body_text;
                	?>
                </div>
                <?php 
            	endif;
            	if(!empty($invisalignteen_image)): echo '<div class="col-6"><div class="border_image">'.$invisalignteen_image.'</div></div>'; endif;
            	?>
            </div>
        </div>
    </section>
    <?php 
	$benefit_heading = get_field('benefit_heading');
	$benefit_body_text = get_field('benefit_body_text');
	$benefit_image = wp_get_attachment_image(get_field('benefit_image'),'medium_large');
	?>
    <section class="invi-sec4">
        <div class="container">
            <div class="row align-items-center">
            	<?php 
            	if(!empty($benefit_image)): echo '<div class="col-6">'.$benefit_image.'</div>'; endif;
            	if(!empty($benefit_body_text)):
            	?>
                <div class="col-6">
                    <?php 
                	if(!empty($benefit_heading)): echo '<h2>'.$benefit_heading.'</h2>'; endif;
                	echo $benefit_body_text;
                	?>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </section>
    <?php 
	$faqs_heading = get_field('faqs_heading');
	if(have_rows('faqs')):
	?>
    <section class="invis-faq">
        <div class="container">
            <div class="row">
                <?php if(!empty($faqs_heading)): echo '<div class="col-30"><h2 class="sec_title center">'.$faqs_heading.'</h2></div>'; endif; ?>
                <div class="col-70">
                    <div class="acc-sec">
                        <div class="acc">
                        	<?php 
				            while(have_rows('faqs')): the_row();
				            $heading = get_sub_field('heading');
				            $body_text = get_sub_field('body_text');
				            ?>
                            <div class="acc__card">
                                <div class="acc__title"><?php echo $heading; ?></div>
                                <div class="acc__panel">
                                    <?php echo $body_text; ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
	endif;
	?>
</div>

<?php 
get_footer(); 
?>
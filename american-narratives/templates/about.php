<?php
/*==============================*/
// @package American Narratives
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */
get_header();

$bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
$bold_heading = get_field('bnr_bold_heading');
$red_heading = get_field('bnr_red_heading');
?>
<!--============================== inner banner Start ==============================-->
<div class="inner-hero-container background-image d-flex align-items-center" style="background-image: url(<?php echo $bg_image; ?>);">
    <div class="container">
       <div class="row">
	        <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	           <div class="heading white mb-0">
	              	<?php if(!empty($bold_heading)) : echo '<h6>'.$bold_heading.'</h6>'; endif; ?>
	              	<?php if(!empty($red_heading)) : echo '<h5>'
	              		.$red_heading.'</h5>';
		            endif; ?>
	          	</div>
	        </div>
       </div>
    </div>
</div>
<!--============================== inner banner End ==============================-->

<?php 
$text = get_field('text');
$image = wp_get_attachment_image(get_field('image'),'medium_large');
if(!empty($text)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container info-container pb-0">
   <div class="container">
      	<div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
      		<div class="col-md-7"><?php echo $text; ?></div>
      		<?php if(!empty($image)): ?>
            <div class="col-md-5">
                <div class="info-content">
	                <div class="info-img-box border-top-left-radius overflow-hidden">
	                    <?php echo $image; ?>
	                </div>
	                <?php if(have_rows('person_details')): ?>
	                   	<div class="info-desc d-flex align-items-center justify-content-between">
		                   	<?php
		                   	while(have_rows('person_details')): the_row();
		                   		$name = get_sub_field('name');
								$position = get_sub_field('position');
								if(!empty($name && $position)){
									echo '<h3>'.$name.'<span>'.$position.'</span></h3>';
								}
							endwhile;
							?> 
	                   </div>
	               <?php endif; ?>
                </div>
            </div>
	        <?php endif; ?>
      	</div>
   </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;

if(have_rows('member')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container member-container mob-pad-bott">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
              	<ul class="member-list d-flex flex-wrap">
              		<?php 
              		while(have_rows('member')): the_row();
					$profile_photo = wp_get_attachment_image(get_sub_field('profile_photo'),'medium_large');
					$text = get_sub_field('text');
					if(get_row_index() == 2){
						$cls = ' text-lg-right';
					}else{
						$cls = '';
					}
					?>
                  	<li class="member-item <?php echo $cls; ?>">
                      	<div class="member-box">
                      		<?php if(!empty($profile_photo)): ?>
                            <div class="member-thumbnail-box">
                              	<div class="mt-overlay-img">
                              		<img src="<?php echo IMG.'member-overlay-'.get_row_index().'.png'; ?>">
                              	</div>
                              	<?php echo '<div class="member-img">'.$profile_photo.'</div>'; ?>
                            </div>
                        	<?php endif; ?>
                            <?php echo $text; ?>
                      	</div>
                  	</li>
                  	<?php endwhile; ?>
              	</ul>
            </div> 
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

$block_quotes_bg_image = wp_get_attachment_image_url(get_field('block_quotes_bg_image'),'full');
$block_quotes_text = get_field('block_quotes_text');
if(!empty($block_quotes_text)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
	        <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	            <div class="content-box text-center background-image" style="background-image: url(<?php echo $block_quotes_bg_image; ?>);">
	              	<?php echo $block_quotes_text; ?>
	            </div>
	        </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php endif; ?>

<!--============================== content container Start ============================-->
<?php
$cmp_logo = wp_get_attachment_image(get_field('cmp_logo'),'medium');
$bold_heading = get_field('cmp_bold_heading');
$red_heading = get_field('cmp_red_heading');
$cmp_text = get_field('cmp_text');
$intro = get_field('intro');
?>
<div class="content-container git-in-touch-container pt-0">
   	<div class="container">
        <div class="row">
           	<div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">             
	            <ul class="git-logo-list d-md-flex">
	            	<?php
	            	if(!empty($cmp_logo)) :
	            		echo '<li><a href="https://www.careermp.com/" target="_blank" class="git-logo">'.$cmp_logo.'</a></li>';
			        endif;
			        ?>
	               	<li>
		                <div class="heading mb-0">
		                	<?php
		                	if(!empty($bold_heading)): echo '<h6>'.$bold_heading.'</h6>'; endif;
		                	if(!empty($red_heading)): echo '<h5><a href="https://www.careermp.com/" target="_blank">'.$red_heading.'</a></h5>'; endif;
		                	?>
		                </div>
	               </li>
	            </ul>
	            <?php
	            echo $cmp_text;
	            if(have_rows('follow_us')): 
	            ?>
	            <h3>Follow us on</h3>
	            <ul class="about-social-link d-flex align-items-center">
	            	<?php while(have_rows('follow_us')) : the_row();
					$url = get_sub_field('url');
					$icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
					 	echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>';
					endwhile;
					?>
	            </ul>
		        <?php
		    	endif;
		        if(!empty($intro)) : echo '<h3>'.$intro.'</h3>'; endif;
		        ?>
           </div>
        </div>
   	</div>
</div>
<!--============================== content container End ==============================-->

<?php get_footer(); ?>
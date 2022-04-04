<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Our Community */

get_header();

get_template_part('template-part/inner-banner');
if(have_rows('our_community')):
?>
<div id="content">
    <section class="community-sec1">
        <div class="container">
        	<?php 
            while(have_rows('our_community')): the_row();
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            ?>
            <div class="row">
                <div class="col-6">
                	<?php 
                	if(!empty($heading)): echo '<h2>'.$heading.'</h2>'; endif;
                	echo $body_text;
                	?>
                </div>
                <?php 
                if(have_rows('image_or_video')):
                while(have_rows('image_or_video')): the_row();
	                if(get_row_layout() == 'image'):
	                $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
	                ?>
	                <div class="col-6">
	                    <div class="border_image"><?php echo $image; ?></div>
	                </div>
	                <?php 
	            	elseif(get_row_layout() == 'video'):
	            	$video = get_sub_field('video');
	            	?>
	            	<div class="col-6">
	                   <video width="500" height="auto" controls>
	                        <source type="video/mp4" src="<?php echo $video; ?>" />
	                    </video>
	                </div>
	            	<?php 
		            endif;
		        endwhile;
                endif;
                ?>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>


<?php 
endif;

get_footer(); 
?>
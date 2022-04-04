<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Before and After */

get_header();

get_template_part('template-part/inner-banner');

?>
<div id="content">
	<?php 
	$videos_heading = get_field('videos_heading');
	if(have_rows('videos')):
	?>
    <section class="before_after_sec">
        <div class="container">
        	<?php if(!empty($videos_heading)): echo '<h2>'.$videos_heading.'</h2>'; endif; ?>
            <div class="row">
            	<?php 
	            while(have_rows('videos')): the_row();
	            $video = get_sub_field('video');
	            ?>
                <div class="before_after_video">
                    <?php echo $video; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php 
	endif;
	$work_heading = get_field('work_heading');
	$work_video = get_field('work_video');
	?>

    <section class="before_after_sec2" style="background-image: url(<?php echo IMG.'patern.png'; ?>);">
        <div class="container">
        	<?php 
        	if(!empty($work_heading)): echo '<h2 class="sec_title">'.$work_heading.'</h2>'; endif; 
        	if(!empty($work_video)):
        	?>
            <div class="before_after_video2">
                <video controls>
                    <source type="video/mp4" src="<?php echo $work_video; ?>" />
                </video>
            </div>
        	<?php endif; ?>
        </div>
    </section>
</div>


<?php 
get_footer(); 
?>
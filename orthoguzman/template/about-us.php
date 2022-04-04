<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */

get_header();

get_template_part('template-part/inner-banner');
?>
<div id="content">
	<?php 
	$doctor_image = wp_get_attachment_image(get_field('doctor_image'),'medium_large');
	$abo_logo = wp_get_attachment_image(get_field('abo_logo'),'medium');
	$doctor_heading = get_field('doctor_heading');
	$doctor_sub_heading = get_field('doctor_sub_heading');
	
	?>
	<section class="homepage-sec1" style="background-image: url(<?php echo IMG.'patern.png'; ?>);">
	    <div class="container">
	        <div class="row">
	            <div class="col-6">
	                <?php 
	                if(!empty($doctor_image)): echo '<div class="border_image">'.$doctor_image.'</div>'; endif; 
	                if(!empty($abo_logo)): echo '<p class="abo">'.$abo_logo.'</p>'; endif; 
	                ?>
	            </div>
	            <div class="col-6">
	            	<?php 
	            	if(!empty($doctor_heading)): echo '<h2 class="sec_title">'.$doctor_heading.'</h2>'; endif;
	            	if(!empty($doctor_sub_heading)): echo '<h4>'.$doctor_sub_heading.'</h4>'; endif;
            		while(have_rows('doctor_content_block')): the_row();
            		$heading = get_sub_field('heading');
            		$body_text = get_sub_field('body_text');
            		echo '<h3>'.$heading.'</h3>';
            		echo $body_text;
            		endwhile;
	            	
	            	?>
	            </div>
	        </div>
	    </div>
	</section>
	<?php 
    $get_heading = get_field('get_heading',11);
    $get_sub_heading = get_field('get_sub_heading',11);
    $get_button_text = get_field('get_button_text',11);
    $get_button_link = get_field('get_button_link',11);
    $get_image = wp_get_attachment_image(get_field('get_image',11),'medium_large');
    $get_bg_image = wp_get_attachment_image_url(get_field('get_bg_image',11),'full');
    ?>
	<section class="homepage-sec2" style="background-image: url(<?php echo $get_bg_image; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <?php 
                    if(!empty($get_heading)): echo '<h2>'.$get_heading.'</h2>'; endif; 
                    if(!empty($get_sub_heading)): echo '<p>'.$get_sub_heading.'</p>'; endif;
                    if(have_rows('logo_list',11)):
                    ?>
                    <ul>
                        <?php 
                        while(have_rows('logo_list',11)): the_row();
                        $text = get_sub_field('text');
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
                        echo '<li><span>'.$icon.'</span>'.$text.'</li>';
                        endwhile;
                        ?>
                    </ul>
                    <?php 
                    endif;
                    if(!empty($get_button_text)): echo '<a class="banner-btn" href="'.$get_button_link.'">'.$get_button_text.'</a>'; endif;
                    ?>
                </div>
                <?php if(!empty($get_image)): echo '<div class="col-6"><div class="bottom-img">'.$get_image.'</div></div>'; endif; ?>
            </div>
        </div>
    </section>
    <?php 
	$team_image = wp_get_attachment_image(get_field('team_image'),'medium_large');
	$team_heading = get_field('team_heading');
	$team_body_text = get_field('team_body_text');
	?>
	<section class="community-sec1" style="background-image: url(<?php echo IMG.'patern.png'; ?>);">
	    <div class="container">
	        <div class="row">
	            <?php 
	            if(!empty($team_image)): echo '<div class="col-6"><div class="border_image">'.$team_image.'</div></div>'; endif; 
	            if(!empty($team_body_text)):
	            ?>
	            <div class="col-6">
	            	<?php 
	            	if(!empty($team_heading)): echo '<h2 class="sec_title">'.$team_heading.'</h2>'; endif; 
	            	echo $team_body_text; 
	            	?>
	            </div>
	            <?php 
		        endif;
		        ?>
	        </div>
	    </div>
	</section>
	<?php 
	$philosophy_image = wp_get_attachment_image(get_field('philosophy_image'),'medium_large');
	$philosophy_heading = get_field('philosophy_heading');
	$philosophy_body_text = get_field('philosophy_body_text');
	?>
	<section class="community-sec1">
	    <div class="container">
	        <div class="row">
	        	<?php 
	        	if(!empty($philosophy_body_text)):
	        	?>
	            <div class="col-6">
	            	<?php 
	            	if(!empty($philosophy_heading)): echo '<h2 class="sec_title">'.$philosophy_heading.'</h2>'; endif;
	            	echo $philosophy_body_text;
	            	?>
	            </div>
	            <?php 
	        	endif;
	        	if(!empty($philosophy_image)): echo '<div class="col-6"><div class="border_image">'.$philosophy_image.'</div></div>'; endif; 
	        	?>
	        </div>
	    </div>
	</section>
	<?php 
	$published_bg_image = wp_get_attachment_image_url(get_field('published_bg_image'),'full');
	$published_heading = get_field('published_heading');
	$published_sub_heading = get_field('published_sub_heading');
	$published_body_text = get_field('published_body_text');
	?>
	<section class="about_sec5" style="background-image: url(<?php echo $published_bg_image; ?>);">
	    <div class="container">
	    	<?php 
	    	if(!empty($published_heading)): echo '<h2 class="sec_title">'.$published_heading.'</h2>'; endif;
	    	if(!empty($published_sub_heading)): echo '<h3>'.$published_sub_heading.'</h3>'; endif;
	    	echo $published_body_text;
	    	?>
	    </div>
	</section>
	<?php 
	$all_image = wp_get_attachment_image(get_field('all_image'),'medium_large');
	$all_heading = get_field('all_heading');
	$all_subheading = get_field('all_subheading');
	$all_body_text = get_field('all_body_text');
	?>
	<section class="homepage-sec1" style="background-image: url(<?php echo IMG.'patern.png'; ?>);">
	    <div class="container">
	        <div class="row">
	        	<?php 
	        	if(!empty($all_image)): echo '<div class="col-6"><div class="border_image">'.$all_image.'</div></div>'; endif;
	        	if(!empty($all_body_text)):
	           	?>
	            <div class="col-6">
	            	<?php 
	            	if(!empty($all_heading)): echo '<h2 class="sec_title">'.$all_heading.'</h2>'; endif;
					if(!empty($all_subheading)): echo '<h4>'.$all_subheading.'</h4>'; endif;
	            	echo $all_body_text;
	            	if(have_rows('all_content_block')):
	            		while(have_rows('all_content_block')): the_row();
	            		$heading = get_sub_field('heading');
	            		$body_text = get_sub_field('body_text');
	            		echo '<h2>'.$heading.'</h2>';
	            		echo $body_text;
	            		endwhile;
	            	endif;
	                ?>
	            </div>
	        	<?php endif; ?>
	        </div>
	    </div>
	</section>
	<?php 
	$certified_image = wp_get_attachment_image(get_field('certified_image'),'medium_large');
	$certified_heading = get_field('certified_heading');
	$certified_body_text = get_field('certified_body_text');
	?>
	<section class="community-sec1">
	    <div class="container">
	        <div class="row">
	        	<?php 
	        	if(!empty($certified_body_text)):
	        	?>
	            <div class="col-6">
	                <?php 
	            	if(!empty($certified_heading)): echo '<h2 class="sec_title">'.$certified_heading.'</h2>'; endif;
	            	echo $certified_body_text; 
	                ?>
	            </div>
	        	<?php 
	        	endif; 
	        	if(!empty($certified_image)): echo '<div class="col-6">'.$certified_image.'</div>'; endif; 
	        	?>
	        </div>
	    </div>
	</section>
	<?php 
	$us_bg_image = wp_get_attachment_image_url(get_field('us_bg_image'),'full');
	$us_heading = get_field('us_heading');
	?>
	<section class="about_sec8" style="background-image: url(<?php echo $us_bg_image; ?>);">
	    <div class="cotainer">
	        <h2><?php echo $us_heading; ?></h2>
	    </div>
	</section>
	<?php 
	$in_heading = get_field('in_heading');
	$in_body_text = get_field('in_body_text');
	$in_video = get_field('in_video');
	?>
	<section class="community-sec1">
	    <div class="container">
	        <div class="row">
	        	<?php 
	        	if(!empty($in_video)):
	        	?>
	            <div class="col-6">
	                <video controls="">
	                    <source type="video/mp4" src="<?php echo $in_video; ?>" />
	                </video>
	            </div>
	            <?php 
	        	endif;
	        	if(!empty($in_body_text)):
	        	?>
	            <div class="col-6">
	                <?php 
	            	if(!empty($in_heading)): echo '<h2 class="sec_title">'.$in_heading.'</h2>'; endif;
	            	echo $in_body_text; 
	                ?>
	            </div>
	            <?php 
		        endif;
		        ?>
	        </div>
	    </div>
	</section>
</div>
<?php 
get_footer(); 
?>
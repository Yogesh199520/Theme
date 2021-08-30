<?php
/*==============================*/
// @package agency
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */

get_header(); 

get_template_part('template-part/inner-banner');
$about_page_body_text = get_field('about_page_body_text');
$about_page_image = wp_get_attachment_image(get_field('about_page_image'),'about-thumb-alt');
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
        	<?php 
        	if(!empty($about_page_body_text)): echo '<div class="col-md-6 mar-30">'.$about_page_body_text.'</div>';  endif; 
        	if(!empty($about_page_image)): echo '<div class="col-md-6"><div class="media-box">'.$about_page_image.'</div></div>'; endif; 
        	?>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<?php 
get_template_part('template-part/stats');
$our_colored_heading = get_field('our_colored_heading');
$our_heading = get_field('our_heading');
$our_text = get_field('our_text');
if(have_rows('our_team')): 
?>
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s">
                    <?php 
                    if(!empty($our_colored_heading)): echo '<h6>'.$our_colored_heading.'</h6>'; endif; 
                    if(!empty($our_heading)): echo '<h3>'.$our_heading.'</h3>'; endif; 
                    if(!empty($our_text)): echo '<p>'.$our_text.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="team-list">
                	<?php
		            while(have_rows('our_team') ): the_row();
		            $profile_image = wp_get_attachment_image(get_sub_field('profile_image'),'about-thumb');
		            $name = get_sub_field('name');
		            $designation = get_sub_field('designation');
		            ?>
                    <li>
                        <div class="member-box">
                            <?php if(!empty($profile_image)): echo html_entity_decode(esc_html($profile_image)); endif; ?>
                            <div class="member-info">
                            	<?php
                            	if(!empty($name)): echo '<h5>'.$name.'</h5>'; endif; 
                            	if(!empty($designation)): echo '<p>'.$designation.'</p>'; endif;
                            	if(have_rows('social_links')): 
                            	?>
                                <ul class="member-social">
                                	<?php
						            while(have_rows('social_links') ): the_row();
						            $icon = get_sub_field('icon');
						            $url = get_sub_field('url');
						            echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>'; 
						            endwhile; 
						            ?>
                                </ul>
                            	<?php endif; ?>
                            </div>
                        </div>
                    </li>
                	<?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php echo do_shortcode('[products limit="12" columns="2" orderby="popularity" class="quick-sale" on_sale="false"]'); ?>
<!--============================== Content Section End ==============================-->
<?php
endif; 
get_footer(); 
?>
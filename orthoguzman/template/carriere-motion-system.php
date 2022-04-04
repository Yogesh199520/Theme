<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Carriere Motion System */

get_header();

get_template_part('template-part/inner-banner');
$motion_heading = get_field('motion_heading');
$motion_video = get_field('motion_video');
?>
<section class="before_after_sec2">
    <div class="container">
    	<?php 
    	if(!empty($motion_heading)): echo '<h2 class="sec_title">'.$motion_heading.'</h2>'; endif;
    	if(!empty($motion_video)): echo '<div class="before_after_video2">'.$motion_video.'</div>'; endif;
    	?>
    </div>
</section>
<?php 
get_footer(); 
?>
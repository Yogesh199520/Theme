<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Testimonials */

get_header();

get_template_part('template-part/inner-banner');

if(have_rows('testimonial_page')):
?>
<div id="content">
    <section class="testimonials-sec1">
        <div class="container">
            <div class="row">
            	<?php 
            	while(have_rows('testimonial_page')): the_row();
	            $tagline = get_sub_field('tagline');
	            $quotes = get_sub_field('quotes');
	            $name = get_sub_field('name');
            	?>
                <div class="col-4">
                	<?php
                	if(!empty($tagline)): echo '<h4>'.$tagline.'</h4>'; endif;
                	echo $quotes;
                	if(!empty($name)): echo '<h6>'.$name.'</h6>'; endif;
                	?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</div>
<?php 
endif;

get_footer(); 
?>
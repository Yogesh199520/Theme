<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Itero Digital Impression System */
get_header();

get_template_part('template-part/inner-banner');
?>
<div id="content">
	
    <section class="invi-sec1">
        <div class="container">
                <?php if(get_field('content_section_if_image')): ?>
            <?php $itero_image = get_field('content_section_image'); ?>
		<p><img class="aligncenter" src="<?php echo $itero_image['url']; ?>" alt="<?php echo $itero_image['alt']; ?>" /></p>
		<?php endif; ?>
            <?php if(have_rows('content_section_block')): while(have_rows('content_section_block')): the_row(); ?>
            <h2><?php the_sub_field('heading');?> </h2>
            <?php the_sub_field('text');?>
            <?php endwhile; endif; wp_reset_query(); ?>
        </div>
    </section>
    
</div>
<?php 
get_footer(); 
?>
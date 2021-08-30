<?php
/**
 * Template Name: About
 *
 * @package American-narratives - American narative podcast
 * @author Think EQ
 */
 ?>
<?php get_header();
	$bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
	$bg_image_mob = wp_get_attachment_image_url(get_field('bg_image_mob'),'medium_large');
	$bold_heading = get_field('bold_heading');
	$red_heading = get_field('red_heading');
?>

<div class="about-banner" style="background-image: url(<?php echo $bg_image; ?>);padding: 35px;">
	<h1><?php echo $bold_heading; ?></h1>
	<p><?php echo $red_heading; ?></p>
</div>
<div class="about-banner" style="background-image: url(<?php echo $$bg_image_mob; ?>);display: none;">
	<h1><?php echo $bold_heading; ?></h1>
	<p><?php echo $red_heading; ?></p>
</div>

<?php get_footer(); ?>

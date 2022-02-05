<?php 
$map_iframe = get_sub_field('map_iframe');
if(!empty($map_iframe)):
?>
<div class="map-container">
	<?php echo $map_iframe; ?>
</div> 
<?php endif; ?>
<?php $copyright = get_field('copyright_text','option');
$longitude = get_field('longitude'); $latitude = get_field('latitude');?>
<?php if(!is_page_template('templates/home.php')){ ?>
		<footer>
			<?php if(have_rows('social','option')): ?>
			<ul class="socialLinks">
				<?php while(have_rows('social','option')): the_row(); $icon = get_sub_field('social_icon'); $link = get_sub_field('social_link'); ?>
				<li><a href="<?php echo esc_url($link); ?>" target="_blank"><?php echo $icon; ?></a></li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
			<?php echo $copyright; ?>
		</footer>
		</div>
	</div>
</div>
<?php } ?>
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/animsition.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/heading.js"></script> 
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/imagesloaded.js"></script>
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/masonry-3.1.4.js"></script>
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/masonry.filter.js"></script>
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo THEMEDIR; ?>/include/js/custom.js"></script>
<?php if(is_page_template('templates/contact.php')){ ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
/*==========================*/	
/* Google Map */	
/*==========================*/
if($('#map-canvas').length != 0){
	var map;
	function initialize() {
		var mapOptions = {
			zoom: 14,
			scrollwheel: false,
		 	center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
		 	styles: [
						{"stylers": [{ hue: "#43BFC7" },
						{ saturation: 0 },
						{ lightness: 0 }]},
					{
				      "featureType": "road",
				      "elementType": "labels",
				      "stylers": [{"visibility": "off"}]
				    },
				    {
				      "featureType": "road",
				      "elementType": "geometry",
				      "stylers": [{"lightness": 100},
				            {"visibility": "simplified"}]
				    }
		 	]
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		var image = '<?php echo IMG; ?>/map-marker.png';
		var myLatLng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
		var beachMarker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image
		 });
	}

	google.maps.event.addDomListener(window, 'load', initialize);
}
</script>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
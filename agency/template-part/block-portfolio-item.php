<?php
$heading = get_field( 'heading' );
$body_text = get_field( 'body_text' );

echo '<div class="portfolio-item">';
	
	if( !empty( $heading ) )
		echo '<h3 class="portfolio-heading">' . $heading . '</h3>';
	if( !empty( $body_text ) )
		echo '<div class="portfolio-body_text">' . $body_text . '</div>';
echo '</div>';

?>
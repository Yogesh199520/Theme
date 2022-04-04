<?php
/*==============================*/
// @package Paradise
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
  exit; // Exit if accessed directly
}


$quality_heading = get_field('quality_heading','option');
$quality_text = get_field('quality_text','option');
$delivery_heading = get_field('delivery_heading','option');
$image = wp_get_attachment_image(get_field('image','option'),'medium');
$delivery_text = get_field('delivery_text','option');
$contact_heading = get_field('contact_heading','option');
$address = get_field('address','option');
?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <?php if(!empty($quality_heading || $quality_text)): ?>
            <div class="col-4">
                <?php 
                if(!empty($quality_heading)): echo '<h4>'.$quality_heading.'</h4>'; endif;
                echo $quality_text;
                ?>
            </div>
            <?php 
            endif;
            if(!empty($delivery_heading || $delivery_text)):
            ?>
            <div class="col-4 center">
                <?php 
                if(!empty($delivery_heading)): echo '<h4>'.$delivery_heading.'</h4>'; endif;
                echo $image;
                if(!empty($delivery_text)): echo '<p>'.$delivery_text.'</p>'; endif;
                ?>
            </div>
            <?php 
            endif;
            if(!empty($contact_heading || $address)):
            ?>
            <div class="col-4 right">
                <?php 
                if(!empty($contact_heading)): echo '<h4>'.$contact_heading.'</h4>'; endif;
                echo $address;
                ?>
            </div>
            <?php 
            endif;
            ?>
        </div>
    </div>
</footer>
</div>
<?php
wp_footer();
?>
</body>
</html>
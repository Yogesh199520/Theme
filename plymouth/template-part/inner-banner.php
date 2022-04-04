<?php 
$innerbanner_bg_image = wp_get_attachment_image_url(get_field('innerbanner_bg_image'),'full');
$innerbanner_title = get_field('innerbanner_title');
?>
<div class="page_banner" style="background-image: url(<?php echo $innerbanner_bg_image; ?>);">
    <div class="page_title_layer">
        <?php echo '<h1>'.(!empty($innerbanner_title)?$innerbanner_title:get_the_title()).'</h1>'; ?>
    </div>
</div>
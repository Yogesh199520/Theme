<?php 
$bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'1536x1536');
$bg_image_mob = wp_get_attachment_image_url(get_sub_field('bg_image_mob'),'medium_large');
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
if(!empty($bg_image)):
?>
<div class="page-hero-container d-flex flex-column justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <div class="page-hero-content">
                    <?php 
                    if(!empty($title)): echo '<h1>'.$title.'</h1>'; endif;
                    if(!empty($subtitle)): echo '<p>'.$subtitle.'</p>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-hero-img d-none d-md-block" style="background-image:url(<?php echo $bg_image; ?> )"></div>
    <div class="page-hero-img d-block d-md-none" style="background-image:url(<?php echo $bg_image_mob; ?>)"></div>
</div> 
<?php 
endif;
?>
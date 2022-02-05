<?php 
$bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'1536x1536');
$bg_image_mob = wp_get_attachment_image_url(get_sub_field('bg_image_mob'),'medium_large');
$icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
$overlay = get_sub_field('overlay');
$text_color = get_sub_field('text_color');
$title = get_sub_field('title');
$short_text = get_sub_field('short_text');
if($overlay):
    $overlay_cls = 'has_overlay';
else:
    $overlay_cls = 'no_overlay';
endif;
?>
<div class="page-hero-container d-flex flex-column justify-content-center <?php echo $overlay_cls; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 col-md-10 offset-md-0">
                <div class="page-hero-content d-flex flex-wrap align-items-start <?php echo $text_color; ?>-text">
                    <?php 
                    if(!empty($icon)): echo '<div class="page-hero-icon">'.$icon.'</div>'; endif;
                    if(!empty($title || $short_text)):
                    ?>
                    <div class="page-hero-text">
                        <?php 
                        if(!empty($title)): echo '<h1>'.$title.'</h1>'; endif;
                        if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif;
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-hero-arrow-down d-block d-md-none"><img src="<?php echo IMG.'arrow-down.svg'; ?>" alt="go-down"></div>
    <div class="page-hero-img d-none d-md-block" style="background-image:url(<?php echo $bg_image; ?>)"></div>
    <div class="page-hero-img d-block d-md-none" style="background-image:url(<?php echo $bg_image_mob; ?>)"></div>
</div>
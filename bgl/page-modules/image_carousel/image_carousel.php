<?php 
$count = get_sub_field('image_carousel_tabs');
if(have_rows('image_carousel_tabs')):
$tabs_count = count($count);
?>
<div class="content-container img-carousel-container p-0">
    <div class="img-carousel-upper">
        <?php 
        while(have_rows('image_carousel_tabs')): the_row();
        $index = get_row_index();
        ?>
        <div class="img-carousel-image img-carousel-img-slider center-arrow pb-0 white-dots" id="carousel-gal<?php echo $index; ?>">
            <?php 
            while(have_rows('image_carousel')): the_row();
            $image = wp_get_attachment_image_url(get_sub_field('image'),'large');
            $image_mob = wp_get_attachment_image_url(get_sub_field('image_mob'),'medium_large');
            ?>
            <div class="carousel-image-slide">
                <img src="<?php echo $image; ?>" class="d-md-block d-none">
                <img src="<?php echo $image_mob; ?>" class="d-md-none d-block">
            </div>
            <?php endwhile; ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php if($tabs_count > 1): ?>
    <div class="img-carousel-lower">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="img-carousel-text img-carousel-text-slider d-lg-flex flex-lg-wrap pb-0">
                        <?php 
                        while(have_rows('image_carousel_tabs')): the_row();
                        $index = get_row_index();
                        $tab_name = get_sub_field('tab_name');
                        ?>
                        <div class="img-carousel-text-slide" data-tab="#carousel-gal<?php echo $index; ?>">
                            <span class="btn"><?php echo $tab_name; ?></span>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>
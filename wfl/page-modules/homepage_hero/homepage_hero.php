<?php 
if(have_rows('hero_carousel')): 
?>
<div class="hero-outer">
    <div class="hero-container hero-slider white-dots">
        <?php 
        while(have_rows('hero_carousel')): the_row();
        $heading = get_sub_field('heading');
        $short_text = get_sub_field('short_text');
        ?>
        <div class="hero-slide d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="hero-box">
                            <?php 
                            if(!empty($heading)): echo '<h1 class="hero-heading">'.$heading.'</h1>'; endif; 
                            if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php endwhile; ?>
    </div>
    <div class="hero-container hero-image-slider d-none d-md-block">
        <?php
        while(have_rows('hero_carousel')): the_row(); 
            if(have_rows('image_or_video')):
                while(have_rows('image_or_video')): the_row();
                    if(get_row_layout() == 'image'):
                        $image = wp_get_attachment_image_url(get_sub_field('image'),'large');
                        echo '<div class="hero-slide d-flex align-items-center" style="background-image:url('.$image.');"></div>';
                    elseif(get_row_layout() == 'video'):
                        $video = get_sub_field('video');
                        echo '<div class="hero-slide d-flex align-items-center">'.$video.'</div>';
                    endif;
                endwhile;
            endif;
        endwhile;
        ?>
    </div>
    <div class="hero-container hero-image-slider d-block d-md-none">
        <?php
        while(have_rows('hero_carousel')): the_row(); 
            if(have_rows('image_or_video')):
                while(have_rows('image_or_video')): the_row();
                    if(get_row_layout() == 'image'):
                        $image_mob = wp_get_attachment_image_url(get_sub_field('image_mob'),'medium_large');
                        echo '<div class="hero-slide d-flex align-items-center" style="background-image:url('.$image_mob.');"></div>';
                    elseif(get_row_layout() == 'video'):
                        $video = get_sub_field('video');
                        echo '<div class="hero-slide d-flex align-items-center">'.$video.'</div>';
                    endif;
                endwhile;
            endif;
        endwhile;
        ?>
    </div>
    <div class="scroll-down" data-section="intro">
        <img src="<?php echo IMG.'arrow-down.svg'; ?>" alt="arrow-down" />
    </div>
</div>
<?php endif; ?>
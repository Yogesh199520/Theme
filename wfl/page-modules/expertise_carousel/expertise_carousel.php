<?php 
$icon = wp_get_attachment_image(get_sub_field('icon'),'thumbnail');
$title = get_sub_field('title');
$expertise_carousel = get_sub_field('expertise_carousel');
if($expertise_carousel): 

?>
<div class="expertise-carousel-container white-dots">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4 offset-md-1">
                <div class="expertise-content-inner">
                    <?php if(!empty($icon || $title)): ?>
                    <div class="expertise-head d-none d-md-flex ">
                        <?php 
                        if(!empty($icon)): echo $icon; endif;
                        if(!empty($title)): echo '<h1>'.$title.'</h1>'; endif;
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="expertise-text-slide">
                        <ul class="expertise-text-list expertise-text-slider pb-0">
                            <?php foreach($expertise_carousel as $term): ?>
                            <li class="expertise-text-item">
                                <h3 class="d-none d-md-block"><?php echo $term->name; ?></h3>
                                <p><?php echo $term->description; ?></p>
                                <div class="expertise-btn d-none d-md-block">
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="btn btn-primary btn-sm">FIND OUT MORE</a>
                                </div>
                                <div class="expertise-btn d-block d-md-none">
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="btn btn-default">FIND OUT MORE</a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="expertise-img-slide-box">
        <?php if(!empty($icon || $title)): ?>
        <div class="expertise-head d-flex d-md-none ">
            <?php 
            if(!empty($icon)): echo $icon; endif;
            if(!empty($title)): echo '<h1>'.$title.'</h1>'; endif;
            ?>
        </div>
        <?php endif; ?>
        <div class="expertise-img-slide expertise-img-slider d-none d-md-block pb-0">
            <?php 
            foreach($expertise_carousel as $term):
            $bg_image = wp_get_attachment_image(get_field('bg_image',$term),'medium_large');
            ?>
            <div class="expertise-img-box">
                <?php echo $bg_image; ?>
            </div>
            <?php endforeach; ?>
            
        </div>
        <div class="expertise-img-slide expertise-img-slider d-block d-md-none pb-0">
            <?php 
            foreach($expertise_carousel as $term):
            $bg_image = wp_get_attachment_image(get_field('bg_image',$term),'medium_large');
            ?>
            <div class="expertise-img-box">
                <?php echo $bg_image; ?>
                <h3 class="d-block d-md-none"><?php echo  $term->name; ?></h3>
            </div>
            <?php endforeach; ?>
        </div>
    </div>  
</div>
<?php endif; ?>
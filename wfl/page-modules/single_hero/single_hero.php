<?php 
$right_image = wp_get_attachment_image(get_sub_field('right_image'),'medium_large');
$title = get_sub_field('title');
$description = get_sub_field('description')
?>
<div class="single-hero-container d-md-flex align-items-center">
    <?php if(!empty($title || $description)): ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-1 col-md-6">
                <div class="single-hero-text">
                    <?php 
                    if(!empty($title)):echo '<h1>'.$title.'</h1>'; endif;
                    if(!empty($description)):echo '<h2>'.$description.'</h2>'; endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif;
    if(!empty($right_image)): echo '<div class="single-hero-img">'.$right_image.'</div>'; endif; 
    ?>
</div> 
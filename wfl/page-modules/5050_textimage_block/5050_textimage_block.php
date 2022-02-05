<?php 
$image_option = get_sub_field('image_option');
$bg_color = get_sub_field('bg_color');
$title = get_sub_field('title');
$body_text = get_sub_field('body_text');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
$btn_color = sanitize_title($bg_color['label']);
if($btn_color =='black' || $btn_color =='purple'|| $btn_color =='blue'):
    $btn_cls = 'btn-primary';
else:
    $btn_cls = 'btn-default';
endif;
?>
<!--============================== Services grid Start ============================-->
<div class="content-container image-text-50-50-container <?php echo sanitize_title($bg_color['label']).'-bg img-'.$image_option; ?>">
    <?php if(!empty($title || $body_text || $button_text)): ?>
    <div class="container">
        <div class="row img-text-move">
            <div class="col-md-6">
                <div class="image-text-50-50-content">
                    <?php 
                    if(!empty($title)): echo '<h3>'.$title.'</h3>'; endif;
                    echo $body_text;
                    if(!empty($button_text)): echo '<div class="img-text-cta"><a href="'.$button_link.'" class="btn btn-sm '.$btn_cls.'">'.$button_text.'</a></div>'; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    endif;
    if(have_rows('image_or_video')):
        while(have_rows('image_or_video')): the_row();
            if(get_row_layout() == 'image'):
                $image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                echo '<div class="image-text-50-50-media">'.$image.'</div>';
            elseif(get_row_layout() == 'video'):
                $video = get_sub_field('video');
                echo '<div class="image-text-50-50-media">'.$video.'</div>';
            endif;
        endwhile;
    endif; 
    ?>
</div>
<!--==============================  Services grid End ==============================-->
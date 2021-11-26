<?php 
$padding_options = get_sub_field('padding_options');
$bg_color = get_sub_field('bg_color');
$image_option = get_sub_field('image_option');
$image = wp_get_attachment_image(get_sub_field('image'),'large');
$heading = get_sub_field('heading');
$body_text = get_sub_field('body_text');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
?>
<!--============================== 2/3 Image and Text Start ============================-->
<div class="content-container mob-pt-0 <?php echo implode(' ', $padding_options); echo ($bg_color=='siege'?' color-bg':''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-box d-lg-flex flex-wrap align-items-center <?php echo 'image-'.$image_option; ?>">
                    <?php if(!empty($image)): echo '<div class="cb-right">'.$image.'</div>'; endif; ?> 
                    <div class="cb-left d-flex flex-column">
                        <?php 
                        if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif; 
                        echo $body_text;
                        if(!empty($button_text)): echo '<div class="cb-cta"><a href="'.$button_link.'" class="btn btn-primary2">'.$button_text.'</a></div>'; endif; 
                        ?>
                    </div>               
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================  2/3 Image and Text End ==============================-->
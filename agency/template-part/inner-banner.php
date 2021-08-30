<?php
$pid = get_option('page_for_posts');
if(is_home()):
    $bg_image = wp_get_attachment_image_url(get_field('bg_image',$pid),'full');
    $heading = get_field('inner_heading',$pid);
else:
    $bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
    $heading = get_field('inner_heading');
endif; 
if(!empty($heading)):
    $title = $heading;
else:
    $title = get_the_title();
endif;
?>
<div class="inner-banner" style="background-image: url(<?php echo esc_html($bg_image); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php echo esc_html($title); ?></h2>
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
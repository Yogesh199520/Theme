<?php
$bg_color = get_sub_field('bg_color');
$sub_title = get_sub_field('sub_title');
$title = get_sub_field('title');
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
?>
<!--============================== Full Width CTA Start ============================-->
<!-- 3 classes for color varaint .dark-color-bg, .light-color-bg, .siege-bg -->
<div class="full-width-cta-container add-bg-graphic <?php echo $bg_color; ?>-bg">
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if($sub_title): echo '<h6>'.$sub_title.'</h6>'; endif;
                if($title): echo '<h4>'.$title.'</h4>'; endif;
                if($button_text): echo '<a href="'.$button_link.'" class="btn btn-primary">'.$button_text.'</a>'; endif;
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Full Width CTA End ============================-->
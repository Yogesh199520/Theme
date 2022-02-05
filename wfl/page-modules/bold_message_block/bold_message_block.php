<?php 
$bg_color = get_sub_field('bg_color');
$title = get_sub_field('title');
$body_text = get_sub_field('body_text');
?>
<div class="content-container <?php echo sanitize_title($bg_color['label']).'-bg'; ?> bold-msg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php
                    if(!empty($title)): echo '<h3>'.$title.'</h3>'; endif; 
                    if(!empty($body_text)): echo '<h4>'.$body_text.'</h4>'; endif; 
                ?>
            </div>
        </div>
    </div>
</div>
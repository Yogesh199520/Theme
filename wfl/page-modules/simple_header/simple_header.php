<?php
$bg_color = get_sub_field('bg_color');
$title = get_sub_field('title');
$short_text = get_sub_field('short_text');
?>
<!--==============================  Simple Header Start ============================--> 
<div class="simple-hero d-flex flex-column justify-content-center <?php echo(!empty($short_text)?'more-height ':''); echo sanitize_title($bg_color['label'].'-bg'); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-1">
                <h1><?php echo $title; ?></h1>
                <?php if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif; ?>
            </div>
        </div>
    </div>
</div> 
<!--============================== Simple Header End ==============================-->
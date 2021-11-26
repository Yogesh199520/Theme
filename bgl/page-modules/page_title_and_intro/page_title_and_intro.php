<?php 
$padding_options = get_sub_field('padding_options');
$title = get_sub_field('title');
$intro_text = get_sub_field('intro_text');
?>
<div class="content-container intro-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php 
                if(!empty($title)): echo '<h6>'.$title.'</h6>'; endif; 
                echo $intro_text;
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
$padding_options = get_sub_field('padding_options');
$intro_text = get_sub_field('intro_text');
if(!empty($intro_text)):
?>
<div class="content-container intro-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h6><?php echo $intro_text; ?></h6>
            </div>
        </div>
    </div>
</div> 
<?php endif; ?>
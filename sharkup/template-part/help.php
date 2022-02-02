<?php
$scta_sub_heading = get_field('scta_sub_heading','option');
$scta_heading = get_field('scta_heading','option');
$scta_body_text = get_field('scta_body_text','option');
$scta_button_text = get_field('scta_button_text','option');
if(!empty($scta_heading) || !empty($scta_body_text)):
?>
<div class="query-container d-flex align-items-center">
    <div class="query-bg" style="background-image: url('<?php echo IMG.'contact-banner.png'; ?>');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <?php
                    if(!empty($scta_sub_heading)): echo '<h4>'.$scta_sub_heading.'</h4>'; endif;
                    if(!empty($scta_heading)): echo '<h3>'.$scta_heading.'</h3>'; endif;
                    if(!empty($scta_body_text)): echo '<p>'.$scta_body_text.'</p>'; endif;
                    ?>
                </div>
                <?php if(!empty($scta_button_text)): ?>
                <div class="query-btn">
                    <a href="javascript:void(Tawk_API.toggle())" class="btn btn-outline btn-lg"><?php echo $scta_button_text; ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
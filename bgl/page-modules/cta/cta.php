<?php
$select_cta = get_sub_field('select_cta');
if(!empty($select_cta)):
$cta_len = count($select_cta);
?>
<!--============================== CTA Start ============================-->
<div class="cta-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-content d-flex flex-wrap align-items-stretch mobile-slider pb-0 <?php if($cta_len == 2): echo 'type2'; endif; ?>">
                    <?php  
                    foreach($select_cta as $scta_id):
                    $cta_icon = wp_get_attachment_image(get_field('cta_icon',$scta_id),'thumbnail');
                    $cta_title = get_field('cta_title',$scta_id);
                    $cta_text = get_field('cta_text',$scta_id);
                    ?>
                    <a href="<?php echo get_permalink($scta_id); ?>" class="cta-box d-flex flex-column align-items-center">
                        <?php
                        if(!empty($cta_icon)): echo '<div class="cta-icon d-flex align-items-center">'.$cta_icon.'</div>'; endif;
                        echo '<h4>'.(!empty($cta_title)?$cta_title:get_the_title($scta_id)).'</h4>';
                        if(!empty($cta_text)): echo '<p>'.$cta_text.'</p>'; endif;
                        ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== CTA End ============================-->
<?php endif; ?>

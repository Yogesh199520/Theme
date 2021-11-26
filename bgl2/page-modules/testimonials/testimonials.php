<?php 
$padding_options = get_sub_field('padding_options');
$bg_color = get_sub_field('bg_color');
$select_testimonial = get_sub_field('select_testimonial');
if($select_testimonial):
$client_photo = wp_get_attachment_image(get_field('client_photo',$select_testimonial),'medium'); 
$client_testimonial = get_field('client_testimonial',$select_testimonial);
$client_name = get_field('client_name',$select_testimonial);
$client_position = get_field('client_position',$select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($select_testimonial);
endif;

?>
<div class="content-container add-bg-graphic <?php echo implode(' ', $padding_options); echo $bg_color; ?>-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="testimonial-box">
                    <?php 
                    if(!empty($client_photo)): echo '<div class="testimonial-upper d-flex d-md-none"><div class="testimonial-img">'.$client_photo.'</div></div>'; endif; 
                    if(!empty($client_testimonial)): echo '<div class="testimonial-mid"><div class="testimonial-text"><p>'.$client_testimonial.'</p></div></div>'; endif; 
                    ?>
                    <div class="testimonial-lower d-flex align-items-center">
                        <?php if(!empty($client_photo)): echo '<div class="testimonial-img d-none d-md-flex">'.$client_photo.'</div>'; endif; ?>
                        <div class="testimonial-by">
                            <span><?php echo $client_name; ?></span>
                            <?php if(!empty($client_position)): echo '<small>'.$client_position.'</small>'; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
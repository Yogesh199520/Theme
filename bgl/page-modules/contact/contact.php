<?php 
$padding_options = get_sub_field('padding_options');
$right_image = wp_get_attachment_image(get_sub_field('right_image'),'medium_large');
$right_image_mob = wp_get_attachment_image(get_sub_field('right_image_mob'),'medium');
$select_form = get_sub_field('select_form'); 
$telephone = $GLOBALS['theme_options']['telephone'];
$telephone_strip = str_replace(' ', '', $telephone);
$email = $GLOBALS['theme_options']['email'];
$address = $GLOBALS['theme_options']['address'];
?>
<div class="content-container mob-pb-0 <?php echo implode(' ', $padding_options); ?>">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row d-flex">
            <div class="col-lg-5 offset-lg-1">
                <ul class="contact-details-list flex-column d-flex">
                    <?php if(!empty($address)): ?>
                    <li>
                        <div class="contact-details-box">
                            <div class="contact-detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <address><?php echo $address; ?></address>
                        </div>
                    </li>
                    <?php 
                    endif;
                    if(!empty($email || $telephone)):
                    ?>
                    <li class="small-icon">
                        <?php if(!empty($telephone)): ?>
                        <div class="contact-details-box">
                            <div class="contact-detail-icon"><i class="fas fa-mobile-alt"></i></div>
                            <a href="tel:<?php echo $telephone_strip; ?>"><?php echo $telephone; ?></a>
                        </div>
                        <?php
                        endif;
                        if(!empty($email)): 
                        ?>
                        <div class="contact-details-box">
                            <div class="contact-detail-icon"><i class="fas fa-envelope"></i></div>
                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php if(!empty($right_image || $right_image_mob)): ?>
            <div class="col-lg-5">
                <?php 
                if(!empty($right_image)): echo '<div class="media-box d-none d-md-block">'.$right_image.'</div>'; endif; 
                if(!empty($right_image_mob)): echo '<div class="media-box d-block d-md-none">'.$right_image_mob.'</div>'; endif; 
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php 
if(!empty($select_form)): 
?>
<div class="content-container color-bg">
    <div class="container os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
        <div class="row d-flex">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                <div class="general-contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="'.$select_form.'"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
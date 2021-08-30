<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Alumni Welfare Fund */
get_header();

$bg_image = wp_get_attachment_image(get_field('alumni_bg_image'),'full');
$alumni_heading = get_field('alumni_heading');
$alumni_body_text = get_field('alumni_body_text');
$alumni_button_text = get_field('alumni_button_text');
$alumni_button_link = get_field('alumni_button_link');
$form_id = get_field('alumni_choose_form');
if(!empty($bg_image)):
?>
<div class="content-container events-banner-container gray-bg">
   	<div class="container">
       <div class="row">
           <div class="col-lg-10 offset-lg-1">
           	<?php 
       		if(!empty($bg_image)): echo '<div class="events-banner os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">'.$bg_image.'</div>'; endif;
       		if(!empty($alumni_heading)): echo '<div class="eb-heading gradient-bg text-center"><h1 class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.32s">'.$alumni_heading.'</h1></div>'; endif; 
       		if(!empty($alumni_body_text)): 
           	?>
            <div class="eb-info os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.34s">
               	<?php echo $alumni_body_text; ?>
            </div>
            <?php 
            if(!empty($alumni_button_text)): 
            ?>
        	<div class="eb-info block-btn text-left pt-0">
        		<a href="<?php echo $alumni_button_link; ?>" class="btn-hover color-2"><?php echo $alumni_button_text; ?></a>
        	</div>
        	<?php 
        	elseif(!empty($form_id)):
        	?>
        	<div class="eb-info block-btn text-left pt-0">
        		<a href="javascript:void(0)" data-toggle="modal" data-target="#cf-7" class="btn-hover color-2">Know More</a>
        	</div>
        	<?php endif; endif; ?>
           </div>
       </div>
   </div>
</div>
<?php 
endif;
if(!empty($form_id)): 
?>
<!-- modal start -->
<div class="modal fade custom-modal" id="cf-7" data-keyboard="false" tabindex="-1" aria-labelledby="giftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
           
            <div class="">
                <div class="heading add-bott-line"><h5 class="gradient-text-3">Get in touch</h5></div>
                <?php echo do_shortcode('[contact-form-7 id="'.$form_id.'"]'); ?>
            </div>
        </div>
    </div>
</div>
<!-- modal end-->
<?php
endif;
get_footer(); 
?>
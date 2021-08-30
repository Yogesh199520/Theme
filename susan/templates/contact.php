<?php
/*==============================*/
// @package Susan
// @author Thinkeq
/*==============================*/
/* Template Name: Contact */
get_header(); 

$contact_body_text = get_field('contact_body_text');
$form_id = get_field('select_form');
if(!empty($form_id)):
?>
<!--============================== Content Start ==============================-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-inner">
                <?php get_template_part('template-part/inner-banner'); ?>
                <!--============================== Content Start ==============================-->
                <div class="content-container pt-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="main-content">
                                    <?php if(!empty($contact_body_text)): echo '<div class="contact-upper-content text-center">'.$contact_body_text.'</div>'; endif; ?>
                                    <div class="contact-form-container">
                                        <?php echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="Contact Form"]'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
get_footer(); 
?>
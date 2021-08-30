<?php
/*==============================*/
// @package HYD
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Contact Us */
get_header();

$phone = get_field('phone', 'option');
$email = get_field('email', 'option');
$address = get_field('address', 'option');
$con_heading = get_field('con_heading');
$con_sub_heading = get_field('con_sub_heading');
$get_heading = get_field('get_heading');
$get_sub_heading = get_field('get_sub_heading');
$form = get_field('select_form');
?>
<!--============================== Content Start ==============================-->
<div class="content-container contact-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.7s">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-left d-flex flex-column">
                            <div class="heading-2 text-blue text-center text-md-left">
                                <?php 
                                if(!empty($con_heading)): echo '<h2>'.$con_heading.'</h2>'; endif;
                                if(!empty($con_sub_heading)): echo ' <h4>'.$con_sub_heading.'</h4>'; endif;
                                ?>
                            </div>
                            <?php if(!empty($form)): ?>
                            <div class="contact-us-form">
                                <?php echo do_shortcode('[contact-form-7 id="'.$form.'"]'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-right">
                            <div class="heading-2 text-blue text-center text-md-left">
                                <?php 
                                if(!empty($get_heading)): echo '<h2>'.$get_heading.'</h2>'; endif;
                                if(!empty($get_sub_heading)): echo ' <h4>'.$get_sub_heading.'</h4>'; endif;
                                ?>
                            </div>
                            <ul class="contact-content-right">
                                <?php if(!empty($phone)): ?>
                                <li>
                                    <div class="contact-list">
                                        <div class="contact-icon">
                                            <img src="<?php echo IMG.'call.svg'; ?>" alt="Call icon">
                                        </div>
                                        <p>To book appointments call</p>
                                        <span><a href="tel:<?php echo str_replace(' ','',$phone); ?>"><?php echo $phone; ?></a></span>
                                    </div>
                                </li>
                                <?php
                                endif;
                                if(!empty($email)):
                                ?>
                                <li>
                                    <div class="contact-list">
                                        <div class="contact-icon">
                                             <img src="<?php echo IMG.'mail.png'; ?>" alt="Email icon">
                                        </div>
                                        <p>For any assistance mail us</p>
                                        <span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
                                    </div>
                                </li>
                                <?php
                                endif;
                                if(!empty($address)):
                                ?> 
                                <li>
                                    <div class="contact-list">
                                        <div class="contact-icon">
                                            <img src="<?php echo IMG.'location.svg'; ?>" alt="Address icon">
                                        </div>
                                        <p>Meet with us </p>
                                        <address><?php echo $address; ?></address>
                                    </div>
                                </li>
                                <?php 
                                endif; 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content end ==============================-->

<?php 
get_footer();
?>
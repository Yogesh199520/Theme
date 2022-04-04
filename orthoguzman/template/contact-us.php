<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Contact Us */

get_header();

get_template_part('template-part/inner-banner');
?>
<div id="content">
    <section class="contact_sec1">
        <div class="container">
            <?php echo do_shortcode('[gravityform id="1" title="true" description="false" ajax="true"]'); ?>
        </div>
    </section>
    <?php 
    $heading_one = get_field('heading_one');
    $heading_two = get_field('heading_two');
    $heading_three = get_field('heading_three');
    $address = get_field('address');
    $address_url = get_field('address_url');
    $phone = get_field('phone');
    $fax = get_field('fax');
    $fax_alt = preg_replace("/[^A-Za-z0-9 ]/", '', $fax);
   	$fax_tel = str_replace(' ', '', $fax_alt);
   	$phone_alt = preg_replace("/[^A-Za-z0-9 ]/", '', $phone);
   	$phone_tel = str_replace(' ', '', $phone_alt);
    $office_hours = get_field('office_hours');
    ?>
    <section class="contact-sec2">
        <div class="container">
            <div class="row">
                <div class="col-6">
                	<?php 
                	if(!empty($heading_one)): echo '<h1>'.$heading_one.'</h1>'; endif; 
                	if(!empty($heading_two)): echo '<h2>'.$heading_two.'</h2>'; endif; 
                	if(!empty($heading_three)): echo '<h2>'.$heading_three.'</h2>'; endif; 
                	if(!empty($address)): echo '<h4>Address:<br /><a href="'.$address_url.'" target="_blank" rel="noopener">'.$address.'</a></h4>'; endif;
                	if(!empty($phone || $fax)):
                	?>
                    <h4>
                    	<?php 
                    	if(!empty($phone)): echo 'Phone:&nbsp;<a href="tel:+1'.$phone_tel.'">'.$phone.'</a><br />'; endif; 
                        if(!empty($fax)): echo 'Fax:&nbsp;<a href="tel:+1'.$fax_tel.'">'.$fax.'</a>'; endif; 
                        ?>
                    </h4>
                	<?php endif; ?>
                </div>
                <?php if(!empty($office_hours)): ?>
                <div class="col-6">
                    <h2>Office Hours</h2>
                    <h3>
                        <?php echo $office_hours; ?>
                    </h3>
                </div>
            	<?php endif; ?>
            </div>
        </div>
    </section>
   <?php 
   if(have_rows('contact_content_block')):
   ?>
    <section class="contact-sec3">
        <div class="container">
            <?php
            while(have_rows('contact_content_block')): the_row();
            $heading = get_sub_field('heading');
            $body_text = get_sub_field('body_text');
            echo '<h2>'.$heading.'</h2>';
            echo $body_text;
            endwhile;
            ?>
        </div>
    </section>
    <?php endif; ?>
</div>


<?php 
get_footer(); 
?>
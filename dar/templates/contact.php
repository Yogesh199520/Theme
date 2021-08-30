<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Contact */
get_header();
$address = get_field('address','option');
$email = get_field('email','option');
$phone = get_field('phone','option');
$map = get_field('map');
$contact_heading = get_field('contact_heading');
?>
<!--============================== Content Start ==============================-->
<div class="contact-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-box d-flex flex-wrap">
                    <div class="contact-left">
                    	<?php if(!empty($map)): echo '<div class="map-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.2s">'.$map.'</div>'; endif; ?>
                        <div class="contact-details">
                        	<?php if(!empty($email)): ?>
	                          <p class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	                            <img src="<?php echo IMG.'email.svg'; ?>" alt="email icon" />
	                            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
	                          </p>
	                        <?php 
	                        endif;
	                        if(!empty($address)): 
	                        ?>
	                          <p class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
	                            <img src="<?php echo IMG.'location.svg'; ?>" alt="location icon" />
	                            <?php echo $address; ?>
	                          </p>
	                        <?php
	                        if(!empty($phone)):
	                        endif;
	                        ?>
	                            <p class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
	                                <img src="<?php echo IMG.'phone.svg'; ?>" alt="phone icon" />
	                            	<a href="tel:<?php echo str_replace(' ','',$phone); ?>"><?php echo $phone; ?></a>
	                            </p>
	                        <?php
	                    	endif; 
	                    	?>
                        </div>
                    </div>
                    <?php if(have_rows('contact_us')):?>
                    <div class="contact-right gradient-yellow-bg">
                    	<?php if(!empty($contact_heading)): echo '<h5 class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.2s">'.$contact_heading.'</h5>'; endif; ?>
                        <ul class="social-links">
                        	<?php while(have_rows('contact_us')): the_row();
                        	$heading = get_sub_field('heading');
                        	$icon = wp_get_attachment_image(get_sub_field('icon'),'medium');	
                        	$url = get_sub_field('url');
                            $index = get_row_index()+2;
                        	echo '<li class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.'.$index.'s"><a href="'.$url.'" class="social-item" target="_blank">'.$icon.'<span>'.$heading.'</span></a></li>';
                        	endwhile;
                        	?>
                        </ul>
                    </div>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>

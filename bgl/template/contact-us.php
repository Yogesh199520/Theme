<?php
/*==============================*/
// @package Booth Golf & Leisure
// @author ThinkEQ
/*==============================*/
/* Template Name: Contact Us */
get_header();

$address = get_field('address');
$map_link = get_field('map_link');
$phone = get_field('phone');
$tel = str_replace(' ', '', $phone);
$email = get_field('email');
$enable_form = get_field('enable_form');
$form_id = get_field('select_form');
$image = wp_get_attachment_image(get_field('image'),'1536x1536');
$image_mob = wp_get_attachment_image(get_field('image_mob'),'large');
?>	
<!--============================== Content Start ==============================-->
<div class="content-container color-bg mob-pt-0">
    <div class="container">
        <div class="row d-flex flex-row-reverse">
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-right-content">
                	<?php 
                	if(!empty($image)): echo '<div class="media-box d-none d-md-block contact-img">'.$image.'</div>'; endif;
                	if(!empty($image_mob)): echo '<div class="media-box d-block d-md-none contact-img">'.$image_mob.'</div>'; endif; 
                	?>
                    <ul class="contact-details-list flex-column d-none d-md-flex">
                    	<?php if(!empty($address)): ?>
                        <li>
                            <div class="contact-details-box">
                                <div class="contact-detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <address><?php echo $address; ?></address>
                            </div>
                        </li>
                        <?php 
	                    endif;
	                    if(!empty($map_link)):
	                    ?>
                        <li>
                            <div class="contact-details-box">
                                <div class="contact-detail-icon"><i class="fas fa-map-marked-alt"></i></div>
                                <a href="<?php echo $map_link; ?>" target="_blank" class="map-link">Find us on Google Maps</a>
                            </div>
                        </li>
                        <?php 
	                    endif;
	                    if(!empty($phone) || !empty($email)): 
	                    ?>
                        <li class="small-icon">
	                        <?php 
	                        if(!empty($email)): echo '<div class="contact-details-box"><div class="contact-detail-icon"><i class="fas fa-mobile-alt"></i></div><a href="tel:'.$tel.'">'.$phone.'</a></div>'; endif;
	                        if(!empty($email)): echo '<div class="contact-details-box"><div class="contact-detail-icon"><i class="fas fa-envelope"></i></div><a href="tel:'.$email.'">'.$email.'</a></div>'; endif;
	                        ?>
                        </li>
                    	<?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php if($enable_form && !empty($form_id)): ?>
            <div class="col-lg-4 offset-lg-1">
                <div class="general-contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="'.$form_id.'" title="Contact Form"]'); ?>
                </div>
            </div>
        	<?php endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<!--============================== Content Start ==============================-->
<div class="content-container pb-0 d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-right-content">
                    <ul class="contact-details-list d-flex flex-column">
                        <?php if(!empty($address)): ?>
                        <li>
                            <div class="contact-details-box">
                                <div class="contact-detail-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <address><?php echo $address; ?></address>
                            </div>
                        </li>
                        <?php 
	                    endif;
	                    if(!empty($map_link)):
	                    ?>
                        <li>
                            <div class="contact-details-box">
                                <div class="contact-detail-icon"><i class="fas fa-map-marked-alt"></i></div>
                                <a href="<?php echo $map_link; ?>" target="_blank" class="map-link">Find us on Google Maps</a>
                            </div>
                        </li>
                        <?php 
	                    endif;
	                    if(!empty($phone) || !empty($email)): 
	                    ?>
                        <li class="small-icon">
	                        <?php 
	                        if(!empty($email)): echo '<div class="contact-details-box"><div class="contact-detail-icon"><i class="fas fa-mobile-alt"></i></div><a href="tel:'.$tel.'">'.$phone.'</a></div>'; endif;
	                        if(!empty($email)): echo '<div class="contact-details-box"><div class="contact-detail-icon"><i class="fas fa-envelope"></i></div><a href="tel:'.$email.'">'.$email.'</a></div>'; endif;
	                        ?>
                        </li>
                    	<?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
$contact_heading = get_field('contact_heading');
$select_team_member = get_field('select_team_member');
if(!empty($select_team_member)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
    	<?php if(!empty($contact_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading text-center">
                    <h4><?php echo $contact_heading; ?></h4>
                </div>
            </div>
        </div>
    	<?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <ul class="member-list d-flex flex-wrap justify-content-center contact-member">
                    <?php 
                    foreach($select_team_member as $team_id):
                        $photo = wp_get_attachment_image(get_field('photo',$team_id),'medium_large');
                        $destination = get_field('destination',$team_id);
                        $email = get_field('email',$team_id);
                        $name = get_the_title($team_id);
                    ?>
                	<li class="member-item">
                        <div class="member-box d-flex flex-column">
                            <?php 
                            if(!empty($photo)): echo '<div class="member-img">'.$photo.'</div>'; endif;
                            if(!empty($name) || !empty($destination) || !empty($email)):  
                            ?>
                            <div class="member-details">
                                <?php 
                                if(!empty($name)): echo '<h5>'.$name.'</h5>'; endif;
                                if(!empty($destination)): echo '<h6>'.$destination.'</h6>'; endif;
                                ?>
                            </div>
                            <div class="member-contact mt-auto">
                                <?php if(!empty($email)): echo '<h6><a href="mailto:'.$email.'">'.$email.'</a></h6>'; endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

get_footer();
?>
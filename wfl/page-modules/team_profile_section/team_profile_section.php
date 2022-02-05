<?php 
$body_text = get_sub_field('body_text');
$phone = get_sub_field('phone');
$phone_strip = preg_replace('/\\s+/', '-', $phone);
$email = get_sub_field('email');
$linkedin_url = get_sub_field('linkedin_url');
$photo = wp_get_attachment_image(get_field('photo'),'medium');
$name = get_field('name');
$job_title = get_field('job_title');
if(empty($name)):
    $$name = get_the_title();
endif;
?>
<div class="content-container team-member-section-container less-pad">
    <div class="container">
        <div class="row ">
            <?php if(!empty($body_text)): ?>
            <div class="col-md-7 offset-md-0 col-xl-7  offset-xl-1">
                <div class="team-member-single-content">
                    <?php echo $body_text; ?>
                </div>
            </div>
            <?php 
            endif; 
            if(!empty($photo || $name)):
            ?>
            <div class="col-md-5 col-xl-4 ">
                <div class="team-membar-card">
                    <?php 
                    if(!empty($photo)): echo '<div class="team-card-img">'.$photo.'</div>'; endif; 
                    ?>
                    <div class="team-card-content">
                        
                        <?php 
                        echo '<h3>'.$name.'</h3>';
                        if(!empty($job_title)): echo '<h6>'.$job_title.'</h6>'; endif; 
                        if(!empty($phone || $email ||$linkedin_url)):
                        ?>
                        <ul class="team-card-contact-list">
                            <?php if(!empty($phone)): ?>
                            <li>
                                <div class="team-card-contact-box">
                                    <span><i class="fas fa-phone"></i></span>
                                    <a href="tel:<?php echo $phone_strip; ?>"><?php echo $phone; ?></a>
                                </div>
                            </li>
                            <?php 
                            endif; 
                            if(!empty($email)): 
                            ?>
                            <li>
                                <div class="team-card-contact-box">
                                    <span><i class="fas fa-envelope"></i></span>
                                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </div>
                            </li>
                            <?php 
                            endif; 
                            ?>
                            <li>
                                <div class="team-card-contact-box">
                                    <span><i class="fas fa-address-card"></i></span>
                                    vCard
                                </div>
                            </li>
                            <?php 
                            if(!empty($linkedin_url)): 
                            ?>
                            <li>
                                <div class="team-card-contact-box">
                                    <span><i class="fab fa-linkedin-in"></i></span>
                                    <a href="<?php echo $linkedin_url; ?>" target="_blank">Connect on LinkedIn</a>
                                </div>
                            </li>
                            <?php 
                            endif; 
                            ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
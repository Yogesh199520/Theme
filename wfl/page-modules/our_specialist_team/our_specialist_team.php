<?php 
$heading = get_sub_field('heading');
$select_team = get_sub_field('select_team');
if($select_team):
?>
<div class="content-container our-specialist-team-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(!empty($heading)): echo '<div class="heading text-lg-center"><h3>'.$heading.'</h3></div>'; endif; ?>
                <ul class="ost-list ost-slider pb-0 full-height">
                    <?php  
                    foreach($select_team as $team_id):
                    $photo = wp_get_attachment_image(get_field('photo',$team_id),'medium');
                    $name = get_field('name',$team_id);
                    $job_title = get_field('job_title',$team_id);
                    $phone = get_sub_field('phone',$team_id);
                    $phone_strip = preg_replace('/\\s+/', '-', $phone);
                    $email = get_sub_field('email',$team_id);
                    $linkedin_url = get_sub_field('linkedin_url',$team_id);
                    if(empty($name)):
                        $name = get_the_title($team_id);
                    endif;
                    ?>
                    <li class="ost-item">
                        <div class="ost-card">
                            <?php if(!empty($photo)): echo '<div class="ost-card-img">'.$photo.'</div>'; endif; ?>
                            <div class="ost-card-content">
                                <h3><?php echo $name; ?></h3>
                                <?php if(!empty($job_title)): echo '<h6>'.$job_title.'</h6>'; endif; ?>
                                <ul class="ost-card-contact-list">
                                    <li>
                                        <div class="ost-card-contact-box">
                                            <span><i class="fas fa-phone"></i></span>
                                            <a href="tel:4402080783312">+44 (0)20 8078 3312</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ost-card-contact-box">
                                            <span><i class="fas fa-envelope"></i></span>
                                            <a href="mailto:matthew.harris@waterfront.law">matthew.harris@waterfront.law</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ost-card-contact-box">
                                            <span><i class="fas fa-address-card"></i></span>
                                            vCard
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ost-card-contact-box">
                                            <span><i class="fab fa-linkedin-in"></i></span>
                                            <a href="#!">Connect on LinkedIn</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ost-card-cta">
                                <a href="<?php echo get_the_permalink($team_id); ?>" class="btn btn-default3 btn-block">VIEW PROFILE</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
?>
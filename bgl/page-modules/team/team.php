<?php 
$padding_options = get_sub_field('padding_options');
if(have_rows('members')): 
?>
<div class="content-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="member-list d-flex flex-wrap pb-0 member-slider full-height">
                    <?php 
                    while(have_rows('members')): the_row();
                    $photo = wp_get_attachment_image(get_sub_field('photo'),'medium');
                    $name = get_sub_field('name');
                    $job_title = get_sub_field('job_title');
                    $small_description = get_sub_field('small_description');
                    $linkedin_url = get_sub_field('linkedin_url');
                    $email = get_sub_field('email');
                    $index = get_row_index();
                    ?>
                    <li class="member-item">
                        <div id="member-popup<?php echo $index; ?>" class="member-details-popup d-flex flex-wrap mfp-with-anim mfp-hide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                        <div class="member-popup-upper d-flex flex-wrap">
                                            <div class="member-popup-left">
                                                <?php 
                                                if(!empty($photo)): echo '<div class="member-popup-img">'.$photo.'</div>'; endif;
                                                if(!empty($linkedin_url || $email)):
                                                ?>
                                                <ul class="member-social-links d-none d-md-flex flex-wrap">
                                                    <?php 
                                                    if(!empty($linkedin_url)): echo '<li><a href="'.$linkedin_url.'"><i class="fab fa-linkedin-in"></i></a></li>'; endif; 
                                                    if(!empty($email)): echo '<li><a href="'.$email.'"><i class="fas fa-envelope"></i></a></li>'; endif; 
                                                    ?>
                                                </ul>
                                                <?php endif; ?>
                                            </div>
                                            <div class="member-popup-right">
                                                <?php if(!empty($name || $job_title)): ?>
                                                <div class="member-popup-head">
                                                    <?php 
                                                    if(!empty($name)): echo '<h5>'.$name.'</h5>'; endif; 
                                                    if(!empty($job_title)): echo '<h6>'.$job_title.'</h6>'; endif; 
                                                    ?>
                                                </div>
                                                <?php
                                                endif;
                                                if(!empty($small_description)):  
                                                ?>
                                                <div class="member-popup-body">
                                                    <?php echo $small_description; ?>
                                                </div>
                                                <?php 
                                                endif; 
                                                if(!empty($linkedin_url || $email)):
                                                ?>
                                                <ul class="member-social-links d-flex flex-wrap d-md-none">
                                                    <?php 
                                                    if(!empty($linkedin_url)): echo '<li><a href="'.$linkedin_url.'"><i class="fab fa-linkedin-in"></i></a></li>'; endif; 
                                                    if(!empty($email)): echo '<li><a href="'.$email.'"><i class="fas fa-envelope"></i></a></li>'; endif; 
                                                    ?>
                                                </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#member-popup<?php echo $index; ?>" class="member-box  d-flex flex-column" data-effect="mfp-zoom-in">
                           <?php 
                           if(!empty($photo)): echo '<div class="member-img">'.$photo.'</div>'; endif;
                           if(!empty($name)): echo ' <div class="member-details"><h5>'.$name.'</h5></div>'; endif; 
                           ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
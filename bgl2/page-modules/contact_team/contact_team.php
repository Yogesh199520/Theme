<?php 
$padding_options = get_sub_field('padding_options');
$heading = get_sub_field('heading');
if(have_rows('members')):
?>
<div class="content-container <?php echo implode(' ', $padding_options); ?>">
    <div class="container">
        <div class="row">
            <?php if(!empty($heading)): ?>
            <div class="col-xl-12">
                <div class="heading text-center">
                    <h4><?php echo $heading; ?></h4>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <ul class="contact-member-list d-flex flex-wrap justify-content-center contact-member-slider">
                    <?php
                    while(have_rows('members')): the_row();
                    $photo = wp_get_attachment_image(get_sub_field('photo'),'medium');
                    $name = get_sub_field('name');
                    $job_title = get_sub_field('job_title');
                    $email = get_sub_field('email');
                    ?>
                    <li class="contact-member-item">
                        <div class="contact-member-box d-flex flex-column">
                            <?php 
                            if(!empty($photo)): echo '<div class="contact-member-img">'.$photo.'</div>'; endif;
                            if(!empty($name || $job_title)):
                            ?>
                            <div class="contact-member-details">
                                <?php 
                                if(!empty($name)): echo '<h5>'.$name.'</h5>'; endif;
                                if(!empty($job_title)): echo '<h6>'.$job_title.'</h6>'; endif;
                                ?>
                            </div>
                            <?php 
                            endif; 
                            if(!empty($email)): echo '<div class="contact-member-contact mt-auto"><h6><a href="mailto:'.$email.'">'.$email.'</a></h6></div>'; endif; 
                            ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
endif; 
?>
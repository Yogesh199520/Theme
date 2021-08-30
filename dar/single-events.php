<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

$pid = get_the_ID();

$event_time = get_field('event_time');
$agenda_heading = get_field('agenda_heading');
$agenda_body_text = get_field('agenda_body_text');
$contact_heading = get_field('contact_heading');
$contact_map = get_field('contact_map');
$contact_name = get_field('contact_name');
$contact_email = get_field('contact_email');
$contact_phone = get_field('contact_phone');
$invite_heading = get_field('invite_heading');
$invite_text = get_field('invite_text');
$venue = get_field('venue');
$event_end_date = get_field('end_date', false, false);
$event_end_date = new DateTime($event_end_date);
$current_date = new DateTime();
$map_link = get_field('contact_link');
?>
<div class="content-container less-pad gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(has_post_thumbnail()): ?>
                    <div class="cc-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><?php the_post_thumbnail(); ?></div>
                <?php endif; ?>
                <div class="cc-body bg-white os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.32s">
                    <div class="cc-left">
                        <div class="cc-date">
                            <h4><?php echo get_the_date('D'); ?>, <?php echo get_the_date('F d'); ?>, <?php echo get_the_date('Y'); ?></h4>
                            <?php if(!empty($event_time)): echo '<span>'.$event_time.'</span>'; endif; ?>
                        </div>
                        <!-- <a href="javascript:void(0)">Remind me to register</a> -->
                    </div>
                    <div class="cc-right">
                        <div class="cc-btn">
                            <a href="javascript:void(0)" <?php if($event_end_date > $current_date):?>data-toggle="modal" data-target="#event-register"<?php endif; ?> class="btn-hover color-2 <?php if($event_end_date < $current_date): echo 'disabled'; endif; ?>">
                                REGISTER <span><i class="fas fa-angle-down"></i></span>
                            </a>
                        </div>
                        <?php
                        $submitter_data = ao_get_submitter($pid);
                        if(!empty($submitter_data) && $submitter_data['count_submitter'] > 0):
                        ?>
                        <div class="cc-attended">
                            <div class="cc-attended-icon">
                                <img src="<?php echo IMG.'attended.png'; ?>" alt="attended" />
                            </div>
                            <p><?php echo $submitter_data['last_submitter']; ?> and <?php echo $submitter_data['count_submitter'] ?><br />others are attending</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container less-pad block-container gray-bg pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="block-content ">
                    <div class="block-content-box h-100 body-text os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="heading text-center">
                            <h5 class="gradient-text-3"><?php the_title(); ?></h5>
                        </div>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block-content">
                    <div class="block-content-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.32s">
                        <?php if(!empty($venue)): ?>
                        <div class="heading text-center">
                            <h5 class="gradient-text-3">Venue</h5>
                        </div>
                        <div class="block-address">
                            <span><?php echo $venue; ?></span>
                        </div>
                        <?php 
                        endif;
                        if(!empty($contact_map)): 
                        ?>
                        <div class="block-location">
                            <?php echo $contact_map; ?>
                        </div>
                        <div class="block-btn">
                            <a href="<?php echo $map_link; ?>" class="btn-hover color-2">get directions</a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="block-content-box mobile-mb-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <?php 
                        if(!empty($contact_heading)): echo '<div class="heading text-center"><h5 class="gradient-text-3">'.$contact_heading.'</h5></div>'; endif; 
                        if(!empty($contact_name)): echo '<h6>'.$contact_name.'</h6>'; endif;
                        if(!empty($contact_email || $contact_phone)):
                        ?>
                        <ul class="block-content-list">
                            <?php 
                            if(!empty($contact_email)): echo '<li>Email:- <a href="mailto:'.$contact_email.'">'.$contact_email.'</a></li>'; endif;
                            if(!empty($contact_phone)): echo '<li>Phone No:-<a href="tel:'.$contact_phone.'">'.$contact_phone.'</a></li>'; endif; 
                            ?>
                        </ul>
                        <?php 
                        endif; 
                        if(!empty($invite_heading)): echo '<h6>'.$invite_heading.'</h6>'; endif; 
                        if(!empty($invite_text)): echo '<ul class="block-content-list"><li>'.$invite_text.'</li></ul>'; endif; 
                        ?>
                        <div class="block-btn">
                           <?php echo do_shortcode('[addtoany]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->

<!-- modal start -->
<div class="modal fade event-modal" id="event-register" data-keyboard="false" tabindex="-1" aria-labelledby="giftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo do_shortcode('[contact-form-7 id="923" destination-postid="'.$pid.'"]'); ?>
        </div>
    </div>
</div>
<!-- modal end-->
<?php
get_footer(); 
?>
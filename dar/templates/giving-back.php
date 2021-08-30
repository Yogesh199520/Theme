<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Giving Back */
get_header(); 

$image = wp_get_attachment_image(get_field('banner_image'),'1536x1536');
?>
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1 class="text-uppercase"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php 
if(!empty($image)): 
$form_id = get_field('make_a_gift'); 
$total_gift = get_field('total_gift'); 
$gift_goal = get_field('gift_goal');
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad less-height gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cc-box os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php echo $image; ?>
                </div>

                <div class="cc-body os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <?php if(!empty($total_gift || $gift_goal)): ?>
                    <div class="cc-left os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                       <div class="cc-date">
                           <?php 
                           if(!empty($total_gift)): echo '<h4>'.$total_gift.'%</h4>'; endif;
                           if(!empty($gift_goal)): echo '<span>'.$gift_goal.'</span>'; endif;
                           ?>
                       </div>
                        <?php 
                        if(have_rows('gifts')):
                        $tota_gift = count(get_field('gifts'));
                        ?>
                       <div class="reach-item">
                            <h4 class="progress-title"><?php echo $tota_gift; ?> Gifts</h4>
                            <div class="progress">
                                <div class="progress-bar" data-progress-value="<?php echo the_field('total_gift'); ?>" style="width: <?php echo the_field('total_gift'); ?>%;">
                                    <div class="progress-value">₹500,000 Raised</div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                   <?php 
                    endif; 
                    if(!empty($form_id)): ?>
                    <div class="cc-right os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                       <div class="cc-btn">
                           <a href="javascript:void(0)" class="btn-hover color-2" data-toggle="modal" data-target="#giftModal2">MAkE A GIFT</a>
                       </div>
                    </div>
                    <?php endif; ?>
               </div>
           
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
$body_heading = get_field('body_heading');
$body_body_text = get_field('body_body_text');
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad block-container gray-bg pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <?php if(!empty($body_heading || $body_body_text)): ?>
            <div class="col-md-8">
                <div class="block-content">
                    <div class="block-content-box h-100">
                        <?php 
                        if(!empty($body_heading)): echo '<div class="heading text-center"><h5 class="gradient-text-3">'.$body_heading.'</h5></div>'; endif;
                        echo $body_body_text; 
                        if(!empty($form_id)): echo '<div class="cc-btn text-center mt-5"><a href="javascript:void(0)" class="btn-hover color-2" data-toggle="modal" data-target="#giftModal2">MAkE A GIFT</a>'; endif; 
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; 
            $sharing_heading = get_field('sharing_heading'); 
            $sharing_text = get_field('sharing_text');
            ?>
            <div class="col-lg-4">
                <div class="block-content">
                    <?php 
                    if(have_rows('gifts')):
                    $tota_gift = count(get_field('gifts'));
                    ?>
                    <div class="block-content-box h-100 mb-md-0">
                        <div class="heading text-md-center">
                            <h5 class="gradient-text-3"><?php echo $tota_gift; ?> Gifts</h5>
                        </div>
                        <ul class="block-gift-list">
                            <?php while(have_rows('gifts')): the_row();
                            $title = get_sub_field('ttitle');
                            $icon = wp_get_attachment_image(get_sub_field('icon'),'small');    
                            $amount = get_sub_field('amount');
                            ?>
                            <li>
                                <?php 
                                if(!empty($icon)): echo ' <div class="block-gift-icon">'.$icon.'</div>'; endif; 
                                if(!empty($title || $amount)): 
                                ?>
                                <div class="block-gift-body">
                                    <?php 
                                    if(!empty($title)): echo '<h6>'.$title.'</h6>'; endif;
                                    if(!empty($amount)): echo '<p>'.$amount.'</p>'; endif;
                                    ?>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php if(have_rows('ambition')): ?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad gray-bg pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-8">
                <div class="row h-100">
                    <?php while(have_rows('ambition')): the_row();
                    $heading = get_sub_field('heading');
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                    $text = get_sub_field('text');
                    $index = get_row_index();
                    ?>
                    <div class="col-md-4 mb-lg-30">
                        <div class="giving-back-box <?php if($index == 2): echo 'gradient-bg'; endif; ?>">
                            <div class="<?php if($index ==2): echo 'bg-hover-content'; else: echo 'gb-content'; endif; ?>">
                                <?php 
                                if(!empty($icon)): echo '<div class="giving-back-icon">'.$icon.'</div>'; endif; 
                                if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif; 
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif; 
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php  
                   endwhile;
                    ?>
                </div>
            </div>
            <?php
            $sharing_heading = get_field('sharing_heading'); 
            $sharing_text = get_field('sharing_text');
            ?>
            <div class="col-lg-4">
                <div class="block-content">
                    <div class="block-content-box sharing-content h-100 text-center text-lg-left">
                        <?php 
                        if(!empty($sharing_heading)): echo '<div class="heading text-center"><h5 class="gradient-text-3">'.$sharing_heading.'</h5></div>'; endif;
                         if(!empty($sharing_text)): echo '<p>'.$sharing_text.'</p>'; endif; 
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
<?php 
endif;
$hidden_heading = get_field('hidden_heading'); 
$process = get_field('process');
if(have_rows('process')):
$count = count($process);
?>
<!--============================== Content Start ==============================-->
<div class="content-container less-pad welfare-found-container gray-bg pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-8">
                <div class="block-content-box">
                    <?php 
                    if(!empty($hidden_heading)): echo '<p>'.$hidden_heading.'</p>'; endif;?> 
                    <div class="cc-btn">
                        <a href="<?php echo home_url('/alumni-welfare-fund/'); ?>" class="btn-hover color-2">click here <span> <i class="fas fa-angle-down"></i></span></a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<!--============================== Content Start ==============================-->
<div class="content-container less-pad gray-bg pt-0">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-lg-8 col-lg-8">
                <div class="row">
                    <?php while(have_rows('process')): the_row();
                    $heading = get_sub_field('heading');
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                    $text = get_sub_field('text');
                    $index = get_row_index();
                    ?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#cf-7<?php echo $index; ?>" class="col-md-4 <?php if($count != $index): echo 'mb-md-30'; endif; ?>">
                        <div class="giving-back-box">
                            <div class="gb-content">
                                <?php 
                                if(!empty($icon)): echo '<div class="giving-back-icon">'.$icon.'</div>'; endif; 
                                if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif; 
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif; 
                                ?>
                            </div>
                        </div>
                    </a>
                   <?php  
                   endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;
if(!empty($form_id)):
?>
<!-- modal start -->
<div class="modal fade custom-modal" id="giftModal2" data-keyboard="false" tabindex="-1" aria-labelledby="giftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="cm-head">
                <div class="heading add-bott-line">
                    <h5 class="gradient-text-3">MAKE A GIFT</h5>
                </div>
                <h3>Tell us a little about yourself</h3>
                <p>Your details help us recognize you as a donor and send you details regarding this gift.</p>
            </div>

            <div class="cm-body">
                <?php echo do_shortcode('[contact-form-7 id="'.$form_id.'"]'); ?>
            </div>

        </div>
    </div>
</div>
<?php
endif; 
while(have_rows('process')): the_row();
$heading = get_sub_field('heading');
$index = get_row_index();
$process_form_id = get_sub_field('choose_form');
if(!empty($process_form_id)):
?>
<div class="modal fade custom-modal" id="cf-7<?php echo $index; ?>" data-keyboard="false" tabindex="-1" aria-labelledby="giftModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="cm-head">
                <?php if(!empty($heading)): echo '<div class="heading add-bott-line"><h5 class="gradient-text-3">'.$heading.'</h5></div>'; endif; ?>
                <h3>Tell us a little about yourself</h3>
                <p>Your details help us recognize you as a donor and send you details regarding this gift.</p>
            </div>

            <div class="cm-body">
                <?php echo do_shortcode('[contact-form-7 id="'.$process_form_id.'"]'); ?>
            </div>

        </div>
    </div>
</div>
<!-- modal end-->
<?php 
endif;
endwhile; 
get_footer(); 
?>
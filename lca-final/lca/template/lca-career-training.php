<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: LCA Career Training */
get_header();


$ct_intro_heading = get_field('ct_intro_heading');
$ct_intro_sub_heading = get_field('ct_intro_sub_heading');
$ct_intro_body_text = get_field('ct_intro_body_text');
?>

<!--============================== Content Container Start ==============================-->
<div class="content-container intro-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($ct_intro_heading || $ct_intro_sub_heading)): ?>
                <div class="heading2 text-center">
                    <?php 
                    if(!empty($ct_intro_heading)): echo '<h1>'.$ct_intro_heading.'</h1>'; endif; 
                    if(!empty($ct_intro_sub_heading)): echo ' <h6>'.$ct_intro_sub_heading.'</h6>'; endif; 
                    ?>
                </div>
                <?php
                endif;
                echo $ct_intro_body_text;
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
if(have_rows('ct_page_link')):
?>
<!--============================== Content Container Start ==============================-->
<div class="content-container pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php 
                while(have_rows('ct_page_link')): the_row();
                $color = get_sub_field('color');
                $heading = get_sub_field('heading');
                $sub_heading = get_sub_field('sub_heading');
                $body_text = get_sub_field('body_text');
                $button_text = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');
                $select_testimonial = get_sub_field('select_testimonial');
                $client_name = get_field('client_name',$select_testimonial);
                $client_testimonial = get_field('client_testimonial',$select_testimonial);
                if(empty($client_name)):
                    $client_name = get_the_title($select_testimonial);
                endif;
                if($color == 'orange'):
                    $btn_class = 'btn btn-orange';
                elseif($color == 'green'):
                    $btn_class = 'btn btn-primary';
                endif;
                ?>
                <div class="widget-box font-montserrat <?php echo $color; ?>-widget">
                    <?php 
                    if(!empty($heading)): echo '<h3>'.$heading.'</h3>'; endif; 
                    if(!empty($sub_heading)): echo '<small>'.$sub_heading.'</small>'; endif; 
                    if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                    if($select_testimonial):
                    ?>
                    <div class="widget-testimonial-box">
                        <div class="wt-text-box text-center">
                            <div class="wt-icon-left">
                                <img src="<?php echo IMG.'icon-1.png'; ?>" alt="icon-1" />
                            </div>
                            <p><?php echo $client_testimonial; ?></p>
                            <div class="wt-icon-right">
                                <img src="<?php echo IMG.'icon-2.png'; ?>" alt="icon-2" />
                            </div>
                        </div>
                        <div class="wt-author-name text-end">-<?php echo $client_name; ?></div>
                    </div>
                    <?php endif;
                    if(!empty($button_text)): 
                    ?>
                    <a href="<?php echo $button_link; ?>" class="btn-with-icon d-flex align-items-center justify-content-center">
                        <span class="<?php echo $btn_class; ?>"><?php echo $button_text; ?></span>
                        <img src="<?php echo IMG.''.$color.'-icon.png'; ?>" alt="arrow-icon" />
                    </a>
                    <?php endif; ?>
                </div>
               <?php endwhile; ?>
            </div>
            <?php 
            $research_heading = get_field('research_heading');
            $research_body_text = get_field('research_body_text');
            $forbes_heading = get_field('forbes_heading');
            $forbes_body_text = get_field('forbes_body_text');
            $forbes_logo = wp_get_attachment_image(get_field('forbes_logo'),'medium');
            $body_content_image = wp_get_attachment_image(get_field('body_content_image'),'medium_large');
            ?>
            <div class="col-lg-6">
                <div class="widget-box yellow-widget">
                    <?php 
                    if(!empty($research_heading)): echo '<h3>'.$research_heading.'</h3>'; endif;
                    echo $research_body_text;
                    if(!empty($forbes_logo)): echo '<div class="forbes-logo-area">'.$forbes_logo.'</div>'; endif;
                    if(!empty($forbes_heading)): echo '<div class="widget-heading d-flex align-items-center"><h5>'.$forbes_heading.'</h5><img src="'.IMG.'dark-arrow.png" alt="dark-arrow" /></div>'; endif; 
                    if(!empty($forbes_body_text)): echo '<p>'.$forbes_body_text.'</p>'; endif;
                    ?>
                </div>
                <?php if(!empty($body_content_image)): echo '<div class="widget-image-box">'.$body_content_image.'</div>'; endif; ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Container End ==============================-->
<?php 
endif;
$ct_select_testimonial = get_field('ct_select_testimonial');
if($ct_select_testimonial):
$client_name = get_field('client_name',$ct_select_testimonial);
$client_testimonial = get_field('client_testimonial',$ct_select_testimonial);
if(empty($client_name)):
    $client_name = get_the_title($ct_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="testimonial-inner">
                    <div class="testimonial-item">
                        <div class="testimonial-box">
                            <div class="testimonial-content text-center">
                                <?php echo $client_testimonial; ?>
                            </div>
                            <div class="author text-end">- <?php echo $client_name; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Testimonial container End ==============================-->
<?php 
endif;
get_footer(); 
?>
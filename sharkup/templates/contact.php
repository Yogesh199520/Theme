<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
/* Template Name: Contact */
get_header();
get_template_part('template-part/inner-banner');

$cus_heading = get_field('cus_heading');
$cus_sub_heading = get_field('cus_sub_heading');
$get_heading = get_field('get_heading');
$get_sub_heading = get_field('get_sub_heading');
if(have_rows('sharkup_customers')):
?>
<!--============================== Content container Start ==============================-->
<div class="content-container customer-success-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(!empty($cus_heading || $cus_sub_heading)): ?>
                <div class="heading2">
                    <?php 
                    if(!empty($cus_heading)): echo '<h2>'.$cus_heading.'</h2>';  endif; 
                    if(!empty($cus_sub_heading)): echo '<h5>'.$cus_sub_heading.'</h5>';  endif;  
                    ?>
                </div>
                <?php endif; ?>
                <ul class="card-block-list">
                    <?php 
                    while(have_rows('sharkup_customers')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'small'); 
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    ?>
                    <li>
                        <div class="cd-box">
                            <?php 
                            if(!empty($icon)): echo '<div class="cd-icon">'.$icon.'</div>'; endif; 
                            if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                            if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif; 
                            if(!empty($button_text)): echo '<div class="cd-btn"><a href="'.$button_link.'" class="btn btn-outline">'.$button_text.'</a></div>'; endif; 
                            ?>
                        </div>
                    </li>
                    <?php 
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php 
endif;
if(have_rows('contact_information')):
?>
<!--============================== Content container Start ==============================-->
<div class="content-container customer-success-team-container pt-0">
    <div class="container">
        <?php if(!empty($cus_heading ||$cus_sub_heading)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading2">
                    <?php 
                    if(!empty($cus_heading)): echo '<h2>'.$cus_heading.'</h2>';  endif; 
                    if(!empty($cus_sub_heading)): echo '<h5>'.$cus_sub_heading.'</h5>';  endif;  
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <ul class="cst-list d-md-flex flex-md-wrap">
                    <?php 
                    while(have_rows('contact_information')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'small'); 
                    $heading = get_sub_field('heading');
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    ?>
                    <li>
                        <div class="cst-box d-flex flex-column">
                            <?php 
                            if(!empty($icon)): echo '<div class="cst-icon">'.$icon.'</div>'; endif;
                            if(!empty($heading || $body_text)):
                            ?>
                            <div class="cst-text-box">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                echo $body_text;
                                ?>
                            </div>
                            <?php 
                            endif; 
                            if(!empty($button_text)): echo '<div class="cst-btn mt-auto"><a href="'.$button_link.'" class="btn btn-outline">'.$button_text.'</a></div>'; endif; 
                            ?>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content container End ==============================-->
<?php
endif;  

get_template_part('template-part/signup','cta');

get_footer();

?>
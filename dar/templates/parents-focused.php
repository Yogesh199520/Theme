<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Parents Focused */
get_header();

$parent_image = wp_get_attachment_image(get_field('parent_image'),'large');
$parent_heading = get_field('parent_heading');
$parent_body_text = get_field('parent_body_text');
?>
<!--============================== content container Start ==============================-->
<div class="content-container info-container white-text pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            	<?php
                if(!empty($parent_heading)): echo '<div class="heading"><h4>'.$parent_heading.'</h4></div>'; endif;
            	if(!empty($parent_body_text)): echo $parent_body_text; endif; 
            	?>
            </div>
            <?php if(!empty($parent_image)): echo '<div class="col-lg-6 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s"><div class="thubnail-image-box border box-shadow">'.$parent_image.'</div></div>'; endif; ?>
        </div>
    </div>
</div>
<!--============================== content container End ==============================-->
<?php
if(have_rows('services')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container white-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="grid-list">
                    <?php while(have_rows('services')): the_row();
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                    $heading = get_sub_field('heading');
                    $text = get_sub_field('text');
                    ?>
                    <li class="grid-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                        <div class="grid-box d-flex align-items-md-center justify-content-center">
                            <?php if(!empty($icon)): echo '<div class="grid-icon">'.$icon.'</div>'; endif; ?>
                            <div class="grid-content">
                                <?php 
                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                if(!empty($text)): echo $text; endif; 
                                ?> 
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
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
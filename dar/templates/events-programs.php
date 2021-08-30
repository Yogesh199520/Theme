<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Event and Program */
get_header();

$banner_text = get_field('banner_text');
if(!empty($banner_text)):
?>
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1><?php echo $banner_text; ?></h1>
            </div>
        </div>
    </div>
</div>
<?php 
endif;
if(have_rows('programs')): 
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list two-coulmn d-flex flex-wrap">
                	<?php 
                	while(have_rows('programs')): the_row();
                	$image = wp_get_attachment_image(get_sub_field('image'),'large');
                	$heading = get_sub_field('heading');	
                	$body_text = get_sub_field('body_text');
                	$button_text = get_sub_field('button_text');
                	$button_link = get_sub_field('button_link');
                    $index = get_row_index();
                    ?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $index; ?>s">
                        <div class="ns-box">
                        	<?php if(!empty($image)): echo '<a href="'.$button_link.'" class="ns-img">'.$image.'</a>'; endif; ?>
                            <div class="ns-content-box">
                                <?php 
                                if(!empty($heading)): echo '<h4 class="gradient-text text-uppercase">'.$heading.'</h4>'; endif;
                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                                if(!empty($button_text)): echo '<a href="'.$button_link.'" class="btn-hover color-1">'.$button_text.'</a>'; endif;  
                                ?>
                            </div>
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
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>

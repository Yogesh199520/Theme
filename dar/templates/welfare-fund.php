<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Welfare Fund */
get_header();


$fund_heading = get_field('fund_heading');
$fund_body_text = get_field('fund_body_text');
?>
<!--============================== Content Start ==============================-->
<div class="content-container gradient-bg white-text simple-banner-container">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <?php 
                if(!empty($fund_heading)): echo '<h4 class="text-center">'.$fund_heading.'</h4>'; endif;
                echo $fund_body_text; 
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php if(have_rows('content')): ?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="new-post-list four-column d-flex flex-wrap">
                    <?php 
                	$count = null;
                	while(have_rows('content')): the_row();
                	$image = wp_get_attachment_image(get_sub_field('image'),'medium_large');
                	$heading = get_sub_field('heading');
                	$text = get_sub_field('text');	
                	$pdf = wp_get_attachment_url(get_sub_field('pdf'));
                	?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $count; ?>s">
                        <div class="ns-box">
                           	<?php if(!empty($image)): echo '<div class="ns-img">'.$image.'</div>'; endif; ?>
                            <div class="ns-content-box">
                                <?php 
                                if(!empty($heading)): echo '<h4 class="gradient-text text-uppercase">'.$heading.'</h4>'; endif;
                                if(!empty($text)): echo '<p>'.$text.'</p>'; endif;
                                if(!empty($pdf)): 
                                ?>
                                <a href="<?php echo $pdf; ?>" target="_blank" class="btn-hover color-1">View PDF</a>
                            	<?php endif; ?>
                            </div>
                        </div>
                    </li>
                   <?php 
                    $count = $count+2;
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
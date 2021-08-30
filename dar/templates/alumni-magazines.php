<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Alumni Magazines */
get_header(); ?>

<!--============================== Header End ==============================-->
<div class="main-banner-container gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                <h1 class="text-uppercase"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Start ==============================-->
<?php if(have_rows('magazines_list')): ?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <ul class="new-post-list two-coulmn d-flex flex-wrap">
                	<?php 
                	$count = null;
                	while(have_rows('magazines_list')): the_row();
                	$image = wp_get_attachment_image(get_sub_field('image'),'large');
                	$heading = get_sub_field('heading');	
                	$pdf = wp_get_attachment_url(get_sub_field('pdf'));
                	?>
                    <li class="ns-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3<?php echo $count; ?>s">
                        <div class="ns-box">
                            <?php if(!empty($image)): echo '<div class="ns-img">'.$image.'</div>'; endif; ?>
                            <div class="ns-content-box">
                                <?php 
                                if(!empty($heading)): echo '<h4 class="gradient-text text-uppercase">'.$heading.'</h4>'; endif;
                                if(!empty($pdf)): 
                                ?>
                                <div class="ns-text-btn">
                                    <!-- <a href="javascript:void(0)" data-toggle="modal" data-target="#view-pdf<?php echo get_row_index(); ?>" class="btn-hover color-1">View MAgazine</a> -->
                                    <a href="<?php echo $pdf; ?>" target="_blank" class="btn-hover color-1">View MAgazine</a>
                                    <a href="<?php echo $pdf; ?>" class="btn-hover color-3" download>Download</a>
                                </div>
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
/*while(have_rows('magazines_list')): the_row();
$pdf = wp_get_attachment_url(get_sub_field('pdf'));
$heading = get_sub_field('heading');
?>
<div class="modal fade custom-modal pdf-modal" id="view-pdf<?php echo get_row_index(); ?>" data-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php if(!empty($heading)): echo '<h3 class="gradient-text text-uppercase">'.$heading.'</h3>'; endif; ?>
            <?php echo do_shortcode('[pdf-embedder url='.$pdf.']'); ?>
        </div>
    </div>
</div>
<?php 
endwhile; */
endif;
get_footer(); 
?>
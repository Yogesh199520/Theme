<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: FAQ'S */
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
<?php if(have_rows('faqs')):?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="accordion pc-outer" id="faq">
                	<?php while(have_rows('faqs')): the_row();
                    $heading = get_sub_field('heading');
                    $content = get_sub_field('content');
                    $count = get_row_index();
                    ?>
                    <div class="card">
                    	<?php if(!empty($heading)): ?>
                        <div class="card-header <?php if($count != 1): echo 'collapsed'; endif; ?>" id="heading<?php echo $count; ?>" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $count; ?>"><span><?php echo $heading; ?></span></div>
                    	<?php 
                    	endif; 
                    	if(!empty($content)):
                    	?>
                        <div id="collapse<?php echo $count; ?>" class="collapse <?php if($count == 1): echo 'show'; endif; ?>" aria-labelledby="heading<?php echo $count; ?>" data-parent="#faq">
                            <div class="card-body">
                                <?php echo $content; ?>
                            </div>
                        </div>
                        <?php 
                    	endif; 
                    	?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif; 
get_footer(); 
?>

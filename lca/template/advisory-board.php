<?php
/*==============================*/
// @package LCA
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Advisory Board */
get_header();

$advisory_heading = get_field('advisory_heading');
$advisory_sub_heading = get_field('advisory_sub_heading');
if(have_rows('advisory_members')):
?>
<div class="content-container p-0">
    <div class="container">
        <div class="advisory-board-outer">
            <div class="ab-bg">
                <img src="<?php echo IMG.'advisory-back-bg.png'; ?>" alt="advisory-back-bg" />
            </div>
            <div class="row">
            	<?php if(!empty($advisory_heading || $advisory_sub_heading)): ?>
                <div class="col-md-7">
                    <div class="heading text-uppercase overflow-hidden">
                        <?php 
                        if(!empty($advisory_heading)): echo '<h3>'.$advisory_heading.'</h3>'; endif; 
                        if(!empty($advisory_sub_heading)): echo '<h4>'.$advisory_sub_heading.'</h4>'; endif; 
                        ?>
                    </div>
                </div>
            	<?php endif; ?>
                <div class="col-md-12">
                    <ul class="ab-list d-flex flex-wrap">
                    	<?php 
                        while(have_rows('advisory_members')): the_row();
                        $photo = wp_get_attachment_image(get_sub_field('photo'),'thubmnail');
                        $name = get_sub_field('name');
                        $position = get_sub_field('position');
                        ?>
                        <li>
                            <div class="ab-box">
                            	<?php 
                            	if(!empty($photo)): echo '<div class="ab-img"><span>'.$photo.'</span></div>'; endif; 
                            	if(!empty($name || $position)): 
                            	?>
                                <div class="ab-content">
                                    <?php 
			                        if(!empty($name)): echo '<h5>'.$name.'</h5>'; endif; 
			                        if(!empty($position)): echo '<h6>'.$position.'</h6>'; endif; 
			                        ?>
                                </div>
                            	<?php endif; ?>
                            </div>
                        </li>
                    	<?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
endif; 
$advisory_select_testimonial = get_field('advisory_select_testimonial');
if($advisory_select_testimonial):
$client_name = get_field('client_name',$advisory_select_testimonial);
$client_testimonial = get_field('client_testimonial',$advisory_select_testimonial);
if(empty($client_name)):
	$client_name = get_the_title($advisory_select_testimonial);
endif;
?>
<!--============================== Testimonial container Start ============================-->
<div class="testimonial-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
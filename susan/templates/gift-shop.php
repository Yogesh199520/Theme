<?php
/*==============================*/
// @package Susan
// @author Thinkeq
/*==============================*/
/* Template Name: Gift Shop */
get_header(); 

if(have_rows('gift_shop')): 
?>
<!--============================== Content Start ==============================-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-inner">
                <!--============================== Hero container Start ==============================-->
                <?php get_template_part('template-part/inner-banner'); ?>
                <!--============================== Hero container End ================================-->
                <!--============================== Content Start ==============================-->
                <div class="content-container pt-0">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="main-content">
                                <div class="gift-list-outer">
                                    <ul class="gift-list d-flex flex-wrap">
                                    	<?php 
			                        	while(have_rows('gift_shop')): the_row(); 
								        $image = wp_get_attachment_image(get_sub_field('image'),'medium');
								        $heading = get_sub_field('heading');
								        $body_text = get_sub_field('body_text');
								        $button_text = get_sub_field('button_text');
								        $button_link = get_sub_field('button_link');
								        if(empty($button_text)): 
								        	$button_text = 'Buy on Amazon';
								        endif;
								        ?>
                                        <li class="gift-list-item">
                                            <div class="gift-box">
                                                <?php 
			                                	if(!empty($image)): echo '<div class="gift-img">'.$image.'</div>'; endif; 
			                                	if(!empty($body_text)):
			                                	?>
                                                <div class="gift-box-content">
                                                    <?php 
				                                    if(!empty($heading)): echo '<h6>'.$heading.'</h6>'; endif; 
				                                    echo $body_text;
				                                    ?>
                                                </div>
                                                <?php 
			                                	endif; 
			                                	if(!empty($button_text)): echo '<div class="gift-box-cta"><a href="'.$button_link.'" target="_blank" class="btn btn-default btn-block">'.$button_text.'</a></div>'; endif; 
			                                	?>
                                            </div>
                                        </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--============================== Content End ==============================-->
            </div>
        </div>
    </div>
</div>

<!--============================== Content End ==============================-->
<?php 
endif;

get_footer(); 
?>
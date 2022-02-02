<?php /* Template Name: Landing Page New */
get_header(); ?>
	 <div class="landing_banner">
     	  <div class="container">
          	   <div class="landing_banner_text">
               		<h4><?php the_field('banner_section_subheading'); ?></h4>
                    <h2><?php the_field('banner_section_heading'); ?></h2>
                    <a href="<?php the_field('banner_section_button_link'); ?>" class="get_btn" data-scroll><?php the_field('banner_section_button_text'); ?></a>
				   <h4 style="padding-top:15px;"><?php the_field('banner_section_call_text'); ?> <a style="color:#FFF;" href="tel:+1<?php echo preg_replace('/[^\dxX]/', '',get_field('banner_section_phone')); ?>"><?php the_field('banner_section_phone'); ?></a>
                   
                   </h4>
               </div>
               <div class="landing_banner_img">
              <?php
                    $bannerimg = get_field('banner_section_image');
                    if( !empty($bannerimg) ): ?>
                    <img src="<?php echo $bannerimg['url']; ?>" alt="<?php echo $bannerimg['alt']; ?>" />
                    <?php endif; ?>
              </div>
          </div>
     </div><!--landing_banner-->
     
     
     <div class="landing_section1">
     	  <div class="container">
          	   <div class="row">
        <?php if(have_rows('section1_block')): while(have_rows('section1_block')): the_row(); ?>           
               	    <div class="col6">
                    	 <div class="img">
                        <?php
                    $sec1_img = get_sub_field('image');
                    if( !empty($sec1_img) ): ?>
                    <img src="<?php echo $sec1_img['url']; ?>" alt="<?php echo $sec1_img['alt']; ?>" />
                    <?php endif; ?>
                        </div>
                         <div class="text">
                         	  <h3><?php the_sub_field('heading'); ?></h3>
                              <ul>
                             <?php if(have_rows('list')){ while(have_rows('list')){ the_row(); ?>           
                              	<li><?php the_sub_field('text'); ?></li>
                                <?php } }  ?>
                              </ul>
                         </div>
                    </div>
                    
                 <?php endwhile; endif; wp_reset_query(); ?>
               </div>
          </div>
     </div><!--landing_section1-->
     
     
     <div id="leadform" class="landing_section2">
     	  <div class="container">
          	   <div class="row">
               	    <div class="col6">
                    	 <h4><?php the_field('section2_left_block_subheading'); ?></h4>
                         <h2><?php the_field('section2_left_block_heading'); ?></h2>
						<h4 style="padding-top:15px; color:#fff;"><?php the_field('banner_section_call_text'); ?> <a style="color:#FFF;" href="tel:+1<?php echo preg_replace('/[^\dxX]/', '',get_field('banner_section_phone')); ?>"><?php the_field('banner_section_phone'); ?></a>   
                        </h4>
                    </div>
                    
                    <div class="col6">
                    	 <h3><?php the_field('section2_right_block_heading'); ?></h3>
                        <?php $form=get_field('section2_right_block_form_code'); echo do_shortcode($form); ?>
                    </div>
               </div>
          </div>
     </div><!--landing_section2-->
     
     
     
     <div class="landing_section1">
     	  <div class="container">
          	   <div class="row">
           <?php if(have_rows('section3_block')): $i=1; while(have_rows('section3_block')): the_row(); ?>           

               	    <div class="col4">
                    	 <div class="img1 bg<?php echo $i; ?>">
                        <?php
                    $sec3_icon = get_sub_field('icon');
                    if( !empty($sec3_icon) ): ?>
                    <img src="<?php echo $sec3_icon['url']; ?>" alt="<?php echo $sec3_icon['alt']; ?>" />
                    <?php endif; ?>
                        </div>
                         <div class="text">
                         	  <h3><?php the_sub_field('title'); ?></h3>
                              <?php the_sub_field('text'); ?>
                         </div>
                    </div>
                    
                 <?php $i++; endwhile; endif; wp_reset_query(); ?>
               </div>
               
               <div class="center_btn">
               		<a href="<?php the_field('section3_button_link'); ?>" class="get_btn2" data-scroll><?php the_field('section3_button_text'); ?></a>
				   
               </div>
			  <div style="text-align:center;">
			<h4 style="padding-top:15px; font-family: 'Roboto', sans-serif;"><?php the_field('banner_section_call_text'); ?> <a style="color:#FFF;" href="tel:+1<?php echo preg_replace('/[^\dxX]/', '',get_field('banner_section_phone')); ?>"><?php the_field('banner_section_phone'); ?></a>
                  </h4>
               </div>

          </div>
     </div><!--landing_section1-->


<?php get_footer(); ?>
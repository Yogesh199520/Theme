<?php /* Template Name: Home */
get_header(); ?>
<div id="banner">
    <video class="welcomeVid" preload="auto" autoplay="" loop="" muted="" playsinline="">
      <source type="video/mp4" src="<?php echo get_stylesheet_directory_uri(); ?>/new/images/<?php the_field('banner_section_video'); ?>">
    </video>
    <div class="banne-layer">
      <div class="container">
        <div class="banner-text">
          <h1><?php the_field('banner_section_heading'); ?></h1>
		<?php if(get_field('banner_section_subheading')){?>	
		<h2><?php the_field('banner_section_subheading'); ?></h2>	
		<?php } ?>	
        </div>
		 <div class="banner-btn"> 
        <a href="<?php the_field('banner_section_button_link'); ?>" class="banner_btn2"><?php the_field('banner_section_button_text'); ?> </a></div> </div>
    </div>
  </div>
  <!--close banner-->
  
  <div id="content">
    <section class="homepage-sec1">
    <div class="container">
		
        <ul>
    <?php if(have_rows('section1_block')): while(have_rows('section1_block')): the_row(); ?>        
          <li><div class="thumb">
              <?php $sec1_icon = get_sub_field('icon');
			if( !empty($sec1_icon) ): ?>
		<img width="500" height="317" src="<?php echo $sec1_icon['url']; ?>" alt="<?php echo $sec1_icon['alt']; ?>" />
		<?php endif; ?>
              </div>
          <div class="text_box">
          <h3><a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a></h3>
          <p><?php the_sub_field('text'); ?></p>
            <p><a href="<?php the_sub_field('link'); ?>">Read More</a> </p> 
          </div>
          </li>
         <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
        </div>
    </section>
    <!-- home-sec -->
  
    <section class="homepage-sec2">
      <div class="row">
      	<div class="col-lg-4"><?php $sec2_img = get_field('section2_image');
			if( !empty($sec2_img) ): ?>
		<img width="464" height="463" src="<?php echo $sec2_img['url']; ?>" alt="<?php echo $sec2_img['alt']; ?>" />
		<?php endif; ?></div>
        <div class="col-lg-8">
        	<h2><?php the_field('section2_heading'); ?></h2>
            <h2><?php the_field('section2_subheading'); ?></h2>
            <?php the_field('section2_text'); ?>
            <a class="mini-button medium_button" href="<?php the_field('section2_button_link'); ?>"><?php the_field('section2_button_text'); ?></a>
        </div>
      </div>
    </section>
    <!-- home-sec -->
    
    <section class="homepage-sec3">
      <div class="container">
        <ul>
            <?php if(have_rows('section3_association')): while(have_rows('section3_association')): the_row(); ?>  
        	<li>
            <?php $sec3_img = get_sub_field('image');
			if( !empty($sec3_img) ): ?>
		        <img src="<?php echo $sec3_img['url']; ?>" alt="<?php echo $sec3_img['alt']; ?>" />
		    <?php endif; ?>
            </li>
            <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
      </div>
    </section>
    <!-- home-sec -->
    
   <section class="homepage-sec4" style="background:url(<?php the_field('section4_background'); ?>) no-repeat 0 0;">
      <div class="why_choose">
      	 <h3><?php the_field('section4_heading'); ?></h3>
         <div class="flexslider">
         	<ul class="slides">
        <?php if(have_rows('section4_slider')): while(have_rows('section4_slider')): the_row(); ?>        
            	<li>
                	<span class="icon-span"><?php $sec4_icon = get_sub_field('icon');
			             if( !empty($sec4_icon) ): ?>
		                <img src="<?php echo $sec4_icon['url']; ?>" alt="<?php echo $sec4_icon['alt']; ?>" />
		                <?php endif; ?>
                    </span>
                    <h4><?php the_sub_field('title'); ?></h4>
                    <p><?php the_sub_field('text'); ?></p>
                </li>
               <?php endwhile; endif; wp_reset_query(); ?>
            </ul>
         </div>
      </div>
    </section>
    <!-- home-sec -->
    
     <section class="homepage-sec5">
    	<div class="container">
           <div class="whitebox">
        	<h3><?php the_field('section5_heading'); ?></h3>
            <h3><?php the_field('section5_subheading'); ?></h3>
            <ul>
        <?php if(have_rows('section5_logo')): while(have_rows('section5_logo')): the_row(); ?>        
              <li> <?php $sec5_img = get_sub_field('image');
			             if( !empty($sec5_img) ): ?>
		                <img src="<?php echo $sec5_img['url']; ?>" alt="<?php echo $sec5_img['alt']; ?>" />
		                <?php endif; ?> </li>
              <?php endwhile; endif; wp_reset_query(); ?>
            </ul>
            <p><a href="https://ricciorthodontics.presmultdemo.com/about-us/community/" class="mini-button medium_button"><?php the_field('section5_text'); ?></a></p>
            </div>
        </div>
    </section>
    <!-- home-sec -->
    
    <section class="homepage-sec6" style="background:url(<?php the_field('section6_background_image'); ?>) no-repeat center center">
       <div class="container">
        <h2><?php the_field('section6_heading'); ?></h2>
        <div class="flexslider">
          <ul class="slides">
        <?php if(have_rows('section6_slider')): while(have_rows('section6_slider')): the_row(); ?>      
            <li>
              <p><?php the_sub_field('comment'); ?></p>
              <span class="slider-user"><?php the_sub_field('user'); ?></span>
            </li>
           <?php endwhile; endif; wp_reset_query(); ?>
          </ul>
        </div>
        <div class="testimonail_buttons"><a class="medium_button" href="<?php the_field('section6_button_link'); ?>"><?php the_field('section6_button_text'); ?></a></div>
      </div>
    </section>
    <!-- home-sec -->
    
    <section class="homepage-sec7">
      <div class="container">
        <div class="row">
      	<div class="col-lg-4">
            <?php $sec7_img = get_field('section7_image');
			             if( !empty($sec7_img) ): ?>
		                <img width="464" height="463" src="<?php echo $sec7_img['url']; ?>" alt="<?php echo $sec7_img['alt']; ?>" />
		                <?php endif; ?>
            </div>
        <div class="col-lg-8">
        	<h3><?php the_field('section7_heading'); ?></h2>
            <h4><?php the_field('section7_subheading'); ?></h4>
            <p><?php the_field('section7_text'); ?></p>
        </div>
      </div>
      </div>
    </section>
    <!-- home-sec --> 
    
   <section class="homepage-sec8" style="background:url(<?php the_field('section8_background_image'); ?>) no-repeat 0 0;">
      <div class="container">
           <div class="sec8-text">
           	   <h2><?php the_field('section8_heading'); ?></h2>
               <div class="banner_buttons"><a href="<?php the_field('section8_button1_link'); ?>" class="banner_btn"><?php the_field('section8_button1_text'); ?></a><a href="<?php the_field('section8_button2_link'); ?>" class="banner_btn"><?php the_field('section8_button2_text'); ?></a> </div>
           </div>
      </div>
    </section>
    <!-- home-sec -->
    
    <div class="home-sec7">
      <div class="sec7-left">
		   <a href="<?php the_field('section9_right_block_address_link'); ?>" target="_blank">
        <?php $map_img = get_field('section9_left_block_map');
			if( !empty($map_img) ): ?>
		<img src="<?php echo $map_img['url']; ?>" alt="<?php echo $map_img['alt']; ?>" />
		<?php endif; ?></a>
        </div>
      <div class="sec7-right">
        <h2><?php the_field('section9_right_block_heading'); ?></h2>
        <div class="contact">
          <div class="book">
            <h5><a href="<?php the_field('section9_right_block_book_link'); ?>"><?php the_field('section9_right_block_book_text'); ?></a></h5>
          </div>
          <div class="phone">
            <h5><a data-fancybox="" data-src="#hidden-content" href="javascript:;"><?php the_field('section9_right_block_call_text'); ?> <?php //the_field('section9_right_block_phone'); ?></a></h5>
          </div>
         <!-- <div class="fax">
            <h5><a href="tel:<?php //echo preg_replace('/[^\dxX]/', '',get_field('section9_right_block_fax')); ?>">Fax: <?php //the_field('section9_right_block_fax'); ?> </a> </h5>
          </div>-->
          <div class="email">
            <h5><a href="mailto:<?php the_field('section9_right_block_email'); ?>"><?php the_field('section9_right_block_email'); ?></a></h5>
          </div>
          <div class="address">
            <p><a href="<?php the_field('section9_right_block_address_link'); ?>" target="_blank"><?php the_field('section9_right_block_address'); ?></a> </p>
          </div>
        </div>
      </div>
    </div>
    <!-- home-sec5 --> 
    
  </div>
  <!--content-->
    
  </div>
  <!--content-->
<?php get_footer(); ?>
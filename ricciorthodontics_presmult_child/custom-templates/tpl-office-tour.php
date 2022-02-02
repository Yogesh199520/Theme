<?php /* Template Name: Office Tour */
get_header(); the_post(); ?> 
<div class="page-title" style="background:url(<?php the_field('banner_section_background'); ?>) no-repeat center 0;">
    <div class="container">
      <div class="page-title-head">
          <?php if(get_field('banner_section_title')){ ?>
        <h1><?php the_field('banner_section_title'); ?></h1>
		 <?php } ?> 
      </div>
      <div class="page-title-breadcrumbs">
        <ol class="breadcrumbs">
         <?php get_breadcrumb(); ?>
        </ol>
      </div>
    </div>
  </div>
  <!--close page-title-->
  
  
  <div id="content">
    <section class="page-sec">
      <div class="container">
        <div class="leftbar">
          <div class="info-text">
            <?php the_field('section1_text'); ?>
            <h2><?php the_field('section1_block_heading'); ?></h2>
            <?php the_field('section1_block_text'); ?>
            <h2><?php the_field('section2_heading'); ?></h2>
            
            
            <div class="tour">
            <?php 
                $images = get_field('section2_gallery');
                if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                  <a href="<?php echo esc_url($image['url']); ?>" data-fancybox="images">
                      <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="150px" height="150px" />
                  </a>
                 <?php endforeach; endif; ?>
                </div>
            
            
            <h2><?php the_field('section3_heading'); ?></h2>
            <?php the_field('section3_text'); ?>
           
          </div>
          
          
        </div>
        <!-- leftbar -->
        
        <div class="sidebar">
          <?php dynamic_sidebar('page-sidebar'); ?>
        </div>
        <!-- sidebar --> 
      </div>
    </section>
    <!-- home-sec --> 
    
  </div>
  <!--content-->
<?php get_footer(); ?>
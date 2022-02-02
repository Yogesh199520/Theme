<?php /* Template Name: Meet Dr. */
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
            <h1 style="text-align: center;"> <?php the_field('section1_heading'); ?></h1>
			  <h2 style="text-align: center;"> <?php the_field('section1_heading'); ?></h2>
             <?php the_field('section1_text'); ?>
            <div class="row">
              <div class="col-md-6">
                <ul>
            <?php if(have_rows('section1_list1')): while(have_rows('section1_list1')): the_row(); ?>        
                  <li><?php the_sub_field('text'); ?></li>
                  <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
              </div>
              <div class="col-md-6">
                <ul>
                   <?php if(have_rows('section1_list2')): while(have_rows('section1_list2')): the_row(); ?>        
                  <li><?php the_sub_field('text'); ?></li>
                  <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
              </div>
            </div>
            <?php the_field('section1_text2'); ?>
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
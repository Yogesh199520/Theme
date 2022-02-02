<?php /* Template Name: Community */
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
			<h2><?php the_field('section1_heading'); ?></h2>
            <?php the_field('section1_text'); ?>

		</div>
        
        <div class="info-text">
        	<div class="row">
              <?php if(have_rows('section2_block')): while(have_rows('section2_block')): the_row(); ?>     
            	<div class="graybox">
                	<h3><?php the_sub_field('title'); ?></h3>
                        <ul>
                    <?php if(have_rows('list')){ while(have_rows('list')){ the_row(); ?>       
                        <li><?php the_sub_field('text'); ?></li>
                        <?php } } ?>
                        </ul>
                </div>
               <?php endwhile; endif; wp_reset_query(); ?>
            </div>
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
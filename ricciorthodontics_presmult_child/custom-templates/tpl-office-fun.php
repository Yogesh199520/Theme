<?php /* Template Name: Office Fun */
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
            
            </div>
            <div class="info-text">
          <h2><?php the_field('section2_heading'); ?></h2>
          <div class="row center">
          	<div class="col-md-6">
            	<p><?php $sec2_img1 = get_field('section2_image1');
			if( !empty($sec2_img1) ): ?>
		<img src="<?php echo $sec2_img1['url']; ?>" alt="<?php echo $sec2_img1['alt']; ?>" />
		<?php endif; ?></p>
                <p><?php the_field('section2_text1'); ?></p>
            </div>
            <div class="col-md-6">
            	<p><?php $sec2_img2 = get_field('section2_image2');
			if( !empty($sec2_img2) ): ?>
		<img src="<?php echo $sec2_img2['url']; ?>" alt="<?php echo $sec2_img2['alt']; ?>" />
		<?php endif; ?></p>
                <p><?php the_field('section2_text2'); ?></p>
            </div>
          </div>
          </div>
        <?php if(have_rows('section3_block')): while(have_rows('section3_block')): the_row(); ?>  
          <div class="info-text">
			<h2><?php the_sub_field('heading'); ?></h2>
                <?php the_sub_field('text'); ?>
		</div>
       <?php endwhile; endif; wp_reset_query(); ?>
          
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
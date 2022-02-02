<?php /* Template Name: Orthodontics Team */
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
            <h1 style="text-align:center;"><?php the_field('section1_heading'); ?></h1>
             <?php the_field('section1_text'); ?>
          </div>
          <div class="parts">
          <?php if(have_rows('section2_member')): while(have_rows('section2_member')): the_row(); ?>    
            <div class="row">
              <div class="col-lg-3">
                <?php $member_img = get_sub_field('image');
			         if( !empty($member_img) ): ?>
                    <img src="<?php echo $member_img['url']; ?>" alt="<?php echo $member_img['alt']; ?>" />
                    <?php endif; ?>
                </div>
              <div class="col-lg-9">
                <h3><?php the_sub_field('name'); ?></h3>
                <h5><?php the_sub_field('designation'); ?></h5>
                <?php the_sub_field('bio'); ?>
              </div>
            </div>
           <?php endwhile; endif; wp_reset_query(); ?>
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
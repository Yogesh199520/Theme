<?php /* Template Name: Parts of Braces */
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

<div class="parts">
<?php if(have_rows('section1_block')): while(have_rows('section1_block')): the_row(); ?>    
	<div class="row">
    	<div class="col-lg-4">
        <?php $sec1_img = get_sub_field('image');
			if( !empty($sec1_img) ): ?>
		<img src="<?php echo $sec1_img['url']; ?>" alt="<?php echo $sec1_img['alt']; ?>" />
		<?php endif; ?>
        </div>
        <div class="col-lg-8">
        	<h3><?php the_sub_field('title'); ?></h3>
            <p><?php the_sub_field('text'); ?></p>
        </div>
    </div>
   <?php endwhile; endif; wp_reset_query(); ?>
</div>



            <h3><?php the_field('section2_heading'); ?></h3>
            <?php the_field('section2_text'); ?>

                
               
            </div> <!-- leftbar -->
            
            <div class="sidebar">
            	<?php dynamic_sidebar('page-sidebar'); ?>

            </div> <!-- sidebar -->
        </div>
    </section>
    <!-- home-sec -->
  
    
  </div>
  <!--content-->
<?php get_footer(); ?>
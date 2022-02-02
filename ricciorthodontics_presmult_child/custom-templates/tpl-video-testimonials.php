<?php /* Template Name: Video Testimonials */
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
          <?php if(get_field('content_section_text')){ 
           the_field('content_section_text'); } ?>
          <div class="videos">
        <?php if(have_rows('content_section_testimonial')): while(have_rows('content_section_testimonial')): the_row(); ?>      
          	  <div class="videobox">
              	   <a data-fancybox data-width="640" data-height="360" href="<?php $file=get_sub_field('video'); echo $file['url']; ?>">
                  <?php $video_poster = get_sub_field('poster');
			         if( !empty($video_poster) ): ?>
		            <img src="<?php echo $video_poster['url']; ?>" alt="<?php echo $video_poster['alt']; ?>" />
		            <?php endif; ?>
                  </a>
				  <?php if(get_sub_field('title')){ ?>
				 <h3 class="center">
					 <?php the_sub_field('title'); ?>
				  </h3> <?php } ?>
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
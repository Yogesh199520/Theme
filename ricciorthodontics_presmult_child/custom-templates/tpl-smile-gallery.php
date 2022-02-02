<?php /* Template Name: Smile Gallery */
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
            	<?php the_field('content_section_text'); ?>
                
                <div class="before_after">
            <?php if(have_rows('content_section_block')): while(have_rows('content_section_block')): the_row(); ?>        
                	 <div class="before">
                         <?php $before_img = get_sub_field('before');
			                     if( !empty($before_img) ): ?>
                     	<a href="<?php echo $before_img['url']; ?>" data-fancybox="images" data-caption="Before">
                            <img src="<?php echo $before_img['url']; ?>" alt="<?php echo $before_img['alt']; ?>" />
                            <?php endif; ?>
                        </a>
                         <?php $after_img = get_sub_field('after');
			                     if( !empty($after_img) ): ?>
                        <a href="<?php echo $after_img['url']; ?>" data-fancybox="images" data-caption="After">
                            <img src="<?php echo $after_img['url']; ?>" alt="<?php echo $after_img['alt']; ?>" />
                            <?php endif; ?>
                        </a>
                     </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                     
                </div>
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
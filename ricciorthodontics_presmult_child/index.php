<?php get_header(); ?>
<?php if(!wp_is_mobile()){ ?>
 <div class="page-title" style="background:url(<?php the_field('banner_section_background_image_desktop',get_option('page_for_posts')); ?>) no-repeat center 0;">
    
  <div class="container">
    
    <div class="page-title-breadcrumbs">
      <ol class="breadcrumbs">
        <li><a itemprop="item" href="/"><span>Home</span></a></li>
        <li class="current"><strong>Orthodontics Blog</strong></li>
      </ol>
    </div>
  </div>
</div> <!--close page-title-->
<?php } ?>
<?php if(wp_is_mobile()){ ?>
 <div class="page-title" style="background:url(<?php the_field('banner_section_background_image_mobile',get_option('page_for_posts')); ?>) no-repeat center 0;">
    
  <div class="container">
    
    <div class="page-title-breadcrumbs">
      <ol class="breadcrumbs">
        <li><a itemprop="item" href="/"><span>Home</span></a></li>
        <li class="current"><strong>Orthodontics Blog</strong></li>
      </ol>
    </div>
  </div>
</div> <!--close page-title-->
 <?php } ?>

  <div id="content">
    <section class="page-sec">
        <div class="container">
            <div class="leftbar">
                
	<?php if(get_field('banner_section_title',get_option('page_for_posts'))){ ?>	
      <h1><?php the_field('banner_section_title',get_option('page_for_posts')); ?></h1>
	<?php } ?>	
   
                <?php if(have_posts()):  while(have_posts()): the_post(); ?>
                <div class="blog_post <?php $pimg = get_the_post_thumbnail(); if(!$pimg): echo "no-image"; endif; ?>">
                	<div class="post_thumb "><?php the_post_thumbnail(); ?></div>
                    <div class="post_text">
                    	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-meta">
                            
                          <time><?php echo get_the_date('F j,Y'); ?></time>
                            </div>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="more-link">Details</a>
                    </div>
                </div>
                
              <?php endwhile; endif; wp_reset_query(); ?>
                    
                  <div class="pagination">
                    <?php

                        global $wp_query;
                        $total = $wp_query->max_num_pages;
                        if ( $total > 1 )  {
                             if ( !$current_page = get_query_var('paged') )
                                  $current_page = 1;

                                 $format = 'page/%#%/';

                             echo paginate_links(array(
                                  'base'     => get_pagenum_link(1) . '%_%',
                                  'format'   => $format,
                                  'current'  => $current_page,
                                  'total'    => $total,
                                  'mid_size' => 4,
                                  'type'     => 'list'
                             ));
                        }
                        ?>
                  </div>
            </div> <!-- leftbar -->
            <?php if(wp_is_mobile()){ ?>
            <?php } if(!wp_is_mobile()){?>
            <div class="sidebar">
            	<?php dynamic_sidebar('page-sidebar'); ?>
            </div> <!-- sidebar -->
            <?php } ?>
        </div>
    </section>
    <!-- home-sec -->
  
    
  </div>
  <!--content-->

<?php get_footer(); ?>
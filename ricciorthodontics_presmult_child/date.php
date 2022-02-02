<?php get_header(); ?>
 <div class="page-title">
  <div class="container">
    <div class="page-title-head">
      <h1>Orthodontics Blog</h1>
    </div>
    <div class="page-title-breadcrumbs">
      <ol class="breadcrumbs">
        <li><a itemprop="item" href="/"><span>Home</span></a></li>
        <li class="current"><span>Orthodontics Blog</span></li>
      </ol>
    </div>
  </div>
</div> <!--close page-title-->
  
  <div id="content">
    <section class="page-sec">
        <div class="container">
            <div class="leftbar">
                <?php if(have_posts()):  while(have_posts()): the_post(); ?>
                <div class="blog_post <?php $pimg = get_the_post_thumbnail(); if(!$pimg): echo "no-image"; endif; ?>">
                	<div class="post_thumb "><?php the_post_thumbnail(); ?></div>
                    <div class="post_text">
                    	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-meta">
                            <span class="category-link"><?php 
                                    foreach((get_the_category()) as $category){
                                        echo $category->name.", ";
                                        }
                                    ?></span> | <span class="author vcard">By</span> <?php the_author_posts_link(); ?> | 
                            <a href="#" class="data-link"><time><?php echo get_the_date('F j,Y'); ?></time></a> | <a href="#" class="comment-link" >Leave a comment</a>
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
            
            <div class="sidebar">
            	<?php dynamic_sidebar('page-sidebar'); ?>
            </div> <!-- sidebar -->
        </div>
    </section>
    <!-- home-sec -->
  
    
  </div>
  <!--content-->

<?php get_footer(); ?>
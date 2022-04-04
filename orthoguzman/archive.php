<?php
/*==============================*/
// @package Orthoguzman
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
}
get_header();

?>
<section class="banner-sec">
    <div class="container">
     <?php the_archive_title( '<h1>', '</h1>' ); ?>
    </div>
</section>
<?php 
if(have_posts()):
?>
<div id="content">
    <section class="blog_sec">
        <div class="container">
            <div class="row">
                <div class="col-65 blog_leftbar">
                    <div class="oxy-posts">
                        <?php 
                        while(have_posts()): the_post();
                        ?>
                        <div class="oxy-post">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_lagre'); ?></a>
                            <div class="oxy-post-content">
                                <h3><a class="oxy-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                                <div class="oxy-post-meta">
                                    <div class="oxy-post-meta-author oxy-post-meta-item">
                                        <img src="<?php echo IMG.'avtar.png'; ?>" class="user-profile" alt="avtar" /><?php the_author(); ?>
                                    </div>
                                    <div class="oxy-post-meta-date oxy-post-meta-item"><?php echo get_the_date('F m, Y'); ?></div>
                                    <div class="oxy-post-btn oxy-post-bottom-button"><a href="<?php the_permalink(); ?>" class="oxy-read-more">Read More</a></div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php get_sidebar('sidebar'); ?>
            </div>
        </div>
    </section>

</div>

<?php
endif; ?>

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
<?php
get_footer(); 
?>
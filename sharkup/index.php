<?php
/*==============================*/
// @package Sharkup
// @author Medical Darpan
/*==============================*/
get_header();

get_template_part('template-part/inner-banner');

if(have_posts()):
?>
<div class="content-container">
    <div class="container">
        <div class="row ">
            <div class="col-xl-12">
                <ul class="blog-list ajxOption" data-postperpage="4" data-postcount="<?php echo wp_count_posts('post')->publish; ?>">
                	<?php while(have_posts()): the_post(); ?>
                    <li class="blog-item">
						<a href="<?php the_permalink(); ?>" class="blog-box link-parent">
							<div class="blog-img"><?php the_post_thumbnail('medium_large'); ?></div>
							<div class="blog-content"><h5><?php the_title(); ?></h5></div>
							<div class="blog-cta"><span class="link">Read More</span></div>
						</a>
					</li>
                	<?php endwhile; ?>
                </ul>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12">
            	<?php //mag_wp_pagination(); ?>
                <div class="load-more-container d-flex d-md-none justify-content-center">
                    <a rel="nofollow" class="btn btn-default2 news-load-more" data-page="1">Load more</a>
                </div>
            </div>
        </div> -->
    </div>
</div>
<?php
endif;

// get_template_part('template-part/help');

get_template_part('template-part/signup','cta');

get_footer();
?>